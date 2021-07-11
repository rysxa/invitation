@extends('wedding.layouts.app')
@section('title', 'WI Sefviana.com')
@section('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Wedding Invitation" />
    <meta name="author" content="Indry Sefviana" />
    <meta property="title" content="" />
    <meta name="description" content="" />
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="{{ route('front.data.wish', $user) }}" />
    <meta property="og:site_name" content="sefviana.com" />
    <meta property="og:description" content="Wedding Invitation " />
    <meta name="twitter:title" content="Wedding Invitation" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="{{ route('front.data.wish', $user) }}" />
    <meta name="twitter:card" content="" />
@endsection

@section('navbar')
    <div class="col-xs-10 text-right menu-1">
        <ul>
            <li class="active"><a href="{{ route('front.data.wish', $user) }}">Home</a></li>
            <li><a href="{{ route('front.data.gallery', $user['username']) }}">Gallery</a></li>
            <li><a href="{{ route('front.data.contact', $user['username']) }}">Contact</a></li>
        </ul>
    </div>
@endsection
@section('content')


    <div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>{{ $event[0]->title }}</h2>
                    <h3>{{ date('F j, Y', strtotime($event[0]->date_wedding)) . ' ' . $event[0]->address }},
                        {{ $event[0]->city }}</h3>
                    <p>{{ $event[0]->caption }}</p>
                </div>
            </div>
            <div class="couple-wrap animate-box">
                <div class="couple-half">
                    <div class="groom">
                        <img src="{{ Storage::url('public/images/' . $event[0]->pic_man) }}" alt="groom"
                            class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        <h3>{{ $event[0]->man_first . ' ' . $event[0]->man_last }}</h3>
                        <p>{{ $event[0]->caption_man }}</p>
                    </div>
                </div>
                <p class="heart text-center"><i class="icon-heart2"></i></p>
                <div class="couple-half">
                    <div class="bride">
                        <img src="{{ Storage::url('public/images/' . $event[0]->pic_women) }}" alt="groom"
                            class="img-responsive">
                    </div>
                    <div class="desc-bride">
                        <h3>{{ $event[0]->women_first . ' ' . $event[0]->women_last }}</h3>
                        <p>{{ $event[0]->caption_women }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-event" class="fh5co-bg" style="background-image:url(images/img_bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <span>Our Special Events</span>
                    <h2>Wedding Events</h2>
                </div>
            </div>
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-6 col-sm-6 text-center">
                                <div class="event-wrap animate-box">
                                    <h3>Main Ceremony</h3>
                                    <div class="event-col">
                                        <i class="icon-clock"></i>
                                        <span>{{ $event[0]->ceremony_time_start }}</span>
                                        <span>{{ $event[0]->ceremony_time_end }}</span>
                                    </div>
                                    <div class="event-col">
                                        <i class="icon-calendar"></i>
                                        <span>{{ date('l', strtotime($event[0]->ceremony_date)) }}</span>
                                        <span>{{ date('F j, Y', strtotime($event[0]->ceremony_date)) }}</span>
                                    </div>
                                    <p>{{ $event[0]->ceremony_caption }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 text-center">
                                <div class="event-wrap animate-box">
                                    <h3>Wedding Party</h3>
                                    <div class="event-col">
                                        <i class="icon-clock"></i>
                                        <span>{{ $event[0]->party_time_start }}</span>
                                        <span>{{ $event[0]->party_time_end }}</span>
                                    </div>
                                    <div class="event-col">
                                        <i class="icon-calendar"></i>
                                        <span>{{ date('l', strtotime($event[0]->party_date)) }}</span>
                                        <span>{{ date('F j, Y', strtotime($event[0]->party_date)) }}</span>
                                    </div>
                                    <p>{{ $event[0]->party_caption }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <span>Friends Wishes</span>
                            <h2>Your Wishes</h2>
                        </div>
                    </div>
                    <form action="{{ route('post.wish', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="username_id" value="{{ $user->username }}">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your firstname"
                                    required oninvalid="this.setCustomValidity('Harap isi nama')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Email (required not publish)</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Your email address" required
                                    oninvalid="this.setCustomValidity('Harap isi email')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="phone">Phone/WA (required not publish)</label>
                                <input type="number" id="phone" name="phone" class="form-control"
                                    placeholder="Your phone number" required
                                    oninvalid="this.setCustomValidity('Harap isi no telepon')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" name="message" cols="30" rows="10"
                                    class="form-control" placeholder="Write us something" required
                                    oninvalid="this.setCustomValidity('Harap isi pesan')"
                                    oninput="setCustomValidity('')"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div id="fh5co-started" class="fh5co-bg" style="background-image:url(wedding/wedding/images/img_bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>RSVP</h2>
                    <p>Please Fill-up the form to notify you that you're attending. Thanks.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-inline" action="{{ route('post.attendance', $user) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="username_id" value="{{ $user->username }}">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input type="name" class="form-control" id="name" name="name" placeholder="Name" required
                                    oninvalid="this.setCustomValidity('Harap isi nama')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required oninvalid="this.setCustomValidity('Harap isi email')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="phone" class="sr-only">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone"
                                    required oninvalid="this.setCustomValidity('Harap isi no telepon')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-default btn-block">I am Attending</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-couple-story">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <ul class="timeline animate-box">
                        @foreach ($wish as $d)
                            <li class="animate-box">
                                <div class="timeline-badge"
                                    style="background-image:url(wedding/wedding/images/couple-1.jpg);">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3 class="timeline-title">{{ $d->name }}</h3>
                                        <span class="date">{{ date('F j, Y, g:i a', strtotime($d->created_at)) }}</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{ $d->message }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        {{-- issue kiri kanan content --}}
                        {{-- <li class="timeline-inverted animate-box">
                        <div class="timeline-badge" style="background-image:url(wedding/wedding/images/couple-2.jpg);">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3 class="timeline-title">Name</h3>
                                <span class="date">December 28, 2015</span>
                            </div>
                            <div class="timeline-body">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in
                                    Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                                </p>
                            </div>
                        </div>
                    </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
