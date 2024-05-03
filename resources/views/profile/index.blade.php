<x-profile-layout :$profileData>
    @foreach ($posts as $post)
        <x-section-wrapper>
            <a href="{{ route('posts.show', $post->id) }}">
                <h2>{{ $post->title }}</h2> 
                <div class="text-sm text-dark-400">
                    posted {{ $post->created_at->diffForHumans() }}
                </div>
            </a>
        </x-section-wrapper>
    @endforeach
    <div class="mt-2">
        {{ $posts->links() }}
    </div>
</x-profile-layout>
       

