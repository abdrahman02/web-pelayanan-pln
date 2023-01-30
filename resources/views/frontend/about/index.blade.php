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
                            <a href="#">Tentang Kami</a>
                        </li>
                    </ul>
                    <h1 data-animate="fadeInUp" data-delay="1.3">Profil Perusahaan</h1>
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

<!-- About us -->
<section class="pt-7 pb-7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="about-us-title text-center">
                    <h2 data-animate="fadeInUp" data-delay=".1">Moto</h2>
                    <p data-animate="fadeInUp" data-delay=".2">Listrik untuk Kehidupan yang Lebih Baik</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".1">
                    <h3>Siapa Kami?</h3>
                    <p>Website Pelayanan PLN merupakan sebuah platform yang dikembangkan oleh PT. PLN (Persero) untuk
                        memberikan layanan kepada masyarakat dalam hal pengajuan penyambungan baru listrik, pembayaran
                        tagihan, dan informasi produk dan layanan lainnya.</p>
                    <p>Kami memahami bahwa kebutuhan akan listrik saat ini sangat penting bagi kelangsungan hidup dan
                        usaha masyarakat. Oleh karena itu, kami berusaha untuk memberikan pelayanan yang cepat, tepat,
                        dan aman bagi masyarakat.</p>
                    <p>Kami juga senantiasa berupaya untuk meningkatkan kualitas pelayanan kami dengan berkoordinasi
                        dengan pihak terkait dan meningkatkan teknologi yang digunakan dalam proses pelayanan. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".2">
                    <h3>Misi Kami</h3>
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
            <div class="col-md-4">
                <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".3">
                    <h3>Visi Kami</h3>
                    <p>Menjadi Perusahaan Listrik Terkemuka se-Asia Tenggara dan #1 Pilihan Pelanggan untuk Solusi
                        Energi.</p>
                </div>
            </div>
        </div>

        <div class="write-about-us text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 data-animate="fadeInUp" data-delay=".1">Maksud dan Tujuan Perseroan</h2>
                    <p data-animate="fadeInUp" data-delay=".2">Untuk menyelenggarakan usaha penyediaan tenaga listrik
                        bagi kepentingan umum dalam jumlah dan mutu yang memadai serta memupuk keuntungan dan
                        melaksanakan penugasan Pemerintah di bidang ketenagalistrikan dalam rangka menunjang pembangunan
                        dengan menerapkan prinsip-prinsip Perseroan Terbatas.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".3">
                <h2 data-animate="fadeInUp" data-delay=".1">Riwayat Singkat PLN</h2>
                <p data-animate="fadeInUp" data-delay=".2">Berawal di akhir abad 19, bidang pabrik gula dan pabrik
                    ketenagalistrikan di Indonesia mulai ditingkatkan saat beberapa perusahaan asal Belanda yang
                    bergerak di bidang pabrik gula dan pebrik teh mendirikan pembangkit tenaga lisrik untuk keperluan
                    sendiri</p>
                <p data-animate="fadeInUp" data-delay=".2">Antara tahun 1942-1945 terjadi peralihan pengelolaan
                    perusahaan-perusahaan Belanda tersebut oleh Jepang, setelah Belanda menyerah kepada pasukan tentara
                    Jepang di awal Perang Dunia II
                </p>
                <p data-animate="fadeInUp" data-delay=".2">Proses peralihan kekuasaan kembali terjadi di akhir Perang
                    Dunia II pada Agustus 1945, saat Jepang menyerah kepada Sekutu. Kesempatan ini dimanfaatkan oleh
                    para pemuda dan buruh listrik melalui delagasi Buruh/Pegawai Listrik dan Gas yang bersama-sama
                    dengan Pemimpin KNI Pusat berinisiatif menghadap Presiden Soekarno untuk menyerahkan
                    perusahaan-perusahaan tersebut kepada Pemerintah Republik Indonesia. Pada 27 Oktober 1945, Presiden
                    Soekarno membentuk Jawatan Listrik dan Gas di bawah Departemen Pekerjaan Umum dan Tenaga dengan
                    kapasitas pembangkit tenaga listrik sebesar 157,5 MW.
                </p>
                <p data-animate="fadeInUp" data-delay=".2">Pada tanggal 1 januari 1961, Jawatan Listrik dan Gas diubah
                    menjadi BPU-PLN (Bada Pemimpin Umum Perusahaan Listrik Negara) yang bergerak di bidang listrik, gas
                    dan kokas yang dibubarkan pada tanggal 1 Januari 1965. Pada saat yang sama, 2 (dua) perusahaan
                    negara yaitu Perusahaan Listrik Negara (PLN) sebagai pengelola tenaga listrik milik negara dan
                    Perusahaan Gas Negara (PGN) sebagai pengelola gas diresmikan.</p>
                <p data-animate="fadeInUp" data-delay=".2">Pada tahun 1972, sesuai dengan Peraturan Pemerintah No. 18,
                    status Perusahaan Listrik Negara (PLN) ditetapkan sebagai Perusahaan Umum Listrik Negara dan sebagai
                    Pemegang Kuasa Usaha Ketenagalistrikan (PKUK) dengan tugas menyediakan tenaga listrik bagi
                    kepentingan umum.</p>
                <p data-animate="fadeInUp" data-delay=".2">Seiring dengan kebijakan Pemerintah yang memberikan
                    kesempatan kepada sektor swasta untuk bergerak dalam bisnis penyediaan listrik, maka sejak tahun
                    1994 status PLN beralih dari Perusahaan Umum menjadi Perusahaan Perseroan (Persero) dan juga sebagai
                    PKUK dalam menyediakan listrik bagi kepentingan umum hingga sekarang.</p>
            </div>
        </div>
    </div>
</section>
<!-- End of About us -->
@endsection