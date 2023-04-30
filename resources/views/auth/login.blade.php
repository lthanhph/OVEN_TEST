@extends('auth.layout')

@section('id', 'login')
@section('title', 'Login')

@section('content')
    @include('auth.components.alert')
    @include('auth.components.status')

    <form action="{{ url('login') }}" method="POST" class="d-flex flex-column mb-3">
        @csrf
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control mb-1">

        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control mb-1">

        <input type="submit" value="Login" class="mt-3 btn btn-success">
    </form>
    <div class="d-flex justify-content-between">
        <a href="{{ url('forgot-password') }}">Forgot password</a>
        <a href="{{ url('register') }}">Register</a>
    </div>

@endsection
