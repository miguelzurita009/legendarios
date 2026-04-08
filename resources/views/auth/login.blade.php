@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <main class="auth-cover-wrapper">
        <div class="auth-cover-content-inner">
            <div class="auth-cover-content-wrapper">
                <div class="auth-img">
                    <img src="{{ asset('images/auth/auth-cover-login-bg.jpg') }}" alt=""
                        class="img-fluid rounded-4 shadow-lg" style="border: 1px solid rgba(255,255,255,0.1);">
                </div>
            </div>
        </div>
        <div class="auth-cover-sidebar-inner">
            <div class="auth-cover-card-wrapper">
                <div class="auth-cover-card p-sm-5">
                    <div class="wd-150 mb-5">
                        <img src="{{ asset('images/logo-full.png') }}" alt="" class="img-fluid">
                    </div>
                    <h2 class="fs-20 fw-bolder mb-4">Inicio de Sesión</h2>
                    <h4 class="fs-13 fw-bold mb-2">Ingresa a tu cuenta</h4>

                    {{-- Errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="w-100 mt-4 pt-2">
                        @csrf
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-lg btn-primary w-100">Ingresar</button>
                        </div>
                    </form>

                    <div class="mt-5 text-muted">
                        <span>¿No tienes una cuenta?</span>
                        <a href="{{ route('register') }}" class="fw-bold">Crear una Cuenta</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/common-init.min.js') }}"></script>
@endpush
