@extends('wedding.layouts.app')
@section('navbar')
    <div class="col-xs-10 text-right menu-1">
        <ul>
            <li><a href="{{ route('front.data.wish') }}">Home</a></li>
            <li class="active"><a href="{{ route('front.data.gallery') }}">Gallery</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
@endsection
@section('content')
    <div id="fh5co-couple-story">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <span>We Love Each Other</span>
                    <h2>Our Story</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <ul class="timeline animate-box">
                        @foreach ($story as $d)
                            <li class="animate-box">
                                <div class="timeline-badge"
                                    style="background-image:url({{ Storage::url('public/images/' . $d->picture) }});">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3 class="timeline-title">{{ $d->subject }}</h3>
                                        <span class="date">{{ date('F j, Y', strtotime($d->date)) }}</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{ $d->message }}</p>
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
                                    <h3 class="timeline-title">First Date</h3>
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

    <div id="fh5co-gallery" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <span>Our Memories</span>
                    <h2>Wedding Gallery</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <ul id="fh5co-gallery-list">
                        @foreach ($gallery as $e)
                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image: url({{ Storage::url('public/images/' . $e->picture) }}); ">
                                <a href="{{ Storage::url('public/images/' . $e->picture) }}">
                                    <div class="case-studies-summary">
                                        <h2>{{ $e->caption }}</h2>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-services" class="fh5co-section-gray">
        <div class="container">

            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Wedding Video</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                        provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-6 animate-box">
                    <div class="fh5co-video fh5co-bg" style="background-image: url(https://www.youtube.com/watch?v=4n5bpeh5NNg); ">
                        <a href="https://www.youtube.com/watch?v=4n5bpeh5NNg" class="popup-vimeo"><i
                                class="icon-video2"></i></a>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-6 animate-box">
                    <a href="https://www.youtube.com/watch?v=4n5bpeh5NNg" class="popup-vimeo"><i
                            class="icon-video2"></i></a>
                    <iframe class="popup-vimeo" width="560" height="315" src="https://www.youtube.com/embed/4n5bpeh5NNg"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen><i class="icon-video2"></i></iframe>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
