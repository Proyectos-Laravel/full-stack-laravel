<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-900">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=lato:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body id="app" class="font-lato antialiased h-full">
        <app-toast-provider>
            <backoffice-layout
                title="{{ $title ?? '' }}"
                :sidebar-nav-items="{{ json_encode($sidebarNavItems) }}"
            >
                {{ $slot }}
            </backoffice-layout>
        </app-toast-provider>
    </body>
</html>
