@if(session('success'))
    <div class="alert alert-success success-msg fixed-top 1111" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-warning error-msg" role="alert">
        {{ session('error') }}
    </div>
@endif
