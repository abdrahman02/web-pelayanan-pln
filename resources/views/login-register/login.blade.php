@extends('login-register.main')
@section('isi')
<form action="/login" method="post" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title"> Login </span>
    <div class="wrap-input100 validate-input">
        <input class="input100 @error('username') is-invalid @enderror" type="text" name="username" id="username"
            placeholder="Username" autofocus required />
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
            Don't have a account?<a href="{{ route('register') }}" class="text-primary ms-1">Create an Account</a>
        </p>
    </div>
</form>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection