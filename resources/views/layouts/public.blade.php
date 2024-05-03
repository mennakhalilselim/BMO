<x-html-tag :$doctitle>
    @section('fonts')
        <link href="https://fonts.cdnfonts.com/css/cascadia-code" rel="stylesheet">
    @endsection

    <div class="flex justify-center items-center min-h-screen text-white bg-center bg-dots-lighter">
        {{ $slot }}
    </div>

</x-html-tag>

