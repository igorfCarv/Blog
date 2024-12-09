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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <header class="flex items-center justify-between py-3 px-6 border-b border-gray-100">

        </header>
        <main class="container mx-auto px-5 flex flex-grow">
            <div id="header-left" class="flex items-center">
                <div class="text-gray-800 font-semibold">
                    <span class="text-yellow-500 text-xl">&lt;YELO&gt;</span> Code
                </div>
                <div class="top-menu ml-10">
                    <ul class="flex space-x-4">
                        <li>
                            <a class="flex space-x-2 items-center hover:text-yellow-900 text-sm text-yellow-500"
                                href="http://127.0.0.1:8000">
                                Home
                            </a>
                        </li>
    
                        <li>
                            <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                                href="http://127.0.0.1:8000/blog">
                                Blog
                            </a>
                        </li>
    
                        <li>
                            <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                                href="http://127.0.0.1:8000/blog">
                                About Us
                            </a>
                        </li>
    
                        <li>
                            <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                                href="http://127.0.0.1:8000/blog">
                                Contact Us
                            </a>
                        </li>
    
                        <li>
                            <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                                href="http://127.0.0.1:8000/blog">
                                Terms
                            </a>
                        </li>
    
                    </ul>
                </div>
            </div>
            <div id="header-right" class="flex items-center md:space-x-6">
                <div class="flex space-x-5">
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                        href="http://127.0.0.1:8000/login">
                        Login
                    </a>
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                        href="http://127.0.0.1:8000/register">
                        Register
                    </a>
                </div>
            </div>
        </main>

        <footer class="text-sm space-x-4 flex items-center bordet-t border-gray-100 flex-wrap">
            <a href="" class="text-gray-500 hover:text-yellow-500">About US</a>
            <a href="" class="text-gray-500 hover:text-yellow-500">Help</a>
            <a href="" class="text-gray-500 hover:text-yellow-500">Login</a>
            <a href="" class="text-gray-500 hover:text-yellow-500">Explore</a>
        </footer>

        @stack('modals')
        @livewireScripts
    </body>
</html>
