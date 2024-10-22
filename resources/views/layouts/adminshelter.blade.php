<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Housing System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100">

    <!-- Sidebar -->
    <x-sidebar-for-shelter />

    <!-- Header -->
    <x-header />

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    @stack('modals')

    @livewireScripts
</body>
</html>