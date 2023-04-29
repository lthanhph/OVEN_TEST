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
        <input type="datetime-local" id="execution_time" name="execution_time" class="form-control mb-1"
            value="{{ $excTime }}">
        @error('execution_time')
            <p class="text-danger mb-2">{{ $message }}</p>
        @enderror

        <div class="mt-3 d-flex justify-content-between align-items-center">
            <input type="submit" class="btn btn-success" value="Submit">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#commonModal" title="Delete task"><i
                    class="fas fa-trash-alt"></i></button>
        </div>
    </form>

    <div class="modal fade" id="commonModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ url('task/delete/' . $todo->id) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">This task be permanently deleted.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>You won't be able undo this action.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-danger submit">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
