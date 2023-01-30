@extends('frontend.layouts.main')

@section('isi')
<!-- Banner -->
<section class="position-relative bg-light pt-4 pb-4">
    <div id="particles_js"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Banner content -->
                <div class="banner-content">
                    <h1 data-animate="fadeInUp" data-delay="1.2">Selamat Datang di Pelayanan PLN</h1>
                    <h2 data-animate="fadeInUp" data-delay="1.3"><span>Kami menyediakan layanan penyambungan baru ,
                            perubahan daya, dan layanan pengaduan.</span></h2>
                    <ul class="list-inline animated fadeInUp" data-animate="fadeInUp" data-delay="1.4">
                        <li>
                            <a href="#layanan" class="btn btn-primary">Cek Detail</a>
                        </li>
                        <li class="d-none">
                            <a href="#" class="btn">Check Offer’s
                                <i class="fas fa-caret-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <!-- Banner image -->
                <div class="banner-image">
                    <img src="img/slide.jpg" alt="" data-animate="fadeInUp" data-delay="1.5" data-depth="0.2"
                        style="max-width: 70%">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Banner -->

<!-- Features -->
<section class="pt-7 pb-5-5" id="layanan">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".1">
                    <img src="{{ asset('img/pasang-baru.png') }}" alt="" data-no-retina class="svg"
                        style="max-width: 50%">
                    <h3>Penyambungan Baru</h3>
                    <p>Layanan permohonan penyambungan baru listrik secara online yang cepat, mudah, nyaman, dan aman
                        serta dapat dimonitor prosesnya.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".3">
                    <img src="{{ asset('img/ubah-daya.png') }}" alt="" data-no-retina class="svg"
                        style="max-width: 50%">
                    <h3>Perubahan Daya</h3>
                    <p>Layanan permohonan perubahan daya listrik secara online yang cepat, mudah, nyaman, dan aman serta
                        dapat dimonitor prosesnya.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".5">
                    <img src="{{ asset('img/keluhan.png') }}" alt="" data-no-retina class="svg" style="max-width: 50%">
                    <h3>Layanan Pengaduan</h3>
                    <p>Layanan pengaduan secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor
                        prosesnya.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Features -->

<!-- Our services -->
<section>
    <div class="services-title position-relative p0">
        <img src="img/banner-landing-page.jpg" alt="" class="card-img">
    </div>

    <div class="services-wrap bg-white position-relative pt-5 pb-5">
        <div class="container">
            <!-- All services -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-service" data-animate="fadeInUp" data-delay=".05">
                        <img src="img/visi.gif" alt="" alt="" data-no-retina class="svg">
                        <h4>Visi</h4>
                        <span>Menjadi Perusahaan Listrik Terkemuka se-Asia Tenggara dan #1 Pilihan Pelanggan untuk
                            Solusi Energi.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-service" data-animate="fadeInUp" data-delay=".1">
                        <img src="img/misi.png" alt="" alt="" data-no-retina class="svg">
                        <h4>Misi</h4>
                        <ul>
                            <li>Menjalankan bisnis kelistrikan dan bidang lain yang terkait, berorientasi pada kepuasan
                                pelanggan, anggota perusahaan dan pemegang saham.</li>
                            <li>Menjadikan tenaga listrik sebagai media untuk meningkatkan kualitas kehidupan
                                masyarakat.</li>
                            <li>Mengupayakan agar tenaga listrik menjadi pendorong kegiatan ekonomi.</li>
                            <li>Menjalankan kegiatan usaha yang berwawasan lingkungan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Our services -->

<!-- Mobile app -->
<section class="pt-7 pb-7">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-4 d-none d-md-block">
                <div class="text-center" data-animate="fadeInUp" data-delay=".1">
                    <a href="https://play.google.com/store/apps/details?id=com.icon.pln123">
                        <img src="img/mobile.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="app-info">
                    <h2 data-animate="fadeInUp" data-delay=".1">Download PLN Mobile</h2>
                    <p data-animate="fadeInUp" data-delay=".3">Mulai pengalaman baru dengan PLN Mobile, semua keperluan
                        listrik dan rumah dalam 1 aplikasi PLN Mobile semua makin mudah</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Mobile app -->


@endsection