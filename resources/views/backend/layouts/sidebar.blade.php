<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('berita.index') }}">
                <img src="{{ asset('img/navbar-icon.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('img/navbar-icon.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('img/background4.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('img/navbar-icon.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li>
                    <h3>Front End</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" href="{{ route('index') }}">
                        <i class="fe fe-home side-menu__icon fs-1"></i> &nbsp;
                        <span class="side-menu__label">Halaman Depan</span>
                    </a>
                </li>
                {{-- End Halaman Depan --}}

                <li>
                    <h3>Dashboard</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link {{ Request::is('dashboard/berita*') ? 'active' : '' }}" href="{{ route('berita.index') }}">
                        <i class="fa fa-newspaper-o side-menu__icon fs-1"></i> &nbsp;
                        <span class="side-menu__label">Berita</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link {{ Request::is('dashboard/keluhan*') ? 'active' : '' }}" href="{{ route('keluhan.index') }}">
                        <i class="fe fe-edit-3 side-menu__icon"></i> &nbsp;
                        <span class="side-menu__label">Keluhan</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link {{ Request::is('dashboard/pasbar*') ? 'active' : '' }}" href="{{ route('pasbar.index') }}">
                        <i class="fe fe-activity side-menu__icon"></i> &nbsp;
                        <span class="side-menu__label">Pasang Baru</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link {{ Request::is('dashboard/udl*') ? 'active' : '' }}" href="{{ route('udl.index') }}">
                        <i class="fe fe-activity side-menu__icon"></i> &nbsp;
                        <span class="side-menu__label">Ubah Daya</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link {{ Request::is('dashboard/pelanggan*') ? 'active' : '' }}" href="{{ route('pelanggan.index') }}">
                        <i class="mdi mdi-account-outline side-menu__icon"></i> &nbsp;
                        <span class="side-menu__label">Pelanggan</span>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
<!--/APP-SIDEBAR-->