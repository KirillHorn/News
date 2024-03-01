@if (session('success'))
    <div class="alert alert-success alert-dismissible mt-3 position-absolute bottom-0 end-0" role="alert"
        style="max-width:20 rem;">
        <div class="alert-text">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible mt-3 position-absolute bottom-0 end-0" role="alert"
        style="max-width:20 rem;">
        <div class="alert-text">
            {{ session('error') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif