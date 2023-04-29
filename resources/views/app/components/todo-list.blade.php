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