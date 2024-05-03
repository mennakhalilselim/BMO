<x-app-layout>
    <x-slot name="header">
        {{ __('Create Post') }}
    </x-slot>

    <x-post.form>
        <a href="{{ route('feed') }}">
            <x-secondary-button class="py-2">
                Cancel
            </x-secondary-button>
        </a>

        <x-primary-button>
            Post
        </x-primary-button>
    </x-post.form>

</x-app-layout>
