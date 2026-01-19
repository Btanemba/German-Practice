<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'review_text' => 'required|string|min:10|max:1000',
        ]);

        Review::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'review_text' => $validated['review_text'],
            'is_approved' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => __('messages.review_submitted'),
        ]);
    }

    public function getApprovedReviews()
    {
        $reviews = Review::where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return response()->json($reviews);
    }
}
