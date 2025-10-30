<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactRequestMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:255',
            'message'    => 'required|string|max:2000',
        ]);

        // send to admin email (set ADMIN_EMAIL in .env)
        $admin = config('mail.admin_address') ?: env('ADMIN_EMAIL');

        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Admin email not configured.'], 500);
        }

        Mail::to($admin)->send(new ContactRequestMail($data));

        return response()->json(['success' => true, 'message' => 'Message sent to admin.']);
    }
}