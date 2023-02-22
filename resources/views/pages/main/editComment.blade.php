@extends('layouts.layout')
@section('title') - Edit Comment @endsection

@section('content')
    <section class=" login-bg">
        <div class="container ">
            <div class="bg-dark card col-12 col-lg-10 m-5  text-center d-flex flex-column align-items-center justify-content-center profilePersonal profilLeft">

                <div class="w-100 m-4 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">

                    <span class="text-left w-100 p-3 infoBorder"><h2>Edit Your Comment</h2></span>

                    <div class="col-10">
                        <form method="post" action="{{route('comment.update',$comment->id)}}" class="col-12">
                            @csrf
                            @method('PUT')
                            <div>
                                <textarea class="col-12 p-2 mt-2 txtComment" id="commentOnTable" name="commentText" >{{$comment->text}}</textarea>
                                @error('commentText')
                                <div class="invalid-form">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="text-center mt-2">
                                <button type="submit" class="btn btn-outline-light btn-lg px-4" id="commSubmit" name="submit">Comment</button>
                            </div>

                        </form>

                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection
