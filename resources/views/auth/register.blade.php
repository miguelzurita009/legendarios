@extends('layouts.auth')

@section('title', 'Registrar')

@section('content')

    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('images/logo-abbr.png') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Registrar</h2>
                        <h4 class="fs-13 fw-bold mb-2">Manage all your Duralux crm</h4>
                        <p class="fs-12 fw-medium text-muted">
                            Let's get you all setup, so you can verify your personal account
                            and begine setting up your profile.
                        </p>
                        <form method="POST" action="{{ route('register') }}" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="name" class="form-control" placeholder="Full Name"
                                    value="{{ old('name') }}" required />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}" required />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 generate-pass">
                                <div class="input-group field">

                                    <input type="password" name="password" class="form-control password" id="newPassword"
                                        placeholder="Password" required />

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
                                    placeholder="Confirm Password" required />
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">
                                    Crear Cuenta
                                </button>
                            </div>
                        </form>
                        <div class="mt-5 text-muted">
                            <span>Already have an account?</span>
                            <a href="{{ route('login') }}" class="fw-bold">Login</a>
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
