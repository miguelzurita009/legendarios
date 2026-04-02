@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<main class="auth-minimal-wrapper">
  <div class="auth-minimal-inner">
    <div class="minimal-card-wrapper">
      <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">

        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
          <img src="{{ asset('assets/images/logo-abbr.png') }}" class="img-fluid">
        </div>

        <div class="card-body p-sm-5">
          <h2 class="fs-20 fw-bolder mb-4">Register</h2>

          <form method="POST" action="{{ route('register') }}" class="w-100 mt-4 pt-2">
            @csrf

            <!-- NAME -->
            <div class="mb-4">
              <input type="text" name="name" class="form-control"
                placeholder="Full Name"
                value="{{ old('name') }}" required>

              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
              <input type="email" name="email" class="form-control"
                placeholder="Email"
                value="{{ old('email') }}" required>

              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
              <input type="password" name="password" class="form-control password"
                placeholder="Password" required>

              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="mb-4">
              <input type="password" name="password_confirmation" class="form-control"
                placeholder="Confirm Password" required>
            </div>

            <div class="mt-5">
              <button type="submit" class="btn btn-lg btn-primary w-100">
                Crear cuenta
              </button>
            </div>

          </form>

          <div class="mt-5 text-muted">
            <span>¿Ya tienes cuenta?</span>
            <a href="{{ route('login') }}" class="fw-bold">Login</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

@endsection