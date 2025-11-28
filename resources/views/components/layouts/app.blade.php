@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('metaTag')
    <title>
        {{ $siteSetting->name ? $title . ' | ' . $siteSetting->name : env('APP_NAME') }}
    </title>
    <link rel="shortcut icon"
        href="{{ $siteSetting->favicon ? asset('storage/' . $siteSetting->favicon) : asset('/images/laravel.svg') }}"
        type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-slate-100 text-slate-600 text-base pt-20">
    <x-layouts.navigation :siteSetting="$siteSetting" />
    {{ $slot }}
    <x-layouts.footer :siteSetting="$siteSetting" />
    @stack('scripts')
    @livewireScripts
</body>

</html>
