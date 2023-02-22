@if(session()->has('errorMsg'))
    <div class="container mt-5 d-flex justify-content-center">
        <div class="alert alert-danger col-7" role="alert">
            {{ session('errorMsg')}}
        </div>
    </div>
@endif
