@if(Session::has('message'))
    <div class="row justify-content-center">
        <div class="col-md-7 alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
