@extends('layouts.auth')

@section('title', 'Registrar')

@section('content')

    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-100 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('images/logo-full.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Registrarse</h2>

                        <form method="POST" action="{{ route('register') }}" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="name" class="form-control" placeholder="Nombre"
                                    value="{{ old('name') }}" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" class="form-control" placeholder="Correo Electronico"
                                    value="{{ old('email') }}" required />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 generate-pass">
                                <div class="input-group field">

                                    <input type="password" name="password" class="form-control password" id="newPassword"
                                        placeholder="Contraseña" required />

                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass"
                                        data-bs-toggle="tooltip" title="Show/Hide Password">
                                        <i></i>
                                    </div>

                                </div>
                                <div class="progress-bar mt-2">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirmar Contraseña" required />
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">
                                    Crear Cuenta
                                </button>
                            </div>
                        </form>
                        <div class="mt-5 text-muted">
                            <span>¿Ya tienes una cuenta?</span>
                            <a href="{{ route('login') }}" class="fw-bold">Ingresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('vendors/js/lslstrength.min.js') }}"></script>
@endpush
