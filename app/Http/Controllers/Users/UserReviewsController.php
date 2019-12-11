<?php

namespace App\Http\Controllers\Users;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserReviewsController extends UsersBaseController
{
    public function myReviews()
    {
        $userId = Auth::user()->id;
        $myReviews = Review::where('user_id', $userId)->latest()->paginate(10);
        return view('public.users.reviews', compact('myReviews'));
    }

    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('alert_message', 'Your review deleted');
    }
}
