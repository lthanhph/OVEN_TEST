@extends('auth.layout')

@section('id', 'register')
@section('title', 'Register')

@section('content')
    <form action="{{ url('register') }}" method="POST" class="d-flex flex-column mb-3">
        @csrf
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control mb-1">
        @error('name')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror

        <label for="email" class="form-label">Email </label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control mb-1">
        @error('email')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror

        <label for="password" class="form-label">Password </label>
        <input type="password" id="password" name="password" class="form-control mb-1">
        @error('password')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror

        <label for="password" class="form-label">Password confirm</label>
        <input type="password" id="re-password" name="re-password" class="form-control mb-1">
        @error('re-password')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror

        <input type="submit" value="Register" class="mt-3 btn btn-success">
    </form>
    <a href="{{ url('login') }}">Login if you already have an account</a>
@endsection
