<x-app-layout>
    <x-slot name="header">
            {{ __('Settings') }}
    </x-slot>

    <x-section-wrapper>
        <div class="max-w-2xl">
        @include('profile.partials.update-profile-information-form')
        </div>
    </x-section-wrapper>

    <x-section-wrapper>
        <div class="max-w-2xl">
        @include('profile.partials.update-profile-avatar-form')
        </div>
    </x-section-wrapper>

    <x-section-wrapper>
        <div class="max-w-2xl">
        @include('profile.partials.update-password-form')
        </div>
    </x-section-wrapper>

    <x-section-wrapper>
        <div class="max-w-2xl">
        @include('profile.partials.delete-user-form')
        </div>
    </x-section-wrapper>
    
</x-app-layout>

