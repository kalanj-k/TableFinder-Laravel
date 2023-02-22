@extends('layouts.layout')

@section('title') - Admin @endsection

@section('content')
    <div class="d-flex flex-column  align-items-center justify-content-start min-vh-100" id="adminbckg">

        <div class="w-100 d-flex flex-column flex-lg-row justify-content-around align-items-center align-items-lg-start flex-wrap flex-shrink-0 p-3 text-white bg-dark" id="adminLeft">
            <div class=" text-center mb-2">
                    <h5 class="mb-2">Activity</h5>
                <a href="#" id="showAllActivity">Show All Activity</a>
            </div>
            <div class=" text-center mb-2">
                    <h5 class="mb-2">Users</h5>
                <a href="#" id="showAllUsers">Show All Users</a>  <br>
                <a href="#" id="createNewUser">Create New User</a>
            </div>
            <div class=" text-center mb-2">
                <h5 class="mb-2">Tables</h5>
                <a href="#" id="showAllTables">Show All Tables</a>
            </div>
            <div class=" text-center mb-2">
                <h5 class="mb-2">Comments</h5>
                <a href="#" id="showAllComments"> Show All Comments </a> <br>
            </div>
            <div class=" text-center mb-2">
                    <h5 class="mb-2">Game Systems</h5>
                <a href="#" id="showAllSystems"> Show All Systems </a><br>
                <a href="#" id="createNewSystem"> Create New System </a>
            </div>
            <div class=" text-center mb-2">
                    <h5 class="mb-2">Messages</h5>
                <a href="#" id="showAllMessages">Show All Messages</a> <br>
            </div>
            <div class=" text-center mb-2">
                <h5 class="mb-2">Ads</h5>
                <a href="#" id="showAllAds"> Show All Ads </a><br>
                <a href="#" id="createNewAdd"> Create New Ad </a>
            </div>
            <div class=" text-center mb-2">
                    <h5 class="mb-2">Socials</h5>
                <a href="#" id="showAllSocials"> Show All Socials </a><br>
                <a href="#" id="createNewSocial"> Add New Social Network </a><br>
            </div>
        </div>
        <div class="col-12 d-flex flex-column  justify-content-start align-items-center">

            <div class="col-10 text-center d-flex flex-column  justify-content-start align-items-center" id="adminContent">
                <div class="mt-4 col-3">
                    <img src="{{asset('assets/img/'.session()->get('user')->image)}}" class="img-fluid profilSlika"/>
                </div>
                <div class="m-4">
                    <h2>Welcome, {{session()->get('user')->username}}.</h2>

                </div>

            </div>

        </div>
    </div>
@endsection
