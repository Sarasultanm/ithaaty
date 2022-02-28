<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

       <!--  <title>{{ config('app.name', 'Laravel') }}</title> -->
       <title>Ithaaty</title>
        <link rel="shortcut icon" href="images/favicon.png">    
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
         <link rel="stylesheet" href="{{ asset('css/custom-css.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.validate.js') }}"></script>
        <script src="{{ asset('js/validation.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
         @livewireStyles
    </head>
    <body>
        <div class="font-sans antialiased text-gray-900">
            {{ $slot }}
        </div>
         @livewireScripts

         @stack('scripts')
    </body>
</html>
