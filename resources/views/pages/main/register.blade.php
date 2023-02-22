@extends('layouts.layout')

@section('title') - Sign Up @endsection

@section('content')
    <section class="vh-100 login-bg">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-3 mt-md-4">
                                <h2 class="fw-bold mb-3 text-uppercase"><i class="fa-solid fa-dice-d20"></i> Sign up</h2>

                                <form action="{{route('register.user')}}" method="post">
                                    @csrf
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control form-control-lg" id="username" name="username">
                                    <label for="username" class="form-label mt-2 mb-0">Username</label><br>
                                    <p class=" small text-white-50">Username can only contain letters and numbers, between 4 and 20 characters.</p>
                                    @error('username')
                                    <div class="invalid-form">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <input type="text" class="form-control form-control-lg" id="email" name="email">
                                    <label for="email" class="form-label mt-2">Email</label><br>
                                    @error('email')
                                    <div class="invalid-form">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password">
                                    <label for="password" class="form-label mt-2 mb-0">Password</label><br>
                                    <p class=" small text-white-50">Password must be at least 8 characters, contain at least 1 lowercase, at least 1 uppercase letter, special character, and at least 1 digit.</p>
                                    @error('password')
                                    <div class="invalid-form">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <input type="password" class="form-control form-control-lg" id="rePassword" name="password_confirmation">
                                    <label for="rePassword" class="form-label mt-2"> Repeat Password</label><br>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-outline-light btn-lg px-5" id="register" name="register">Sign  Up</button>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
