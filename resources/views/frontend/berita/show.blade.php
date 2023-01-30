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
                            <a href="{{ route('news.index') }}">Berita</a>
                        </li>
                        <li>
                            <i class="fas fa-angle-double-right"></i>
                        </li>
                        <li>
                            <a href="#">{{ $berita->judul_berita }}</a>
                        </li>
                    </ul>
                    <h1 data-animate="fadeInUp" data-delay="1.3">Berita Terkini</h1>
                </div>
            </div>
            <div class="col-1">
                <div class="world-map position-relative">
                    <img src="{{ asset('img/map.svg') }}" alt="" alt="" data-no-retina class="svg">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Page title -->

<section class="blog pb-7">
    <div class="container">
        <div class="row">
            <!-- Berita -->
            <div class="col-md-8">
                <div class="post-details" data-animate="fadeInUp" data-delay=".1">
                    <div class="post-content">

                        @if (!empty($berita->image))
                        <img src="{{ asset('storage/berita/'.$berita->image) }}" alt="{{ $berita->judul_berita }}"
                            data-animate="fadeInUp" data-delay=".2" style="max-width: 700px">
                        @else
                        <img src="{{ asset('img/background3.jpg') }}" alt="{{ $berita->judul_berita }}"
                            data-animate="fadeInUp" data-delay=".2" style="max-width: 700px">
                        @endif

                        <span data-animate="fadeInUp" data-delay=".3">
                            Posted on
                            <a>{{ $berita->created_at->diffForHumans() }}</a>
                            Updated on
                            <a>{{ $berita->updated_at->diffForHumans() }}</a>
                            By
                            <a>{{ $berita->user->name }}</a>
                        </span>
                        <h2 data-animate="fadeInUp" data-delay=".4">{{ $berita->judul_berita }}</h2>
                        <div data-animate="fadeInUp" data-delay=".1">{!! $berita->body !!}</div>
                    </div>
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
@endsection