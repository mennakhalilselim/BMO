<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('favicon.png') }}" type="image/x-icon" />

    <title>
        @isset($doctitle)
            {{ $doctitle }} | BMO
        @else
            {{ config('app.name', 'BMO') }}
        @endisset

    </title>

    <!-- Fonts -->
    @section('fonts')
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @show

    <!-- Scripts -->
    @section('scripts')
        @vite('resources/css/app.css')
    @show



</head>

<body class="antialiased text-white bg-dark-900">
    {{ $slot }}
</body>
