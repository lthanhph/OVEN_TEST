@extends('app/layout')

@section('content')
    <a href="#" class="btn btn-success mb-3">Add a task</a>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
            The current link item
        </a>
        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
    </div>
@endsection
