<x-app-layout>
    <x-slot name="header">
            {{ __('Edit Post') }}
    </x-slot>      

    <x-post.form :$post>
        <a href="{{ route('posts.show', $post->id) }}">
            <x-secondary-button class="py-2">
                Cancel
            </x-secondary-button>
        </a>

        <x-primary-button>
            Update Post
        </x-primary-button>
    </x-post.form>

</x-app-layout>
