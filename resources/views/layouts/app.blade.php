<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Employee Tasks') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css']) <!-- Laravel Vite -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Main Content -->
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900" id="app">
        <div class="container mx-auto mt-4">
            <!-- Alert Components -->
            @include('components.alert', ['type' => 'error'])
            @include('components.alert', ['type' => 'success'])

            <!-- Page Content -->
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <!-- jQuery and DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <!-- Laravel Vite Scripts -->
    @vite(['resources/js/app.js']) <!-- Load after jQuery to ensure no conflict -->

    <!-- Additional Inline Scripts -->
    @stack('scripts') <!-- Allows adding scripts dynamically in child views -->
</body>
</html>
