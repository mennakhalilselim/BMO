<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Profile Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-dark-400">
            {{ __("Update your avatar.") }}
        </p>
    </header>


    @php
        $characters = ['finn', 'jake', 'bmo', 'ice-king', 'princess-bubblegum', 'marceline', 'flame-princess', 'gunter', 'lumpy-space-princess']
    @endphp

    <div class="mt-6">
        <p class="font-medium text-sm">Select an avatar from below: </p>
        <div class="flex mt-4">
            @foreach ($characters as $character)
                <a href="{{ route('profile.select.avatar', ['avatar' => "$character.svg"]) }}"
                    class="focus:border-2 focus:border-bmo"
                    >
                    <img src="{{ "/avatars/$character.svg" }}" alt="">
                </a>
            @endforeach
        </div>
    </div>
    



    <div class="mt-6 font-medium text-sm">OR</div>
    
    <form method="post" action="{{ route('profile.update.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label class="cursor-pointer hover:bg-dark-700 inline-flex rounded-md ring-1 ring-white py-1 px-4">
                Select A picture to upload
                <x-text-input id="avatar" name="avatar" type="file" class="hidden" autofocus autocomplete="avatar" />
            </x-input-label>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Upload') }}</x-primary-button>
        </div>
    </form>
</section>
