@if ($errors->any())
    @foreach ($errors->all() as $error)

        <div class="alert alert-danger alert-dismissible fade show w-75 " role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>            {{ $error }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
