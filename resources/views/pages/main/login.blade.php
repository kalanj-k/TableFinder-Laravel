@extends('layouts.layout')

@section('title') - Log In @endsection

@section('content')
    <section class="vh-100 login-bg">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            @if(session('errorMsg'))
                                {{session('errorMsg')}}
                            @endif
                            <form action="{{route('doLogin')}}" method="post">
                                @csrf
                                <div class="mb-md-5 mt-md-4 pb-3">
                                    <h2 class="fw-bold mb-2 text-uppercase"><i class="fa-solid fa-dice-d20"></i> Login</h2>
                                    <div class="form-outline form-white mb-3">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg mt-3" />
                                        <label class="form-label mt-2" for="email">Email</label>
                                        @error('email')
                                        <div class="invalid-form">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label mt-2" for="password">Password</label>
                                        @error('password')
                                        <div class="invalid-form">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </div>
                                <div>
                                    <p class="mb-0">Don't have an account? <a href="{{route('register')}}" class="text-white-50 fw-bold">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
