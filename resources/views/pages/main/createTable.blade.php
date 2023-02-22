@extends('layouts.layout')

@section('title') - Create a New Table @endsection

@section('content')
    <section class=" login-bg">
        <div class="container ">
            <div class="bg-dark card col-12 col-lg-10 m-5  text-center d-flex flex-column align-items-center justify-content-center profilePersonal profilLeft">

                <div class="w-100 m-4 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">

                    <span class="text-left w-100 p-3 infoBorder"><h2>Create a New Table</h2></span>
                    <form class="col-10" method="post" action="{{route('table.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{session()->get('user')->id}}">
                    <div class="form-outline form-white text-center mt-2">
                        <span class="infoAcc text-uppercase">Table Name :</span><br>
                        <input type="text" id="name" name="name" class="form-control form-control-lg mt-1" value="{{old('name')}}"/>
                        @error('name')
                        <div class="mt-2 invalid-form">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <span class="infoAcc text-uppercase mt-2">Availability :</span>
                    <p class="small mb-1 pb-lg-2 text-white-50">This is to help others know when you would like to have sessions.<br></p>
                    <div class=" form-outline form-white pl-5 mb-2 text-left">
                        @foreach($days as $d)
                            <input class="form-check-input" type="checkbox" name="days[]" value="{{$d->id}}" id="day{{$d->id}}">
                            <label class="form-check-label" for="day{{$d->id}}">
                                {{$d->name}}
                            </label><br>
                        @endforeach
                            @error('days')
                            <div class="mt-2 invalid-form">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="form-outline  mt-2 form-white">
                        <span class="infoAcc text-uppercase ">Game Master Required :</span><br>
                        <input type="radio" id="gm" name="gm" class="mt-1" value="1" checked/> Yes
                        <input type="radio" id="gm" name="gm" class="ml-5 mt-1" value="0"/> No
                        @error('gm')
                        <div class="mt-2 invalid-form">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <span class="infoAcc text-uppercase mt-2">Game System :</span>
                    <div class="form-outline form-white mb-2">
                        <select class="custom-select form-control mt-2" id="gsys" name="gsys">
                            <option value="ASC-id" selected>Game System...</option>
                            @foreach($gameSystems as $gs)
                                <option value="{{$gs->id}}">{{$gs->name}}</option>
                            @endforeach
                        </select>
                        @error('gsys')
                        <div class="mt-2 invalid-form">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <span class="infoAcc text-uppercase mt-2">Gaming Expertise Level :</span>
                    <div class="form-outline  form-white ">
                        <select class="custom-select form-control mt-2 mb-2" id="level" name="level">
                            <option value="ASC-id" selected>Level...</option>
                            @foreach($levels as $lev)
                                <option value="{{$lev->id}}">{{$lev->name}}</option>
                            @endforeach
                        </select>
                        @error('level')
                        <div class="mt-2 invalid-form">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <span class="infoAcc text-uppercase">Table Description :</span>
                    <div class="mb-2 form-group">
                        <textarea class="form-control mt-1 contxt" name="about" id="about" rows="3">{{old('about')}}</textarea>
                        @error('about')
                        <div class="mt-2 invalid-form">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                        <div class="form-outline form-white text-center">
                            <span class="infoAcc text-uppercase">Image :</span><br>
                            <input type="file" id="image" name="image" class="form-control form-control-lg mt-1"/>
                            @error('image')
                            <div class="mt-2 invalid-form">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    <div class="mt-4">

                        <button type="submit" class="btn btn-outline-light btn-lg px-4" id="submit" name="submit">Submit</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
