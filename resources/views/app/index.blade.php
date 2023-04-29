@extends('app/layout')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <p class="mb-0">{{ session('message') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ url('task') }}" class="btn btn-success">Add a task</a>
        <div class="">
            <form action="{{ url('search') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search ..."
                        required>
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    @if (!empty($todos) && $todos->isNotEmpty())
        <p>Todo List:</p>
        <ul class="list-group">
            @foreach ($todos as $todo)
                <li class="list-group-item list-group-item-action todo-item"
                    data-route-edit="{{ url('task/edit/' . $todo->id) }}">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <input class="form-check-input me-1 todo-checkbox" type="checkbox" value=""
                                id="{{ 'task-' . $todo->id }}">
                            <label class="form-check-label user-select-none" for="{{ 'task-' . $todo->id }}">
                                {{ $todo->name }}
                            </label>
                        </div>
                        <p class="mb-0">{{ $todo->getFormattedExcTime() }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @elseif(!empty($action) && $action == 'search')
        <h4 class="text-center text-secondary mt-4">Not found</h4>
    @else
        <h4 class="text-center text-secondary mt-4">Let's add something to do!</h4>
    @endif
@endsection
