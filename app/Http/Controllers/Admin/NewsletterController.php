<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function showForm()
    {
        return view('admin.newsletter_form');
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $subscribers = Subscriber::where('subscribed', true)->get();

        foreach ($subscribers as $subscriber) {
            Mail::send('emails.newsletter', [
                'subscriber' => $subscriber,
                'content' => $request->message,
            ], function ($mail) use ($subscriber, $request) {
                $mail->to($subscriber->email)
                     ->subject($request->subject);
            });
        }

        \Alert::success('Newsletter sent to all active subscribers!')->flash();
        return redirect(backpack_url('subscriber'));
    }
}
