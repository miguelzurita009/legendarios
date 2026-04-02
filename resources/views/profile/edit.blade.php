@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Perfil de Usuario</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Mi Perfil</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-xxl-12">
                @include('profile.partials.update-profile-information-form')
                <br>
                <hr>
                <br>
                @include('profile.partials.update-password-form')
                <br>
                {{-- @include('profile.partials.delete-user-form') --}}
                <br>
            </div>
        </div>
    </div>
@endsection
