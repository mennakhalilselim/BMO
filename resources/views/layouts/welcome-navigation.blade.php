<nav class="fixed top-0 right-0 p-6 text-right z-10">

    <x-welcome-nav-link href="{{ route('login') }}">
        Login
    </x-welcome-nav-link>

    <x-welcome-nav-link href="{{ route('register') }}" class="ml-4">
        Register
    </x-welcome-nav-link>

</nav>