@extends('auth.layout')

@section('id', 'forgot-password')
@section('title', 'Forgot Password')

@section('content')
    <form action="{{ url('forgot-password') }}" method="post" class="d-flex flex-column mb-3">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p class="mb-0">{{ session('status') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <p>Please enter your email. We will send the password change link to this email.</p>

        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control mb-1">

        <input type="submit" value="Submit" class="mt-3 btn btn-success">
    </form>
    <a href="{{ url('login') }}">Login</a>
@endsection