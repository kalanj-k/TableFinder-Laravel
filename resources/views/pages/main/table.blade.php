@extends('layouts.layout')

@section('title') - {{$table->name}} @endsection

@section('content')
    <div class="container">
    <div class="bg-dark card  m-5 p-4 profilePersonal d-flex flex-column align-items-center justify-content-center">

        <div class="w-100 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">
            <span class="text-left w-100 p-3 infoBorder"><h2>{{$table->name}}
{{--{{dd($comments)}}--}}
                </h2></span>
            <div class="d-flex flex-column flex-lg-row pl-4 pr-4 align-items-center justify-content-around">
                <div class="mt-4 col-10 col-lg-4">
                    <img src="{{asset('assets/img/'.$table->image)}}" alt="{{$table->alt}}" class="mb-3 img-fluid postSlika">
                    <div class="text-center">
                    @if(session()->get('user')->id==$table->user_id)

                                <a href="{{route('table.edit',$table->id)}}">
                                    <i class="far fa-edit pr-2 pl-2"></i>Edit Table
                                </a><br>
                        <form method="post" action="{{route('table.destroy',$table->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-2 btn text-light px-4"> <i class="far fa-trash-alt pr-2"></i>Delete Table</button>
                        </form>
                    @endif
                </div>
                </div>
                <div class="mt-4 col-10 col-lg-7">
                    <span class="infoAcc text-uppercase">About :</span><br>
                    <div class="accAbout overflow-auto infoBorder mb-2">
                        <p>{{$table->about}}</p>
                    </div>
                    <span class="infoAcc text-uppercase">Details :</span><br>
                    <div class="infoBorder mb-2">
                        <p class="pt-3">
                            <i class="fa-solid fa-crown"></i> Owner : <a href="{{route('account',$table->user_id)}}">{{$table->u_name}}</a><br>
                            <i class="fa-solid fa-hat-wizard"></i> Game Master : @if($table->game_master) Required<br> @else Not Required<br> @endif
                            <i class="fa-solid fa-gear"></i> Level required : {{$table->l_name}}<br>
                            <i class="fa-solid fa-book"></i> Game System : {{$table->gs_name}}<br>
                            <i class="fa-solid fa-calendar"></i> Created at : {{$table->date}}<br>
                        </p>
                    </div>
                    <span class="infoAcc text-uppercase">Days :</span><br>
                    <div class="infoBorder mb-2 pt-3 pb-3">
                        @foreach($table->days as $d)
                            {{$d->name}} <br>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="mt-4 col-11 d-flex flex-column align-items-center justify-content-center">
                <div class="col-12 text-left">
                    <h3>Comments</h3>
                </div>
                <div id="commentsDiv" class=" col-12">


{{--                @foreach($comments as $com)--}}
{{--                    @include('partials.comment')--}}
{{--                @endforeach--}}

                </div>
                <div class="col-12 d-flex flex-column align-items-center justify-content-center p-2 ">
                    <form class="col-12">
                        <div>
                            <input type="hidden" id="tableId" value="{{$table->id}}">
                            <input type="hidden" id="sessionUserId" value="{{session()->get('user')->id}}">

                            <textarea class="col-12 p-2 mt-2 txtComment" id="commentOnTable" name="txtComment" ></textarea>
                            <div class="text-center mb-2 invalid-form" id="commAjax">
                                Field cannot be empty.
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button type="button" class="btn btn-outline-light btn-lg px-4" id="commSubmit" name="submit">Comment</button>
                        </div>

                    </form>
                </div>
            </div>




        </div>
    </div>
    </div>
@endsection
