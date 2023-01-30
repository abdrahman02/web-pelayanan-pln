<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | PLN</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('js/trix.umd.min.js') }}"></script>

    {{-- Styling Trix Editor --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    {{-- FavIcon --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}" type="image/x-icon">

</head>

<body class="ltr app sidebar-mini">
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->
    @include('backend.layouts.header')
    @include('backend.layouts.sidebar')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">{{ $page_title }}</h1>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        @yield('isi')
                    </div>
                </div>

            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    <!-- app-content closed -->

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright &copy; {{ date('Y') }}<strong><span> Perusahaan Listrik Negara (PLN)</span></strong>. All
                    Rights
                    Reserved
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER CLOSED -->

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/table-data.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('plugins/p-scroll/pscroll.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('js/sticky.js') }}"></script>

    <!-- COLOR THEME JS -->
    <script src="{{ asset('js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('js/custom.js') }}"></script>

    @stack('addon-script')

</body>

</html>