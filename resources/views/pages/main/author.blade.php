@extends('layouts.layout')

@section('title') - Author @endsection

@section('content')
    <section class="vh-100 login-bg">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-3 mt-md-4 ">
                                <div class="">
                                    <img src="assets/img/disc.jpg" alt="slika123" class="img-fluid mb-2 slikaAuthor">
                                </div>
                                <div class="p-3 text-justify">
                                    <p>

                                    My name is Katarina Kalanj.<br>
                                    I'm currently a student, and this is one of my projects.
                                    I've always loved being creative and challenging myself.
                                    I'm passionate about making websites; a team player who knows how to make your ideas a reality.<br>
                                    Click <span class="authUnder"><a href="https://katarinakalanj.netlify.com/" target="_blank">here</a></span> to see my portfolio.<br>
                                    Click <span class="authUnder"><a href="models/wordDoc.php">here</a></span> to get a Word file with my info.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start justify-content-center">


    </div>
@endsection
