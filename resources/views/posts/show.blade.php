<x-app-layout>
    <x-slot name="header">
        {{ $post->title }}
    </x-slot>

    <x-section-wrapper>

        <div class="flex justify-between">
            <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
            @include('posts.partials.editAndDeleteIcons')
        </div>

        @include('posts.partials.info')

        <div class="mt-6">{!! $post->body !!}</div>

        @include('posts.partials.commentsAndLikesIcons')

    </x-section-wrapper>

    <x-section-wrapper>
        <form action="{{ route('posts.comments.store', $post) }}" method="post">
            @csrf
            <x-input-label for="comment" :value="__('Add you comment')" />
            <x-text-input id="comment" name="comment" type="text" rows="3" :value="old('comment')" :textarea=true
                autofocus required autocomplete="off" />
            <x-input-error :messages="$errors->get('comment')" />

            <div class="flex justify-end mt-3">
                <x-primary-button>
                    Comment
                </x-primary-button>
            </div>

        </form>
    </x-section-wrapper>



    @foreach ($post->comments as $comment)
        <x-section-wrapper>
            <p>{!! $comment->comment !!}</p>
            <div class="text-sm text-dark-400">By {{ $comment->user->name }},
                {{ $comment->created_at->diffForHumans() }}</div>
        </x-section-wrapper>
    @endforeach

</x-app-layout>
