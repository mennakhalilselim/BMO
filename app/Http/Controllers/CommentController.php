<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $inputFields = $request->validate([
            'comment' => ['required', 'min:1'],
        ]);
        $inputFields['comment'] = strip_tags($inputFields['comment']);
        $inputFields['user_id'] = Auth::id();

        $post->comments()->create($inputFields);

        return redirect()->route('posts.show', $post)->with('comment published successfully');
    }

}
