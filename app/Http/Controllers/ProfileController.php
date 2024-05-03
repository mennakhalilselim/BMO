<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(10);
        return view('profile.index', compact('posts'));
    }


    public function following(User $user)
    {
        $followings = $user->followings()->latest()->paginate(10);
        return view('profile.following', compact('followings'));

    }

    public function followers(User $user)
    {
        $followers = $user->followers()->latest()->paginate(10);
        return view('profile.followers', compact('followers'));

    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function updateInformation(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'Profile updated');
    }


    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:3000'],
        ]);

        $imgext = $request->avatar->extension();
        $img = Image::make($request->avatar)->fit(160)->encode($imgext);
        $imgName = time() . '.' . $imgext;

        Storage::put("public/uploadedAvatars/$imgName", $img);

        $user = Auth::user();
        $oldAvatar = $user->avatar;
        $user->avatar = $imgName;
        $user->save();

        $oldAvatar = str_replace('/storage', 'public', $oldAvatar);
        Storage::delete($oldAvatar);

        return Redirect::route('profile.edit')->with('success', 'Avatar updated');
    }

    public function selectAvatar(Request $request)
    {
        $user = Auth::user();
        $user->avatar = $request->avatar;
        $user->save();
        return Redirect::route('profile.edit')->with('success', 'Avatar selected');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
