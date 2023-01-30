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
                            <a href="#">Pengaduan</a>
                        </li>
                    </ul>
                    <h1 data-animate="fadeInUp" data-delay="1.3">Layanan Pengaduan</h1>
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
                <h2 data-animate="fadeInUp" data-delay=".1">Daftar Riwayat Pengaduan</h2>
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

        <div class="row mb-2 col-lg-12">
            <a href="#" class="btn btn-success col-lg-12" data-toggle="modal" data-target="#modal-tbh-keluhan">
                <i class="fa fa-plus"></i>&nbsp; Ajukan Keluhan
            </a>
        </div>

        <div class="row">
            <div class="table-responsive">
                @if ($keluhans->isNotEmpty())
                <table class="table border text-nowrap text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center border-bottom-0">Keluhan</th>
                            <th class="text-center border-bottom-0">Respon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluhans as $keluhan)
                        <tr>
                            <td>
                                {{ $keluhan->keluhan }}
                                <div>
                                    <i class="fe fe-clock text-success" style="font-size: 0.7rem"> {{
                                        $keluhan->updated_at->diffForHumans() }}</i>
                                </div>
                            </td>
                            @if (!empty($keluhan->respon->respon))
                            <td>
                                {{ $keluhan->respon->respon }}
                                <div>
                                    <i class="fe fe-clock text-success" style="font-size: 0.7rem"> {{
                                        $keluhan->respon->updated_at->diffForHumans() }}</i>
                                </div>
                            </td>
                            @else
                            <td class="text-center text-warning">Admin belum menanggapi</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <div class="alert alert-primary text-center" role="alert">
                        Tidak ada riwayat pengaduan
                    </div>
                    @endif
                </table>
                <div class="d-flex justify-content-center">
                    {{ $keluhans->links() }}
                </div>
            </div>
        </div>
    </div>
</section>



{{-- Modal Pengajuan Keluhan --}}
<div class="modal fade" id="modal-tbh-keluhan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pengajuan Keluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengaduan.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="keluhan" class="col-sm-2 col-lg-12 col-form-label">Keluhan</label>
                            <input type="text" name="keluhan" id="keluhan"
                                class="form-control @error('keluhan') is-invalid @enderror" value="{{ old('keluhan') }}"
                                autofocus required>
                        </div>
                        @error('keluhan')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Ajukan Keluhan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection