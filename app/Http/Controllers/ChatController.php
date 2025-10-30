<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ChatMessage as ChatMail;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        Log::info('Chat message request received', [
            'data' => $request->all(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        try {
            $request->validate([
                'message' => 'required|string|max:1000',
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:255',
                'page' => 'nullable|string|max:500',
                'session_id' => 'nullable|string|max:100'
            ]);

            // Generate session ID if not provided
            $sessionId = $request->session_id ?: 'chat_' . uniqid() . '_' . time();
            Log::info('Using session ID: ' . $sessionId);

            // Store in database
            $chatMessage = ChatMessage::create([
                'session_id' => $sessionId,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'sender_type' => 'user',
                'page' => $request->page ?? 'Unknown',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Send email to admin only for new conversations
            try {
                $isFirstMessage = ChatMessage::where('session_id', $sessionId)->count() === 1;

                if ($isFirstMessage) {
                    Mail::to(env('ADMIN_EMAIL', 'admin@yoursite.com'))->send(
                        new ChatMail(
                            (string) $request->name,
                            (string) $request->email,
                            (string) $request->message,
                            (string) ($request->page ?? 'Unknown')
                        )
                    );
                    Log::info('Chat email sent successfully to admin');
                }
            } catch (\Exception $mailError) {
                Log::error('Failed to send chat email: ' . $mailError->getMessage());
                // Don't throw error for email issues - continue with success response
            }

            return response()->json([
                'success' => true,
                'message' => 'Message sent successfully',
                'session_id' => $sessionId
            ]);

        } catch (\Exception $e) {
            // Log the full error for debugging
            Log::error('Chat message error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Failed to send message: ' . $e->getMessage(),
                'error_details' => $e->getTraceAsString() // REMOVE THIS IN PRODUCTION
            ], 500);
        }
    }

    public function getMessages(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string'
        ]);

        try {
            $messages = ChatMessage::where('session_id', $request->session_id)
                ->orderBy('created_at', 'asc')
                ->get()
                ->map(function ($message) {
                    return [
                        'id' => $message->id,
                        'message' => $message->message,
                        'sender_type' => $message->sender_type,
                        'created_at' => $message->created_at->format('H:i'),
                        'is_new' => !$message->is_read && $message->sender_type === 'admin'
                    ];
                });

            // Mark admin messages as read
            ChatMessage::where('session_id', $request->session_id)
                ->where('sender_type', 'admin')
                ->where('is_read', false)
                ->update(['is_read' => true]);

            return response()->json([
                'success' => true,
                'messages' => $messages
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get messages: ' . $e->getMessage()
            ], 500);
        }
    }

    public function sendAdminReply(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string',
            'message' => 'required|string|max:1000'
        ]);

        try {
            // Get the conversation details
            $conversation = ChatMessage::where('session_id', $request->session_id)
                ->where('sender_type', 'user')
                ->first();

            if (!$conversation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Conversation not found'
                ], 404);
            }

            // Store admin reply
            $adminMessage = ChatMessage::create([
                'session_id' => $request->session_id,
                'name' => 'Admin',
                'email' => env('ADMIN_EMAIL', 'admin@yoursite.com'),
                'message' => $request->message,
                'sender_type' => 'admin',
                'page' => $conversation->page,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Reply sent successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send reply: ' . $e->getMessage()
            ], 500);
        }
    }

    // Optional: Store chat messages in database
    private function storeChatMessage($request)
    {
        // You can create a ChatMessage model and migration if you want to store chat history
        /*
        \App\Models\ChatMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'page' => $request->page,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
        */
    }
}
