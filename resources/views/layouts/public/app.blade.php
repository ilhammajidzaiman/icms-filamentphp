@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('seo')
    <title>
        {{ Str::ucfirst($title) }}
        {{ $title ? '|' : null }}
        {{ $settingSite->name ? $settingSite->name : env('APP_NAME') }}
    </title>
    <link rel="shortcut icon" href="{{ $settingSite->logo }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @livewireStyles
</head>

<body class="pt-5">
    @include('layouts.public.navigation')
    {{ $slot }}
    @include('layouts.public.footer')
    @livewire('public.search.search-modal')
    @stack('scripts')
    @livewireScripts
</body>

</html>
