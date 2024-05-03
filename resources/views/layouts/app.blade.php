<x-html-tag :doctitle="$header">
    @section('scripts')
        @parent
        @vite('resources/js/app.js')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endsection

    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-dark-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl leading-tight">
                        {{ $header }}
                    </h2>
                </div>
            </header>
        @endisset



        <!-- Page Content -->
        <main>
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6 py-7">
                @if (session()->has('success'))
                    <div class="fixed text-bmo bg-dark-800 top-36 left-1/2 -translate-x-1/2 text-center py-2 px-4 overflow-hidden shadow-sm sm:rounded-lg"
                        x-data = "{ show: true }" x-init = "setTimeout(() => show = false, 4000)" x-show = "show">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="fixed text-red-600 bg-dark-800 top-36 left-1/2 -translate-x-1/2 text-center py-2 px-4 overflow-hidden shadow-sm sm:rounded-lg"
                        x-data = "{ show: true }" x-init = "setTimeout(() => show = false, 4000)" x-show = "show">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}

            </div>
        </main>
    </div>

</x-html-tag>
