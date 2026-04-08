@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Inicio</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Admin</li>
            </ul>
        </div>
    </div>

    <div class="main-content">

        <div class="row">
            <!-- Aquí pega el contenido HTML de los widgets de index.html -->
            <div class="col-xxl-3 col-md-6">
                <div class="card bg-primary border-primary text-white overflow-hidden">
                    <div class="card-body">
                        <i class="feather-users fs-20"></i>
                        <h5 class="fs-4 text-reset mt-4 mb-1">{{ number_format($usuariosRegistrados) }}</h5>
                        <div class="fs-12 text-reset fw-normal">Usuarios Totales</div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="card bg-success border-success text-white overflow-hidden">
                    <div class="card-body">
                        <i class="feather-calendar fs-20"></i>
                        <h5 class="fs-4 text-reset mt-4 mb-1">{{ number_format($eventosActivos) }}</h5>
                        <div class="fs-12 text-reset fw-normal">Eventos Activos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('vendors')
    <script src="{{ asset('vendors/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendors/js/circle-progress.min.js') }}"></script>
@endpush

@push('inits')
    <script src="{{ asset('js/dashboard-init.min.js') }}"></script>
@endpush
