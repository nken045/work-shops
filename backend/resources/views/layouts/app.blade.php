<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Workshop Market</title>
        <link rel="shortcut icon" href="{{ asset('img/logo_2.ico') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">

        <!-- Icon -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/workshop.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer>
            <img src="{{ asset('img/logo_2.svg') }}" class="my-2" />
            <ul>
                <li><a href=""></a></li>
            </ul>
            <div class="copyright my-2">
                <span>{{ __('Copyright') }}</span>
            </div>
        </footer>

        @stack('modals')

        @livewireScripts
    </body>
</html>
