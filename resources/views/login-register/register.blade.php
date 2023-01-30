@extends('login-register.main')
@section('isi')
<form action="{{ route('daftar-acc') }}" method="POST" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title"> Registration </span>

    <div class="wrap-input100 validate-input">
        <input class="input100 @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Name"
            value="{{ old('name') }}" autofocus required />
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="mdi mdi-account" aria-hidden="true"></i>
        </span>
    </div>
    @error('name')
    <div class="invalid-feedback">
        <small>{{ $message }}</small>
    </div>
    @enderror

    <div class="wrap-input100 validate-input">
        <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" id="email"
            value="{{ old('email') }}" placeholder="Email" required />
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="zmdi zmdi-email" aria-hidden="true"></i>
        </span>
    </div>
    @error('email')
    <div class="invalid-feedback">
        <small>{{ $message }}</small>
    </div>
    @enderror

    <div class="wrap-input100 validate-input">
        <input class="input100 @error('username') is-invalid @enderror" type="text" name="username" id="username"
            value="{{ old('username') }}" placeholder="Username" required />
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="mdi mdi-account" aria-hidden="true"></i>
        </span>
    </div>
    @error('username')
    <div class="invalid-feedback">
        <small>{{ $message }}</small>
    </div>
    @enderror

    <div class="wrap-input100 validate-input">
        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password"
            placeholder="Password" required />
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="zmdi zmdi-lock" aria-hidden="true"></i>
        </span>
    </div>
    @error('password')
    <div class="invalid-feedback">
        <small>{{ $message }}</small>
    </div>
    @enderror

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn btn-primary">
            Login
        </button>
    </div>

    <div class="text-center pt-3">
        <p class="text-dark mb-0">
            Already have an account?<a href="{{ route('login') }}" class="text-primary ms-1">Please Login</a>
        </p>
    </div>
</form>

@endsection