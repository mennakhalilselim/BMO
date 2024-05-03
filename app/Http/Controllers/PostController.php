<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:update,post')->only(['destroy', 'update', 'edit']);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $inputFields = $request->validated();
        $inputFields['title'] = strip_tags($inputFields['title']);
        $inputFields['body'] = strip_tags($inputFields['body']);

        $inputFields['user_id'] = Auth::id();
        $post = Post::create($inputFields);

        return redirect()->route('posts.show', $post->id)->with('success', 'post created successfully');
    }

    public function show(int $id)
    {
        $post = Post::with([
            'comments' => function (Builder $query) {
                $query->latest();
            }
        ])->withCount('comments')->withCount('likes')->findOrFail($id);

        $post['body'] = Str::markdown($post['body']);
        foreach ($post['comments'] as $comment) {
            $comment['comment'] = Str::markdown($comment['comment']);
        }
        ;

        $liked = Like::where('user_id', Auth::id())->where('post_id', $id)->first();
        return view('posts.show', compact('post', 'liked'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $inputFields = $request->validated();
        $inputFields['title'] = strip_tags($inputFields['title']);
        $inputFields['body'] = strip_tags($inputFields['body']);
        $inputFields['user_id'] = Auth::id();

        $post->update($inputFields);
        return redirect()->route('posts.show', $post->id)->with('success', 'post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('feed')->with('success', 'post deleted successfully');
    }
}
