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

        <!-- Tailwind CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#4f46e5',
                            secondary: '#10b981',
                        }
                    }
                }
            }
        </script>
        <style>
            .glass-effect {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            .dark .glass-effect {
                background: rgba(31, 41, 55, 0.9);
                border: 1px solid rgba(255, 255, 255, 0.05);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-white drop-shadow-lg" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 glass-effect shadow-2xl overflow-hidden sm:rounded-xl transform transition-all hover:scale-[1.01]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
