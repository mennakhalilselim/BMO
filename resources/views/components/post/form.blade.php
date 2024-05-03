<div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-dark-800 shadow sm:rounded-lg">
        <form method="POST" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
            class="mt-6 space-y-6">
            @csrf
            @isset($post)
                @method('PUT')
            @endisset

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" :value="$post->title ?? old('title')" autofocus required
                    autocomplete="off" />
                <x-input-error :messages="$errors->get('title')" />
            </div>
            <div>
                <x-input-label for="body" :value="__('Body')" />
                <x-text-input id="body" name="body" type="text" rows="10" :value="$post->body ?? old('body')"
                    :textarea=true autofocus required autocomplete="off" />
                <x-input-error :messages="$errors->get('body')" />
            </div>

            
            <div class="flex justify-between">
                {{ $slot }}
            </div>
            
            

        </form>
    </div>
</div>
