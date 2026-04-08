<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Legendarios')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">

    {{-- @vite(['resources/sass/theme.scss']) --}}
</head>

<body>


    @yield('content')


    <!--! BEGIN: Vendors JS !-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    @stack('scripts')
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('js/common-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
</body>

</html>
