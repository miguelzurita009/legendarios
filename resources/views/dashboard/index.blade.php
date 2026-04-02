@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Dashboard</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <!-- Aquí pega el contenido HTML de los widgets de index.html -->
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
