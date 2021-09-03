@extends('wedding.layouts.app')
@section('title', 'Gallery - ')
@section('meta')
    <meta name="description" content="Hari-hari bahagia kami" />
@endsection
@section('navbar')
    <div class="col-xs-10 text-right menu-1">
        <ul>
            <li><a href="{{ route('front.data.wish', $slug->slug) }}">Home</a></li>
            <li class="active"><a href="{{ route('front.data.gallery', $slug->slug) }}">Gallery</a></li>
            <li><a href="{{ route('front.data.contact', $slug->slug) }}">Contact</a></li>
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
                    <p>{{ $gallery_head[0]->head_story }}</p>
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
                    <p>{{ $gallery_head[0]->head_gallery }}</p>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <ul id="fh5co-gallery-list">
                        @foreach ($gallery as $e)
                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image: url({{ Storage::url('public/images/' . $e->picture) }}); ">
                                <a href="{{ Storage::url('public/images/' . $e->picture) }}" target="_blank">
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
            @if (!$gallery_head[0]->head_video || !$gallery_head[0]->url_video)
                {{ '' }}
            @else
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>Wedding Video</h2>
                        <p>{{ $gallery_head[0]->head_video }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/{{ $gallery_head[0]->url_video }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div class="overlay"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
