<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}" type="image/x-icon">

    <!-- TITLE -->
    <title>{{ $title }} | PLN</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />

    {{-- Google Fonts Poppins --}}
    <link href="{{ asset('fonts/Poppins/Poppins-Black.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-BlackItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-BoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraBoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraLight.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraLightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Italic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Light.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-LightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Medium.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-MediumItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-SemiBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-SemiBoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Thin.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ThinItalic.ttf') }}" rel="stylesheet">

</head>

<body class="ltr login-img" sty>

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto text-center">
                <a href="index.html" class="text-center">
                    <img src="img/navbar-icon.png" class="header-brand-img" alt="">
                </a>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        @if (session('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-frown-o me-2" aria-hidden="true"></i>
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        @if (session('regisSuccess'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i>
                            {{ session('regisSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        @yield('isi')
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="/" class="btn btn-orange text-center me-4">
                                <i class="fa fa-home"></i>
                                Back to home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- End PAGE -->


    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('js/sticky.js') }}"></script>

    <!-- COLOR THEME JS -->
    <script src="{{ asset('js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>