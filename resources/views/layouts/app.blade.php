<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Legendarios')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendors.min.css') }}">
    @stack('vendors-css')
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <!--! END: Custom CSS-->


    {{-- @vite(['resources/sass/theme.scss']) --}}
    @livewireStyles
</head>

<body>

    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    {{-- Header --}}
    @include('layouts.partials.header')

    {{-- Contenido principal --}}
    <main class="nxl-container">
        <div class="nxl-content d-flex flex-column" style="min-height: 100vh;">
            {{-- Page Content --}}
            <div class="flex-grow-1">
                @if (isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </div>

            {{-- Footer --}}
            @include('layouts.partials.footer')
        </div>
    </main>


    <!--! BEGIN: Vendors JS !-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    @stack('vendors')
    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                }
            }
        });
    </script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('js/common-init.min.js') }}"></script>
    @stack('inits')
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('js/theme-customizer-init.min.js') }}"></script>
    <!--! END: Theme Customizer !-->
    {{-- @stack('scripts') --}}
    @livewireScripts
</body>

</html>
