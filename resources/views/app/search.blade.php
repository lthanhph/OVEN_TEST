@extends('app.layout')

@section('content')
    @include('app.components.search-form')

    @if (!empty($todos) && $todos->isNotEmpty())
        <p>Search result:</p>
        @include('app.components.todo-list')
    @else
        <h4 class="text-center text-secondary mt-4">Not found</h4>
    @endif
@endsection
