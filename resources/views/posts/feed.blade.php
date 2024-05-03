<x-app-layout>
    <x-slot name="header">
        Posts
    </x-slot>

    @if ($posts)
        @foreach ($posts as $post)
            <x-section-wrapper>
                <a href="{{ route('posts.show', $post->id) }}">
                    <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                    @include('posts.partials.info')
                    <div class="mt-6">{{ Str::limit($post->body, 200, '...') }}</div>
                </a>
            </x-section-wrapper>
        @endforeach
        <div class="mt-2">
            {{ $posts->links() }}
        </div>
    @else
        <x-section-wrapper>
            No Posts Available
        </x-section-wrapper>
    @endif


</x-app-layout>
