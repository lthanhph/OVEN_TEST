@extends('auth.layout')

@section('id', 'reset-password')
@section('title', 'Reset Password')

@section('content')
    @include('auth.components.alert')
    @include('auth.components.status')
    <form action="{{ url('reset-password') }}" method="post" class="d-flex flex-column mb-3">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" value="{{ request()->input('email') }}" class="form-control mb-1" readonly>

        <label for="password" class="form-label">Password </label>
        <input type="password" id="password" name="password" class="form-control mb-1">

        <label for="password_confirmation" class="form-label">Password confirm</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control mb-1">

        <input type="submit" value="Submit" class="btn btn-success mt-3">
    </form>
@endsection
