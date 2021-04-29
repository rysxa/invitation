<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wedding &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

    <!-- 
 //////////////////////////////////////////////////////

 FREE HTML5 TEMPLATE 
 DESIGNED & DEVELOPED by FREEHTML5.CO

 Modify:      Indry Sefviana
 Github:      https://github.com/indrysfa
 Website: 		http://freehtml5.co/
 Email: 			info@freehtml5.co
 Twitter: 		http://twitter.com/fh5co
 Facebook: 		https://www.facebook.com/fh5co

 //////////////////////////////////////////////////////
 -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="Wedding Invitation" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="Wedding Invitation" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

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
                        <div id="fh5co-logo"><a href="{{ route('front.data.wish') }}">Wedding<strong>.</strong></a>
                        </div>
                    </div>
                    @yield('navbar')
                </div>

            </div>
        </nav>

        <header id="fh5co-header" class="fh5co-cover" role="banner"
            style="background-image:url(wedding/wedding/images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>{{ Str::substr($event[0]->user_man, 0,7) }} &amp; {{ Str::substr($event[0]->user_women, 0,7) }}</h1>
                                <h2>We Are Getting Married</h2>
                                <div class="simply-countdown simply-countdown-one"></div>
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
                            <small class="block">&copy; 2021 indrysfa All Rights Reserved.</small>
                        </p>
                        <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="https://twitter.com/indrysefvi"><i class="icon-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/indrysefvi/"><i class="icon-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/indry-sefviana/"><i class="icon-linkedin"></i></a>
                            </li>
                            <li><a href="https://github.com/indrysfa"><i class="icon-github"></i></a></li>
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

    <script>
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

    </script>

</body>

</html>
