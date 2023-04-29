@extends('app.layout')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <p class="mb-0">{{ session('message') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @include('app.components.search-form')

    <a href="{{ url('task') }}" class="btn btn-success mb-3">Add a task</a>

    @if (!empty($todos) && $todos->isNotEmpty())
        <p>Todo List:</p>
        @include('app.components.todo-list')
    @else
        <h4 class="text-center text-secondary mt-4">Let's add something to do!</h4>
    @endif
@endsection
