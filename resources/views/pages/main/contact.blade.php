@extends('layouts.layout')
@section('title') - Contact Us @endsection

@section('content')
    <section class="vh-100 login-bg">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-3 mt-md-4 pb-3">

                                <div class="alert" role="alert" id="contactFeedback">

                                </div>
                                <h2 class="fw-bold mb-2 text-uppercase">Contact Us</h2>
                                <form>
                                <div class="form-outline form-white">
                                    <input type="email" id="email" class="form-control form-control-lg mt-3" placeholder="examplemail@mail.com"/>
                                    <label class="form-label mt-2" for="email">Email</label>
                                    <div class="text-center mb-2 invalid-form" id="emailError">
                                        Field filled incorrectly.
                                    </div>
                                </div>
                                <div class="form-outline form-white">
                                    <input type="text" id="subject" class="form-control form-control-lg" />
                                    <label class="form-label mt-2" for="text">Subject</label>
                                    <div class="text-center mb-2 invalid-form" id="subjectError">
                                        Field cannot be empty.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control contxt" id="message" rows="3"></textarea>
                                    <label class="form-label mt-2" for="message">Your Message</label>
                                    <div class="text-center mb-2 invalid-form" id="messageError">
                                        Field cannot be empty.
                                    </div>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" id="submit" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
