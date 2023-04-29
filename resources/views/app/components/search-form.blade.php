<form action="{{ url('search') }}" method="post" class="mb-3 search-form">
    @csrf
    <div class="d-flex justify-content-between align-items-center">
        <input type="text" id="name" name="name" class="form-control me-2" placeholder="..." value="{{ session('name') }}">
        <input type="date" id="time" name="time" class="form-control me-2" value="{{ session('time') }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="fas fa-search"></i></button>
    </div>
</form>