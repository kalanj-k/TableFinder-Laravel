@extends('layouts.layout')

@section('title') - Account @endsection

@section('content')
    <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start justify-content-center">
        <div class="bg-dark card col-6 col-md-3 m-5 p-3 text-center d-flex flex-column align-items-center justify-content-center profilePersonal profilLeft">
            <div class="w-75">
                <img src="{{asset('assets/img/'.$user->image)}}" class="img-fluid mb-2 profilSlika" alt="{{$user->alt}}">
                <p class="pb-2 infoBorder">
                    <span class="infoAcc text-uppercase">{{$user->username}}</span>
                </p>

                <p class="pb-3 infoBorder">
                    Date of Registration :<br> {{$user->created_at}}<br>
                </p>
                <p class="pb-2 infoBorder">
                    <span class="infoAcc text-uppercase">Roles :</span><br>
                    @foreach($user->gameroles as $role)
                        {{$role->name}} <br>
                    @endforeach
                </p>
                <p class="mb-0 ">
                    <span class="infoAcc text-uppercase">About :</span><br>
                    <div class="accAbout overflow-auto">
                    <p>{{$user->about}}</p>
                </div>
                </p>
            </div>
        </div>


        <div class="bg-dark card col-11 col-md-7 m-5 p-4 profilePersonal d-flex flex-column align-items-center justify-content-center">
            <div class="w-75 d-flex align-items-between justify-content-between mb-4">

                @if(session()->get('user')->id == $user->id)
                <div>
                    <a href="{{route('table.create')}}"><button type="button" class="btn btn-outline-light btn-lg px-4" id="register" name="register">New Table</button></a>
                </div>
                <div >
                    <a href="{{route('account.edit', $user->id)}}"><button type="button" class="btn btn-outline-light btn-lg px-4" id="register" name="register">Edit Account</button></a>
                </div>
                @endif

            </div>



            <div class="w-100  bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">
                <span class="text-left w-100 p-3 infoBorder"><h2>{{$user->username}}'s Tables</h2></span>

                <div class="col-12 flex-xl-row flex-column d-flex align-items-center justify-content-around flex-wrap">
                    @foreach($tables as $table)
                        @include('partials.table',$table)
                    @endforeach
                </div>

            </div>

            <div class="w-100 mt-4 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder">
                <span class="text-left w-100 p-3 infoBorder"><h2>{{$user->username}}'s Comments</h2></span>
                <div class="w-100 d-flex flex-column align-items-center justify-content-center p-3 mt-2 col-10">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Table</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Date & Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $com)
                            <tr>
                                <th scope="row"><a href="{{route('table',$com->table_id)}}">{{$com->tname}}</a></th>
                                <td>{{$com->text}}</td>
                                <td>{{$com->created_at}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
