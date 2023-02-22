@extends('layouts.layout')

@section('title') - Update Your Table @endsection

@section('content')
    <section class=" login-bg">
        <div class="container ">
            <div class="bg-dark card col-12 col-lg-10 m-5  text-center d-flex flex-column align-items-center justify-content-center profilePersonal profilLeft">

                <div class="w-100 m-4 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">

                    <span class="text-left w-100 p-3 infoBorder"><h2>Edit Your Table</h2></span>
                    <form class="col-8" method="post" action="{{route('table.update',$table->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-outline form-white text-center mt-2 mb-2">
                        <span class="infoAcc text-uppercase">Table Name :</span><br>
                        <input type="text" id="name" class="form-control form-control-lg mt-1" name="name" value="{{$table->name}}"/>
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
                            <input class="form-check-input" type="checkbox" name="days[]" value="{{$d->id}}" id="day{{$d->id}}"
                                   @if(isset($table) && in_array($d->id, $table->days()->pluck('days.id')->toArray()))
                            checked
                                @endif>
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
                    <div class="form-outline mt-2 form-white">
                        <span class="infoAcc text-uppercase ">Game Master Required :</span><br>
                        <input type="radio" id="gm" name="gm" class="mt-1" value="1" @if($table->game_master==1) checked @endif/> Yes
                        <input type="radio" id="gm" name="gm" class="ml-5 mt-1" value="0" @if($table->game_master==0) checked @endif/> No
                        @error('gmaster')
                        <div class="mt-2 invalid-form">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <span class="infoAcc text-uppercase mt-2">Game System :</span>
                    <div class="form-outline form-white ">
                        <select class="custom-select form-control mt-2 mb-2" id="gSys" name="gsys">
                            <option value="0" selected>Game System...</option>
                            @foreach($gameSystems as $gs)
                                <option value="{{$gs->id}}" @if($table->game_system_id == $gs->id) selected @endif>{{$gs->name}}</option>
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
                                <option value="{{$lev->id}}" @if($table->level_id == $lev->id) selected @endif>{{$lev->name}}</option>
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
                        <textarea class="form-control mt-1 contxt" name="about" id="exampleFormControlTextarea1" rows="3">{{$table->about}}</textarea>
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
                        <button type="submit" class="btn btn-outline-light btn-lg px-4" name="submit">Update</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
