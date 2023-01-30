<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Document Title -->
    <title>{{ $title }} | PLN</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.jpg') }}">

    {{-- Cabin Font --}}
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-Bold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-BoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-Italic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-Medium.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-MediumItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-Regular.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-SemiBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Cabin/static/Cabin/Cabin-SemiBoldItalic.ttf') }}" rel="stylesheet">

    {{-- Robot Font --}}
    <link href="{{ asset('fonts/Roboto/Roboto-Black.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-BlackItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-Bold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-BoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-Italic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-Light.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-LightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-Medium.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-MediumItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-Regular.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-Thin.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Roboto/Roboto-ThinItalic.ttf') }}" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/frontend/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/frontend/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/colors/theme-color-1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom.css') }}">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Preloader -->
    <div class="preLoader"></div>

    @include('frontend.layouts.navbar')
    @yield('isi')

    {{-- Footer --}}
    <footer class="main-footer bg-primary pt-4">
        <div class="container">
            <div class="bottom-footer">
                <div class="row">
                    <!-- Copyright -->
                    <div class="col-md-5 order-last order-md-first">
                        <p class="copyright" data-animate="fadeInDown" data-delay=".85">&copy; Copyright {{ date('Y') }}
                            <strong><span> Perusahaan Listrik Negara (PLN)</span></strong>. All
                            Rights Reserved</p>
                    </div>

                    <!-- Footer menu -->
                    <div class="col-md-7 order-first order-md-last">
                        <ul class="footer-menu list-inline text-md-right mb-md-0" data-animate="fadeInDown"
                            data-delay=".95">
                            <li>Afilliate</li>
                            <li>|</li>
                            <li>Privacy Policy</li>
                            <li>|</li>
                            <li>Termns & Conditions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- End Footer --}}

    <!-- Back to top -->
    <div class="back-to-top">
        <a href="#"> <i class="fas fa-arrow-up"></i></a>
    </div>


    <!-- JS Files -->
    <script src="{{ asset('js/frontend/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/frontend/fontawesome-all.min.js') }}"></script>
    <script src="{{ asset('js/frontend/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/waypoints/sticky.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/particles.js/particles.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/particles.js/particles.settings.js') }}"></script>
    <script src="{{ asset('plugins/frontend/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/parsley/parsley.min.js') }}"></script>
    <script src="{{ asset('plugins/frontend/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('js/frontend/menu.min.js') }}"></script>
    <script src="{{ asset('js/frontend/scripts.js') }}"></script>
    <script src="{{ asset('js/frontend/custom.js') }}"></script>

    @stack('addon-script')

</body>

</html>