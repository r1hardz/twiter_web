<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Auth;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Auth::user()->tweets()->create([
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->back();
    }
}
