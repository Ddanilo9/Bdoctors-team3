<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('metaTitle','BDoctors')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Work+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body style="min-height: 100vh;
    display: flex;
    flex-direction: column;">
    <!-- Header -->
    @include('partials.header')


    <!-- Main -->
    <main>
        @yield('content')
    </main>


    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @yield('extScripts')
    
    <script src="{{ mix('/js/bootstrapValidation.js') }}" defer></script>
    <script src="{{ mix('/js/firstLetterUC.js') }}" defer></script>

</body>
</html>
