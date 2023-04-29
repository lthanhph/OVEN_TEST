@extends('app.layout')

@php
    $name = old('name');
    $excTime = old('execution_time');
    if (!empty($todo)) {
        $name = $todo->name;
        $excTime = $todo->execution_time;
    }
    
    if ($action == 'create-task') {
        $url = url('task');
    } elseif ($action = 'edit-task') {
        $url = url('task/edit/' . $todo->id);
    }
@endphp

@section('content')
    <form action="{{ $url }}" method="post">
        @csrf

        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control mb-1" value="{{ $name }}">
        @error('name')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror

        <label for="execution_time" class="form-label">Execution time</label>
        <input type="datetime-local" id="execution_time" name="execution_time" class="form-control mb-1" value="{{ $excTime }}">
        @error('execution_time')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror

        <input type="submit" class="btn btn-success mt-3" value="Submit">
    </form>
@endsection
