<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Legendarios')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendors.min.css') }}">
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <!--! END: Custom CSS-->


    {{-- @vite(['resources/sass/theme.scss']) --}}
</head>

<body>

    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    {{-- Header --}}
    @include('layouts.partials.header')

    {{-- Contenido principal --}}
    <main class="nxl-container">
        <div class="nxl-content">
            {{-- Page Content --}}
            @yield('content')

            {{-- Footer --}}
            @include('layouts.partials.footer')
        </div>
    </main>


    <!--! BEGIN: Vendors JS !-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    @stack('vendors')
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('js/common-init.min.js') }}"></script>
    @stack('inits')
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('js/theme-customizer-init.min.js') }}"></script>
    <!--! END: Theme Customizer !-->
    {{-- @stack('scripts') --}}

</body>

</html>
