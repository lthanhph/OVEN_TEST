@extends('app.layout')

@section('content')
    <form action="{{ url('task') }}" method="post">
        @csrf
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
        @error('re-password')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror
    </form>
@endsection
