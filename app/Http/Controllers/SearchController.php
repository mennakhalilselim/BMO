<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = Post::search($request->input('search'))->paginate(10);
        return view('posts.searchResult', compact('search'));
    }
}
