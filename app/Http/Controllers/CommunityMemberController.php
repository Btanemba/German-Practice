<?php

namespace App\Http\Controllers;

use App\Models\CommunityMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class CommunityMemberController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:community_members,email',
            'phone_number' => 'nullable|string|max:255|unique:community_members,phone_number',
            'postal_code' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'house_number' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'subscription_model' => 'required|string|max:255',
        ]);

        try {
            $member = CommunityMember::create($validated);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                $errorMsg = 'Duplicate entry.';
                if (str_contains($e->getMessage(), 'community_members_email_unique')) {
                    $errorMsg = ['email' => 'This email is already registered.'];
                } elseif (str_contains($e->getMessage(), 'community_members_phone_number_unique')) {
                    $errorMsg = ['phone_number' => 'This phone number is already registered.'];
                }
                return redirect()->back()
                    ->withInput()
                    ->withErrors($errorMsg);
            }
            throw $e;
        }

        // Send email to user
        $subscriptionText = match ($member->subscription_model) {
            '1_month' => '1 Month (€10)',
            '3_month' => '3 Months (€25)',
            '6_month' => '6 Months (€50)',
            '1_year' => '1 Year (€105)',
            default => ucfirst($member->subscription_model),
        };
        $userMessage = "Dear {$member->first_name},\n\n"
            . "Thank you for joining the Sprachraum Community! We are excited to have you as a member.\n\n"
            . "You selected the following subscription: {$subscriptionText}.\n\n"
            . "To complete your registration, please make payment for your selected subscription.\n\n"
            . "Payment Details:\n"
            . "Bank Name: Example Bank\n"
            . "Account Name: Sprachraum Community\n"
            . "Account Number: 1234567890\n\n"
            . "You will receive further instructions and access to our community resources once your payment is confirmed.\n\n"
            . "If you have any questions, feel free to reply to this email.\n\n"
            . "Best regards,\nThe Sprachraum Team";

        Mail::raw(
            $userMessage,
            function ($message) use ($member) {
                $message->to($member->email)
                        ->subject('Sprachraum Community Registration');
            }
        );

        // Send email to admin
        Mail::raw(
            'A new community member has registered: ' . $member->first_name . ' ' . $member->last_name . ' (' . $member->email . ')',
            function ($message) {
                $message->to(config('mail.admin_email', 'sprachraum.connect@gmail.com'))
                        ->subject('New Community Member Registration');
            }
        );

        return redirect()->back()->with('success', 'Registration successful!');
    }
}
