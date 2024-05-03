<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    private function isAlreadyLiked($postId): bool
    {
        return Like::where('user_id', Auth::id())->where('post_id', $postId)->exists();
    }

    public function store(Post $post)
    {
        if (!$this->isAlreadyLiked($post->id)) {
            $post->likes()->create([
                'user_id' => Auth::id(),
            ]);
            return back()->with('success', 'Liked successfully');
        }

        return back()->with('error', 'You already liked this post');
    }

    public function destroy(Post $post, Like $like)
    {
        $like->delete();
        return back()->with('error', 'dislike');
    }
}
