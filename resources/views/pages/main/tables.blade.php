@extends('layouts.layout')

@section('title') - Find Tables @endsection

@section('content')
    <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start justify-content-center">
        <div class="order-2 order-lg-1 bg-dark card col-11 col-lg-7 m-5 p-4 profilePersonal d-flex flex-column align-items-center justify-content-center">
            <div class="col-12 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">
                <div id="allTables" class="col-12 flex-xl-row flex-column d-flex align-items-center justify-content-around flex-wrap">
                </div>
                <div class="d-flex justify-content-center col-12 mt-4" id="pagination">
                </div>
            </div>
        </div>
        <div class="order-1 order-lg-2 bg-dark card col-6 col-lg-3 m-5  text-center d-flex flex-column align-items-center justify-content-center profilePersonal profilLeft">

            <div class="w-100 m-4 bg-dark card d-flex flex-column align-items-center justify-content-center profilePersonal postBorder pb-4">

            <span class="text-left w-100 p-3 infoBorder"><h2>Tabletop Search</h2></span>
                <form>
                    <input type="hidden" id="first" value="1">
                <div class="form-outline  form-white text-center mt-2">
                    <span class="infoAcc text-uppercase">Table :</span><br>
                    <input type="text" id="tableName" name="table" class="form-control form-control-lg mt-1" />
                </div>
                <span class="infoAcc text-uppercase mt-2">Availability :</span>
                <div class="pl-5 form-outline form-white  mb-2 text-left">
                        @foreach($days as $d)
                        <input class="form-check-input" type="checkbox" class="days" name="days" value="{{$d->id}}" id="day{{$d->id}}">
                        <label class="form-check-label" for="day{{$d->id}}">
                            {{$d->name}}
                        </label><br>
                        @endforeach

                </div>

                <div class="form-outline  form-white text-center mt-2">
                    <span class="infoAcc text-uppercase">GAME MASTER REQUIRED :</span><br>
                    <input type="radio" id="gm" name="gm" class="mt-1" value="1"/> Yes
                    <input type="radio" id="gm" name="gm" class="ml-5 mt-1" value="0"/> No
                </div>

                <div class="form-outline  form-white ">
                    <select class="custom-select form-control mt-3" id="gSys" name="gSys">
                        <option value="0" selected>Game System...</option>
                        @foreach($gameSystems as $gs)
                        <option value="{{$gs->id}}">{{$gs->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-outline form-white ">
                    <select class="custom-select form-control mt-3 mb-2" id="ddSort" name="ddSort">
                        <option value="ASC-id" selected>Sort By...</option>
                        <option value="DESC-date">Newest</option>
                        <option value="ASC-date">Oldest</option>
                        <option value="ASC-name">A-Z</option>
                        <option value="DESC-name">Z-A</option>
                    </select>
                </div>
                <div class="form-outline mt-2  form-white ">
                    <select class="custom-select form-control mb-2" id="lvl" name="ddSort">
                        <option value="0" selected>Level...</option>
                        @foreach($levels as $lev)
                            <option value="{{$lev->id}}">{{$lev->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-outline-light btn-lg px-4" id="searchTables" name="submit">Search</button>
                    <button type="button" class="ml-3 btn btn-outline-light btn-lg px-4" id="resetTables" name="reset">Reset</button>
                </div>
                </form>
            </div>

            <div id="carouselExampleControls" class="col-10 mb-4 carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($ads as $ad)
                        <div class="carousel-item @if($loop->index == 0) active @endif">
                            <img class="d-block img-fluid carouselImages" src="{{ asset('assets/img/' . $ad->image) }}" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="{{$ad->link}}" target="_blank"><h5>{{$ad->text}}</h5></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>

    </div>


@endsection
