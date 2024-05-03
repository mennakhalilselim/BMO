<x-app-layout>
    <x-slot name="header">
        {{ __('Search Results') }}
    </x-slot>

    @if ($search->isEmpty())
        <x-section-wrapper>
            No result found
        </x-section-wrapper>
    @else
        @foreach ($search as $post)
            <x-section-wrapper>
                <a href="{{ route('posts.show', $post->id) }}">
                    <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                    @include('posts.partials.info')
                    <div class="mt-6">{{ Str::limit($post->body, 200, '...') }}</div>
                </a>
            </x-section-wrapper>
        @endforeach

        <div class="mt-2">
            {{ $search->links() }}
        </div>

    @endif

</x-app-layout>
