<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmedMail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $subscriber = Subscriber::updateOrCreate(
        ['email' => $request->email],
        ['subscribed' => true]
    );

    
    Mail::to($request->email)->send(new SubscriptionConfirmedMail($request->email));

    return back()->with('success', 'Thank you for subscribing! Please check your email.');
}

public function unsubscribe($email)
{
    $subscriber = Subscriber::where('email', $email)->first();

    if ($subscriber) {
        $subscriber->delete();
        return redirect('/')
            ->with('success', 'Your email has been removed from our newsletter list.');
    }

    return redirect('/')
        ->with('error', 'Email not found or already unsubscribed.');
}

}
