@extends('layouts.layout')
@section('title') - Home @endsection

@section('content')
<section class="vh-100 login-bg">
    <div class="container  h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10 m-5 ">
                <div class="card bg-dark text-white d-flex flex-row justify-content-center align-items-center" style="border-radius: 1rem;">
                    <div class="card-body col-6 p-3 text-center">
                        <img src="{{asset('assets/img/home.jpg')}}" class="img-fluid" id="homeImg">
                    </div>
                    <div class="col-6 text-center h-100">
                        <h1><i class="fa-solid fa-dice-d20"></i><br> Table Finder</h1>
                        <div class="mb-2">
                            @foreach($socials as $soc)
                                @if($soc->name=='twitter')
                                    <a href="{{$soc->link}}" target="_blank"><i class="fa-brands fa-twitter socials ml-2"></i></a>
                                @elseif($soc->name=='facebook')
                                    <a href="{{$soc->link}}" target="_blank"><i class="fa-brands fa-facebook socials ml-2"></i></a>
                                @elseif($soc->name=='instagram')
                                    <a href="{{$soc->link}}" target="_blank"><i class="fa-brands fa-instagram socials ml-2"></i></a>
                                @elseif($soc->name=='discord')
                                    <a href="{{$soc->link}}" target="_blank"><i class="fa-brands fa-discord socials ml-2"></i></a>
                                @else
                                    <a href="{{$soc->link}}" target="_blank"><i class="fa-solid fa-link socials ml-2"></i></a>
                                @endif
                            @endforeach
                        </div>
                        <p>
                            Table Finder is a blog designed solely for you to find groups or players for tabletop roleplaying games.<br>
                            So are you looking for a D&D group? <br>A Warhammer 40k group? <br>We can help you!
                        </p>
                        @if(session()->has('user'))
                            <a href="{{route('tables')}}"><button class="btn btn-outline-light btn-lg px-5 m-2" type="button">Browse Tables</button></a>
                            <a href="{{route('account',session()->get('user')->id)}}"><button class="btn btn-outline-light btn-lg px-5 m-2" type="button">Your Account</button></a>
                        @else
                            <a href="{{route('login')}}"><button class="btn btn-outline-light btn-lg px-5 m-2" type="button">Login</button></a>
                            <a href="{{route('register')}}"><button class="btn btn-outline-light btn-lg px-5 m-2" type="button">Register</button></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
