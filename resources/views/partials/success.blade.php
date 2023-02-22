@if(session()->has('successMsg'))
    <div class="container mt-5 d-flex justify-content-center">
        <div class="alert alert-success col-7" role="alert">
            {{ session('successMsg')}}
        </div>
    </div>
@endif
