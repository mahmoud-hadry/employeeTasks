@if (session($type))
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        {{ session($type) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif