<?php
 
namespace App\View\Composers;
 
// use App\Repositories\UserRepository;

use App\Models\Follow;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
 
class ProfileComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        // protected UserRepository $users,
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $user = request()->user;
        $isFollowing = Follow::where('followed_id', $user->id)->where('follower_id', Auth::id())->exists();
        $postsCount = Post::where('user_id', $user->id)->count();
        $followingsCount = $user->followings()->count();
        $followersCount = $user->followers()->count();

        $view->with('profileData', compact('user', 'isFollowing', 'followingsCount', 'followersCount', 'postsCount'));
    }
}