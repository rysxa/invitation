<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') {{ $event[0]->man_first }} &amp;
        {{ $event[0]->women_first }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Wedding Invitation Gratis" />
    <meta name="keywords" content="Buat Undangan Pernikahan Gratis" />
    <meta name="google" content="Buat Undangan Pernikahan Gratis" />
    <meta property="og:image" content="{{ asset('images/logo-nicewone-landscape-transparant.png') }}">
    <meta name="author" content="Indry Sefviana - Modify" />

    <!-- 
 //////////////////////////////////////////////////////

 FREE HTML5 TEMPLATE 
 DESIGNED & DEVELOPED by FREEHTML5.CO

 Modify     : Indry Sefviana
 Co-founder : http://sefviana.com/

 Website    : http://freehtml5.co/

 //////////////////////////////////////////////////////
 -->

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('wedding/wedding/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('wedding/wedding/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('wedding/wedding/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('wedding/wedding/css/magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('wedding/wedding/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/wedding/css/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('wedding/wedding/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('wedding/wedding/js/modernizr-2.6.2.min.js') }}"></script>
</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div>
                            <a href="{{ route('front.data.wish', $user) }}">{{ $event[0]->man_first }} &amp;
                                {{ $event[0]->women_first }}<strong>.</strong></a>
                        </div>
                    </div>
                    @yield('navbar')
                </div>
            </div>
        </nav>

        <header id="fh5co-header" class="fh5co-cover" role="banner"
            style="background-image:url({{ Storage::url('public/images/' . $gallery_head[0]->head_picture) }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                @if ($event)
                                    <h1>{{ $event[0]->man_first }} &amp;
                                        {{ $event[0]->women_first }}</h1>
                                    <h2>We Are Getting Married</h2>
                                    {{-- <div class="simply-countdown simply-countdown-one"></div> --}}
                                @else
                                    <h2>Create Your Invitation</h2>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer id="fh5co-footer" role="contentinfo">
            <div class="container">

                <div class="row copyright">
                    <div class="col-md-12 text-center">
                        <p>
                            <small class="block">&copy; 2021 niceWone.com All Rights Reserved.</small>
                        </p>
                        <p>
                        <ul class="fh5co-social-icons">
                            <li><a target="_blank" href="https://twitter.com/niceweone"><i class="icon-twitter"></i></a>
                            </li>
                            <li><a target="_blank" href="https://www.instagram.com/nicewone/"><i
                                        class="icon-instagram"></i></a></li>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('wedding/wedding/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('wedding/wedding/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('wedding/wedding/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('wedding/wedding/js/jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('wedding/wedding/js/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('wedding/wedding/js/jquery.countTo.js') }}"></script>

    <!-- Stellar -->
    <script src="{{ asset('wedding/wedding/js/jquery.stellar.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('wedding/wedding/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('wedding/wedding/js/magnific-popup-options.js') }}"></script>

    <script src="{{ asset('wedding/wedding/js/simplyCountdown.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('wedding/wedding/js/main.js') }}"></script>

    {{-- <script>
        var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

        // default example
        simplyCountdown('.simply-countdown-one', {
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate()
        });

        //jQuery example
        $('#simply-countdown-losange').simplyCountdown({
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate(),
            enableUtc: false
        });
    </script> --}}

</body>

</html>
