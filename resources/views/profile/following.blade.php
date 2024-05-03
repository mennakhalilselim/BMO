<x-profile-layout :$profileData>
    @foreach ($followings as $following)
        <div class="p-4 mt-6 sm:p-8 bg-dark-800 shadow sm:rounded-lg text-white">
            <a href="{{ route('profile.index', $following->followed->id) }}" class="flex items-center">
                <div class="w-9 h-9">
                    <img class="rounded-full w-9 h-9" src="{{ $following->followed->avatar }}" alt="avatar">
                </div>
                <h3 class="ml-2">{{ $following->followed->name }}</h3>
            </a>
        </div>
    @endforeach
    <div class="mt-2">
        {{ $followings->links() }}
    </div>
</x-profile-layout>

   
       
