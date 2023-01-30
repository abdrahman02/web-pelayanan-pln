<!-- Main header -->
<header class="header">
    <div class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-sm-3 col-9">
                    <!-- Logo -->
                    <div class="logo" data-animate="fadeInUp" data-delay=".7">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('img/navbar-icon.png') }}" alt="PLN" style="max-width: 100px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-3 col-3">
                    <nav data-animate="fadeInUp" data-delay=".9">
                        <!-- Header-menu -->
                        <div class="header-menu">
                            <ul>
                                <li class="{{ Request::is('/') ? 'active' : '' }}" style="margin-left: 1.5rem">
                                    <a href="{{ route('index') }}">Beranda</a>
                                </li>
                                <li class="{{ Request::is('news*') ? 'active' : '' }}" style="margin-left: 1.5rem">
                                    <a href="{{ route('news.index') }}">Berita</a>
                                </li>
                                @can('pelanggan')
                                <li>
                                    <a href="#">Layanan <i class="fas fa-caret-down"></i></a>
                                    <ul>
                                        <li class="{{ Request::is('new-power*') ? 'active' : '' }}"
                                            style="margin-left: 1.5rem">
                                            <a href="{{ route('new-power.index') }}">Penyambungan Baru</a>
                                        </li>
                                        <li class="{{ Request::is('change-power*') ? 'active' : '' }}"
                                            style="margin-left: 1.5rem">
                                            <a href="{{ route('change-power.index') }}">Perubahan Daya</a>
                                        </li>
                                        <li class="{{ Request::is('pengaduan*') ? 'active' : '' }}"
                                            style="margin-left: 1.5rem">
                                            <a href="{{ route('pengaduan.index') }}">Pengaduan</a>
                                        </li>
                                    </ul>
                                </li>

                                @endcan
                                <li class="{{ Request::is('about*') ? 'active' : '' }}" style="margin-left: 1.5rem">
                                    <a href="{{ route('about.index') }}">Tentang Kami</a>
                                </li>
                                @can('admin')
                                <li>
                                    <a href="{{ route('berita.index') }}">
                                        <i class="fe fe-home"></i>
                                        Halaman Belakang
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                        <!-- End of Header-menu -->
                    </nav>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 d-none d-sm-block">
                    <!-- Client area -->
                    <ul class="client-area text-right list-inline m-0 float-end" data-animate="fadeInUp"
                        data-delay="1.1">

                        @if (auth()->user())
                        <li class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                @php
                                $image = auth()->user()->image
                                @endphp
                                <span>
                                    @if (!empty($image))
                                    <img src="{{ asset('storage/user/'.$image) }}" alt="profile-user" class="avatar"
                                        style="height: 40px; width: 40px; border-radius: 50%; background-size: cover; border: 2px solid #000;">
                                    @else
                                    <img src="{{ asset('img/6.jpg') }}" alt="profile-user" class="avatar"
                                        style="height: 40px; width: 40px; border-radius: 50%; background-size: cover; border: 2px solid #000;">
                                    @endif
                                    {{-- {{ auth()->user()->name }} --}}
                                    <i class="fas fa-caret-down"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right client-links "
                                aria-labelledby="dropdownMenuLink">
                                @can('pelanggan')
                                <li>
                                    <a href="{{ route('pengguna.edit', auth()->user()->id) }}">
                                        <i class="ti ti-settings"></i>
                                        Settings
                                    </a>
                                </li>
                                @endcan
                                <li>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="ti ti-power-off"> Log Out</span>
                                        <form action="{{ route('logout') }}" method="post" id="logout-form"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li>
                            <a class="btn btn-secondary" href="{{ route('login') }}">Log In</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Main header -->