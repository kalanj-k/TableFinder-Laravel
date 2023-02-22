{{--@extends('layouts.layout')--}}

{{--@section('title') - Create a New User @endsection--}}

{{--@section('content')--}}
{{--    <section class=" login-bg">--}}
{{--        <div class="container d-flex align-items-center justify-content-center">--}}
{{--            <div class="bg-dark card col-12 col-lg-7 m-5  text-center d-flex flex-column align-items-center justify-content-center profilePersonal profilLeft">--}}

{{--                <div class="w-100 m-4 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">--}}

{{--                    <span class="text-left w-100 p-3 infoBorder"><h2>Create a New User</h2></span>--}}
{{--                    <form class="col-10" method="post" action="{{route('account.store')}}">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group mt-4">--}}
{{--                        <input type="text" class="form-control form-control-lg" id="username" name="username" value="{{old('username')}}">--}}
{{--                        <label for="username" class="form-label mt-2 mb-0">Username</label><br>--}}
{{--                        <p class=" small text-white-50">Username can only contain letters and numbers, between 4 and 20 characters.</p>--}}
{{--                        @error('username')--}}
{{--                        <div class="invalid-form">--}}
{{--                            {{$message}}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-2">--}}
{{--                        <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{old('email')}}">--}}
{{--                        <label for="email" class="form-label mt-2">Email</label><br>--}}
{{--                        @error('email')--}}
{{--                        <div class="invalid-form">--}}
{{--                            {{$message}}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-2">--}}
{{--                        <input type="password" class="form-control form-control-lg" id="password" name="password">--}}
{{--                        <label for="password" class="form-label mt-2 mb-0">Password</label><br>--}}
{{--                        <p class=" small text-white-50">Password must be at least 8 characters, contain at least 1 lowercase, at least 1 uppercase letter, and at least 1 digit.</p>--}}
{{--                        @error('password')--}}
{{--                        <div class="invalid-form">--}}
{{--                            {{$message}}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-2">--}}
{{--                        <input type="password" class="form-control form-control-lg" id="rePassword" name="password_confirmation">--}}
{{--                        <label for="rePassword" class="form-label mt-2"> Repeat Password</label><br>--}}
{{--                    </div>--}}
{{--                    <div class="form-outline form-white ">--}}
{{--                        <select class="custom-select form-control mt-2 mb-2" id="role" name="role">--}}
{{--                            @foreach($roles as $r)--}}
{{--                                <option value="{{$r->id}}">{{$r->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <label for="rePassword" class="form-label"> Role </label><br>--}}
{{--                        @error('role')--}}
{{--                        <div class="invalid-form">--}}
{{--                            {{$message}}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-4">--}}
{{--                        <button type="submit" class="btn btn-outline-light btn-lg px-5" id="register" name="register">Create User</button>--}}
{{--                    </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
