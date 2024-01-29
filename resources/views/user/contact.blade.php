@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Contact</p>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="message-area">
                        <form action="{{ route('user.contactstore') }}" method="POST" class="form-group message-area">
                            @csrf
                            <h2>Contact Us</h2>
                            <input class="form-control" type="text" name="fullname" id="fullname"
                                placeholder="Full Name">
                            <br>
                            <div class="contact-email-phone">
                                <input class="form-control" type="text" name="email" id="email"
                                    placeholder="Email">
                                <input class="form-control" type="text" name="phone" id="phone"
                                    placeholder="Phone Number">
                            </div>

                            <br>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                            <br>
                            <div class="sub-btn">
                                <button class="submit btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                        <hr>
                        <div class="contact-number">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">University Administration</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Phone</h6>
                                    <p class="card-text">+94678743678</p>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Email</h6>
                                    <p class="card-text">uoj@sliate.ac.lk</p>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">SecureSpot Tech Support</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Phone</h6>
                                    <p class="card-text">+94110076076</p>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Email</h6>
                                    <p class="card-text">securespot@se.lk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
