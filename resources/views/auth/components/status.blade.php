@if (session()->has('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p class="mb-0">{{ session('status') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif