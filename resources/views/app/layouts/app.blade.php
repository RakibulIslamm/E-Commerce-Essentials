@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex items-start justify-start bg-gray-100">
    @include('app.layouts.sidebar')
    <main class="w-full h-full">
        {{-- <div class="px-10 py-5 bg-slate-800 rounded-xl mx-5 text-gray-100 sticky top-0">
            header goes here
        </div> --}}
        <div class="mx-8 my-4">
            {{ $slot }}
        </div>
    </main>
</body>


</html>
