@extends('layouts.layout')

@section('title') - Edit Account @endsection

@section('content')
    <section class=" login-bg">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="bg-dark card col-12 col-lg-7 m-5  text-center d-flex flex-column align-items-center justify-content-center profilePersonal profilLeft">

                <div class="w-100 m-4 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">
{{--{{dd($user)}}--}}

                    <span class="text-left w-100 p-3 infoBorder"><h2>Edit Account</h2></span>
                        <form class="col-10" method="post" action="{{route('account.update',$user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    <div class="form-outline  form-white mt-2 text-center custom-file">
                        <span class="infoAcc text-uppercase">Username :</span><br>
                        <input type="text" class="form-control mt-2 pb-2" id="username" value="{{$user->username}}" readonly>
                        <input type="hidden" id="userId" name="userId" value="{{$user->id}}">
                    </div>
                    <br>

                    <div class=" form-outline form-white mt-3 mb-2 text-center">
                        <span class="infoAcc text-uppercase ">Roles :</span><br>
                        @foreach($roles as $role)
                            <input class="form-check-input" type="checkbox" name="gameroles[]" value="{{$role->id}}" id="role{{$role->id}}"
                            @if(isset($user) && in_array($role->id, $user->gameroles()->pluck('game_roles.id')->toArray()))
                                checked
                                   @elseif(is_array(old('game_roles.id')) && in_array($role->id, old('game_roles.id')))
                                   checked
                                @endif
                            >
                            <label class="form-check-label" for="day{{$role->id}}">
                                {{$role->name}}
                            </label><br>
                        @endforeach
                    </div>
                            @error('gameroles')
                            <div class="mt-2 invalid-form">
                                {{$message}}
                            </div>
                            @enderror
                            <span class="infoAcc text-uppercase mt-2">About :</span>
                    <div class=" form-group">
                        <textarea class="contxt form-control mt-1" id="userAbout" name="about" rows="3">{{ $user->about ?? old('about') }}</textarea>
                    </div>
                            <div class="form-outline col-10 form-white text-center custom-file">
                        <span class="infoAcc text-uppercase">Image :</span><br>
                        <input type="file" class="form-control mt-2 pb-2" id="userImg" name="userImg">
                                @error('image')
                                <div class="mt-2 invalid-form">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-outline-light btn-lg px-5" id="updateAcc" name="update">Update</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
