<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Auth;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('user')->latest()->get();
        return view('tweets.index', compact('tweets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:280',
        ]);

        Auth::user()->tweets()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
}
