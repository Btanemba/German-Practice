<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChatMessageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Prologue\Alerts\Facades\Alert;

/**
 * Class ChatMessageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ChatMessageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ChatMessage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/chat-message');
        CRUD::setEntityNameStrings('chat message', 'chat messages');

        // Disable create and edit operations - these are incoming messages only
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('update');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // Show one row per conversation (first user message for each session)
        // Find the first (lowest id) user message id per session and restrict the list to those
        $firstIds = DB::table('chat_messages')
            ->where('sender_type', 'user')
            ->groupBy('session_id')
            ->selectRaw('MIN(id) as id')
            ->pluck('id')
            ->toArray();

        if (!empty($firstIds)) {
            $this->crud->query->whereIn('id', $firstIds)
                ->orderByRaw('is_read ASC, created_at DESC');
        } else {
            // no messages yet; keep query but it'll return empty set
            $this->crud->query->whereRaw('1 = 0');
        }
        // Add modernized columns: avatar, preview, email, started (relative), and status
        CRUD::addColumn([
            'name'  => 'avatar',
            'label' => '',
            'type'  => 'closure',
            'function' => function ($entry) {
                // Simple avatar: use gravatar if email exists, otherwise fallback emoji
                $email = $entry->email ?? '';
                $hash = $email ? md5(strtolower(trim($email))) : null;
                $src = $hash ? "https://www.gravatar.com/avatar/{$hash}?s=64&d=identicon" : null;
                if ($src) {
                    return "<img src='{$src}' style='width:44px;height:44px;border-radius:50%;object-fit:cover;border:2px solid #eee' alt='avatar'>";
                }
                return "<div style='width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:#f3f4f6;font-weight:700'>👤</div>";
            },
            'escaped' => false,
        ]);

        CRUD::addColumn([
            'name' => 'conversation_preview',
            'label' => 'Conversation',
            'type' => 'closure',
            'function' => function ($entry) {
                $preview = Str::limit($entry->message ?? '', 120);
                $page = $entry->page ? '<small class="text-muted">&nbsp;•&nbsp;'.e($entry->page).'</small>' : '';
                return "<div style='line-height:1.2'><div style='font-weight:600;color:#111'>".e($entry->name)."</div><div style='color:#6b7280;font-size:0.95rem'>".e($preview)." {$page}</div></div>";
            },
            'escaped' => false,
        ]);

        CRUD::addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);

        CRUD::addColumn([
            'name' => 'created_at',
            'label' => 'Started',
            'type' => 'closure',
            'function' => function ($entry) {
                $human = $entry->created_at ? $entry->created_at->diffForHumans() : '';
                $full = $entry->created_at ? $entry->created_at->format('M d, Y H:i') : '';
                return "<small title='".e($full)."" .">".e($human)."</small>";
            },
            'escaped' => false,
        ]);

        CRUD::addColumn([
            'name' => 'is_read',
            'label' => 'Status',
            'type' => 'closure',
            'function' => function ($entry) {
                if ($entry->is_read) {
                    return '<span class="badge badge-success">Read</span>';
                }
                return '<span class="badge badge-warning">New</span>';
            },
            'escaped' => false,
        ]);

        // NOTE: Backpack's addFilter() is a PRO feature in some installs.
        // To avoid a 500 when the addon isn't available, provide a URL-based
        // fallback: append ?unread=1 to the list URL to show only unread messages.
        if (request()->has('unread') && request()->get('unread') == '1') {
            $this->crud->addClause('where', 'is_read', false);
        }

        // Reuse existing action buttons (view, reply, mark read)
        CRUD::addButtonFromView('line', 'chat_reply', 'chat_reply_button', 'beginning');
        CRUD::addButtonFromView('line', 'view_conversation', 'view_conversation_button', 'beginning');
        CRUD::addButtonFromView('line', 'mark_read', 'mark_read_button', 'beginning');
    }    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    protected function setupShowOperation()
    {
        // Automatically mark as read when viewing
        if (request()->route('id')) {
            $entry = $this->crud->getEntry(request()->route('id'));
            if ($entry && !$entry->is_read) {
                $entry->markAsRead();
            }
        }

        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('message')->type('textarea');
        CRUD::column('page')->label('Source Page');
        CRUD::column('ip_address')->label('IP Address');
        CRUD::column('created_at')->label('Received At');
        CRUD::column('is_read')->label('Status')->type('closure')
            ->function(function ($entry) {
                return $entry->is_read ?
                    '<span class="badge badge-success">Read</span>' :
                    '<span class="badge badge-warning">Unread</span>';
            })->escaped(false);
    }

    public function markAsRead($id)
    {
        $chatMessage = \App\Models\ChatMessage::findOrFail($id);
        $chatMessage->markAsRead();

        Alert::success('Message marked as read')->flash();
        return redirect(url($this->crud->route));
    }

    public function viewConversation($id)
    {
        $firstMessage = \App\Models\ChatMessage::findOrFail($id);
        $messages = \App\Models\ChatMessage::where('session_id', $firstMessage->session_id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.chat_conversation', [
            'messages' => $messages,
            'session_id' => $firstMessage->session_id,
            'user_name' => $firstMessage->name,
            'user_email' => $firstMessage->email,
            'crud' => $this->crud
        ]);
    }

    public function showReplyForm($id)
    {
        $firstMessage = \App\Models\ChatMessage::findOrFail($id);
        $messages = \App\Models\ChatMessage::where('session_id', $firstMessage->session_id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.chat_reply', [
            'messages' => $messages,
            'session_id' => $firstMessage->session_id,
            'user_name' => $firstMessage->name,
            'user_email' => $firstMessage->email,
            'crud' => $this->crud
        ]);
    }

    public function sendReply(\Illuminate\Http\Request $request, $id)
    {
        $firstMessage = \App\Models\ChatMessage::findOrFail($id);

        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        try {
            // Store admin reply
            \App\Models\ChatMessage::create([
                'session_id' => $firstMessage->session_id,
                'name' => 'Admin',
                'email' => env('ADMIN_EMAIL', 'admin@yoursite.com'),
                'message' => $request->message,
                'sender_type' => 'admin',
                'page' => $firstMessage->page,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'is_read' => false, // Will be marked as read when user sees it
            ]);

            // Mark the conversation as replied on the original message for quick filtering
            try {
                $firstMessage->markAsReplied();
            } catch (\Exception $ex) {
                // not critical
            }

            Alert::success('Reply sent successfully! The user will see it in their chat widget.')->flash();
            return redirect(url($this->crud->route));

        } catch (\Exception $e) {
            Alert::error('Failed to send reply: ' . $e->getMessage())->flash();
            return back()->withInput();
        }
    }
}
