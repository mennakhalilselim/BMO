<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function feed(Request $request)
    {
        $posts = Auth::user()->feedPosts()->latest()->paginate(10);
        return view('posts.feed', compact('posts'));
    }

    public function popular()
    {
        $posts = Post::popular('-1 day')->paginate(10);
        return view('posts.feed', compact('posts'));
    }
}
