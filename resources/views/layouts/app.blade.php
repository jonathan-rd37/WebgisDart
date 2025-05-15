<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <!-- Navbar -->
            <nav class="text-white border-b border-gray-700 shadow-sm h-20 flex items-center" style="background-color: #7F7B75;">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">

                        <!-- Menu Links -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <a href="{{ url('/') }}" class="px-4 py-2 hover:text-gray-300">Home</a>
                            <a href="{{ route('about') }}" class="px-4 py-2 hover:text-gray-300">About Us</a>
                            <a href="{{ route('admin.login.post') }}" class="px-4 py-2 hover:text-gray-300">Admin Page</a>
                            <a href="" class="px-4 py-2 hover:text-gray-300">Humanitarian Logistics</a>
                            <a href="" class="px-4 py-2 hover:text-gray-300">CoE Humanitarian AI</a>
                            <a href="" class="px-4 py-2 hover:text-gray-300">Journal IJCSHAI</a>
                        </div>


                        <!-- Auth Links -->
                        <div class="hidden sm:flex sm:items-center">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 hover:text-gray-300">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="px-4 py-2 hover:text-gray-300">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-4 py-2 hover:text-gray-300">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-10">
                @yield('content')
            </main>
        </div>
    </body>
</html>
