<x-app-layout>
    <x-slot name="header">
        {{ $profileData['user']->name }}{{ __(' Profile') }}
    </x-slot>

    <div class="flex items-center">
        <img class="inline-flex w-40 h-40" src="{{ $profileData['user']->avatar }}" alt="avatar">

        @auth
            @if ($profileData['user']->id !== Auth::id())
                @if ($profileData['isFollowing'])
                    <form action="{{ Route('unfollow', $profileData['user']->id) }}" method="POST"
                        class="inline-flex ml-3 text-lg font-semibold">
                        @csrf
                        <button type="submit" class="text-red-600 rounded ring-1 ring-white p-2">Unfollow</button>
                    </form>
                @else
                    <form action="{{ Route('follow', $profileData['user']->id) }}" method="POST"
                        class="inline-flex ml-3 text-lg font-semibold">
                        @csrf
                        <button type="submit" class="rounded ring-1 ring-white p-2">Follow</button>
                    </form>
                @endif
            @endif
        @endauth
    </div>


    <div class="mt-3">
        <x-profile-link :href="Route('profile.index', $profileData['user']->id)" :active="request()->routeIs('profile.index')">
            {{ $profileData['postsCount'] }} Posts
        </x-profile-link>
        <x-profile-link class="ml-2" :href="Route('profile.following', $profileData['user']->id)" :active="request()->routeIs('profile.following')">
            {{ $profileData['followingsCount'] }} Following
        </x-profile-link>
        <x-profile-link class="ml-2" :href="Route('profile.followers', $profileData['user']->id)" :active="request()->routeIs('profile.followers')">
            {{ $profileData['followersCount'] }} Followers
        </x-profile-link>
    </div>

    {{ $slot }}

</x-app-layout>
