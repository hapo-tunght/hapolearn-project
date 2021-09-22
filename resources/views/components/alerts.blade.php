@if(session('success'))
    <div class="alert alert-success success-msg" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-warning error-msg" role="alert">
        {{ session('error') }}
    </div>
@endif
