@extends('layouts.auth')
@section('title','Halaman Register')
@section('content')
    <h1 class="auth-title">Register.</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-xl"
                placeholder="Nama Lengkap">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror form-control-xl"
                placeholder="Email">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" name="password"
                class="form-control @error('password') is-invalid @enderror form-control-xl" placeholder="Password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" name="password_confirmation" class="form-control form-control-xl"
                placeholder="Kofirmasi Password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Register</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">Sudah Punya Akun? <a href="{{ route('login') }}" class="font-bold">Masuk</a>.</p>
    </div>
@endsection
