@extends('layouts.layout')
@section('title') - 404 @endsection

@section('content')
    <section class="vh-100 login-bg">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-3 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase">Error.</h2>
                                <a href="{{route('home')}}"><button class="btn btn-outline-light btn-lg px-5 mt-2" type="submit">Return Home</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
