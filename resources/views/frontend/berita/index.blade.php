@extends('frontend.layouts.main')
@section('isi')
<!-- Page title -->
<section class="page-title-wrap position-relative bg-light">
    <div id="particles_js"></div>
    <div class="container">
        <div class="row">
            <div class="col-11">
                <div class="page-title position-relative pt-5 pb-3">
                    <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                        data-delay="1.2">
                        <li>
                            <a href="{{ route('index') }}">Beranda</a>
                        </li>
                        <li>
                            <i class="fas fa-angle-double-right"></i>
                        </li>
                        <li>
                            <a href="#">Berita</a>
                        </li>
                    </ul>
                    <h1 data-animate="fadeInUp" data-delay="1.3">Berita Terkini</h1>
                </div>
            </div>
            <div class="col-1">
                <div class="world-map position-relative">
                    <img src="img/map.svg" alt="" alt="" data-no-retina class="svg">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Page title -->

<!-- Berita -->
<section class="blog pb-7">
    <div class="container">
        <div class="row">
            <!-- Berita -->
            <div class="col-md-8">
                @if ($beritas->isNotEmpty())

                @foreach ($beritas as $berita)
                <div class="single-post" data-animate="fadeInUp" data-delay=".1">
                    <div class="image-hover-wrap">
                        @if (!empty($berita->image))
                        <img src="{{ asset('storage/berita/'.$berita->image) }}" alt="{{ $berita->judul_berita }}" style="max-width: 500px">
                        @else
                        <img src="{{ asset('img/background3.jpg') }}" alt="{{ $berita->judul_berita }}" style="max-width: 500px">
                        @endif
                    </div>
                    <span>Posted on {{ $berita->created_at->diffForHumans() }} || Updated on {{
                        $berita->created_at->diffForHumans() }}</span>
                    <h4>{{ $berita->judul_berita }}</h4>
                    <a href="{{ route('news.show', $berita->id) }}">Lanjutkan membaca<i
                            class="fas fa-caret-right"></i></a>
                </div>
                @endforeach

                @else
                <div class="alert alert-primary text-center" role="alert">
                    Berita sedang diperbaharui oleh administrator!!
                </div>
                @endif
                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $beritas->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <aside>

                    <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                        <h3 data-animate="fadeInUp" data-delay=".2">Berita lainnya</h3>
                        <ul class="recent-posts list-unstyled mb-0">
                            @foreach ($berita_lainnya as $lainnya)
                            <li data-animate="fadeInUp" data-delay=".25">
                                <a href="{{ route('news.show', $lainnya->id) }}">{{ $lainnya->judul_berita }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</section>
<!-- End of Berita -->
@endsection