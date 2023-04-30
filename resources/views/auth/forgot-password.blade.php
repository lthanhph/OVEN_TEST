@extends('auth.layout')

@section('id', 'forgot-password')
@section('title', 'Forgot Password')

@section('content')
    @include('auth.components.alert')
    @include('auth.components.status')

    <form action="{{ url('forgot-password') }}" method="post" class="d-flex flex-column mb-3">
        @csrf
        <p>Please enter your email. We will send the password change link to this email.</p>

        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control mb-1">

        <input type="submit" value="Submit" class="mt-3 btn btn-success">
    </form>
    <a href="{{ url('login') }}">Login</a>
@endsection