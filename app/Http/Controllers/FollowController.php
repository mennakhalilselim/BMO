<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    private function isAlreadyFollowed($userId): bool
    {
        return Follow::where('followed_id', $userId)->where('follower_id', Auth::id())->exists();
    }

    public function follow(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', "You can't follow yourself");
        }

        if ($this->isAlreadyFollowed($user->id)) {
            return back()->with('error', 'You already follow this user');
        }

        $follow = new Follow;
        $follow->follower_id = Auth::id();
        $follow->followed_id = $user->id;
        $follow->save();

        return back()->with('success', 'Followed successfully');

    }

    public function unfollow(User $user)
    {
        $follow = Follow::where('followed_id', $user->id)->where('follower_id', Auth::id());
        $follow->delete();
        return back()->with('success', 'UnFollowed successfully');
    }

}
