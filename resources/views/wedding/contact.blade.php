@extends('wedding.layouts.app')
@section('navbar')
    <div class="col-xs-10 text-right menu-1">
        <ul>
            <li><a href="{{ route('front.data.wish') }}">Home</a></li>
            <li><a href="{{ route('front.data.gallery') }}">Gallery</a></li>
            <li class="active"><a href="/contact">Contact</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
@endsection
@section('content')
    <div class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6 animate-box">
                    <h3>Get In Touch</h3>
                    <form action="{{ route('post.contact') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="fname">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your name"
                                    required oninvalid="this.setCustomValidity('Please fill in your name')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Email (required not publish)</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Your email address" required
                                    oninvalid="this.setCustomValidity('Please fill in your email')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="phone">Phone/WA (required not publish)</label>
                                <input type="number" id="phone" name="phone" class="form-control"
                                    placeholder="Your phone number" required
                                    oninvalid="this.setCustomValidity('Please fill in your number phone')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" name="message" cols="30" rows="10"
                                    class="form-control" placeholder="Write us something" required
                                    oninvalid="this.setCustomValidity('Please fill in your message')"
                                    oninput="setCustomValidity('')"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-5 col-md-pull-5 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Contact Information</h3>
                        <ul>
                            <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
                            <li class="phone"><a href="tel://81222878183">+ 81222 87 8183</a></li>
                            <li class="email"><a href="mailto:indry@sefviana.com">indry@sefviana.com</a></li>
                            <li class="url"><a href="http://sefviana.com/indry">sefviana.com</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
