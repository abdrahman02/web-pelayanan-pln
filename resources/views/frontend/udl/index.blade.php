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
                            <a href="#">Perubahan Daya</a>
                        </li>
                    </ul>
                    <h1 data-animate="fadeInUp" data-delay="1.3">Perubahan Daya Listrik</h1>
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


{{-- Content --}}
<section class="pb-7 pt-3">
    <div class="container">
        <div class="row">
            <div class="section-title border-bottom">
                <h2 data-animate="fadeInUp" data-delay=".1">Daftar Riwayat Pengajuan Perubahan Daya Listrik</h2>
            </div>
        </div>


        {{-- Alert Success --}}
        @if (session('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fe fe-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        {{-- Alert Error --}}
        @if ($errors->any())
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif


        <div class="row col-lg-12">
            <div class="alert alert-danger col-lg-12" role="alert">
                <p class="font-italic text-danger text-center">
                    Harap memperhatikan data yang dimasukkan sebelum mengirim pengajuan!
                </p>
            </div>
        </div>

        <div class="row mb-2 col-lg-12">
            <a href="{{ route('change-power.create') }}" class="btn btn-success col-lg-12">
                <i class="fa fa-plus"></i>&nbsp; Ajukan Permohonan
            </a>
        </div>

        <div class="row">
            <div class="table-responsive">
                @if ($udls->isNotEmpty())
                <table class="table border text-nowrap text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center border-bottom-0">No</th>
                            <th class="text-center border-bottom-0">Nama Pelanggan</th>
                            <th class="text-center border-bottom-0">Alamat</th>
                            <th class="text-center border-bottom-0">Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($udls as $key => $udl)
                        <tr>
                            <td class="text-center">{{ $udls->firstItem() + $key }}</td>
                            <td>{{ $udl->user->name }}</td>
                            <td>{{ Str::words($udl->alamat, 3) }}</td>
                            @if (!empty($udl->jadwal_ubah))
                            <td class="text-center">{{ $udl->jadwal_ubah }}</td>
                            @else
                            <td class="text-center text-warning">Admin belum memberikan jadwal</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-primary text-center" role="alert">
                    Tidak ada riwayat pengajuan
                </div>
                @endif
                <div class="d-flex justify-content-center">
                    {{ $udls->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End of Content --}}

@endsection