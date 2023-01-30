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
                                <a href="#">Penyambungan Baru</a>
                            </li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">Penyambungan Baru Listrik</h1>
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
                    <h2 data-animate="fadeInUp" data-delay=".1">Daftar Riwayat Pengajuan Penyambungan Baru Listrik</h2>
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
                <a href="#" class="btn btn-success col-lg-12" data-toggle="modal" data-target="#modal-tbh-pasbar">
                    <i class="fa fa-plus"></i>&nbsp; Ajukan Permohonan
                </a>
            </div>

            <div class="row">
                <div class="table-responsive">
                    @if ($pasbars->isNotEmpty())
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
                                @foreach ($pasbars as $key => $pasbar)
                                    <tr>
                                        <td class="text-center">{{ $pasbars->firstItem() + $key }}</td>
                                        <td>{{ $pasbar->user->name }}</td>
                                        <td>{{ Str::words($pasbar->alamat, 3) }}</td>
                                        @if (!empty($pasbar->jadwal_pasang))
                                            <td class="text-center">{{ $pasbar->jadwal_pasang }}</td>
                                        @else
                                            <td class="text-center text-warning">Admin belum memberikan jadwal</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="alert alert-primary text-center" role="alert">
                                Tidak ada riwayat pemasangan pengajuan
                            </div>
                    @endif
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $pasbars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Content --}}




    {{-- Modal Tambah Data --}}

    <div class="modal fade" id="modal-tbh-pasbar" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Pengajuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('new-power.store') }}" method="POST">
                        @csrf



                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="alamat" class="col-sm-2 col-lg-12 col-form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Silahkan masukkan nama jalan..." value="{{ old('alamat') }}" autofocus
                                    required>
                            </div>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="kelurahan" class="col-sm-2 col-lg-12 col-form-label">Kelurahan</label>
                                <input type="text" name="kelurahan" id="kelurahan"
                                    class="form-control @error('kelurahan') is-invalid @enderror" placeholder="Kelurahan"
                                    value="{{ old('kelurahan') }}" required>
                            </div>
                            @error('kelurahan')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="no_rumah" class="col-sm-2 col-lg-12 col-form-label">No Rumah</label>
                                <input type="text" name="no_rumah" id="no_rumah"
                                    class="form-control @error('no_rumah') is-invalid @enderror" placeholder="Nomor Rumah"
                                    value="{{ old('no_rumah') }}">
                            </div>
                            @error('no_rumah')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="rt" class="col-sm-2 col-lg-12 col-form-label">RT</label>
                                <input type="text" name="rt" id="rt"
                                    class="form-control @error('rt') is-invalid @enderror" placeholder="RT"
                                    value="{{ old('rt') }}" required>
                                @error('rt')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="rw" class="col-sm-2 col-lg-12 col-form-label">RW</label>
                                <input type="text" name="rw" id="rw"
                                    class="form-control @error('rw') is-invalid @enderror" placeholder="RW"
                                    value="{{ old('rw') }}" required>
                                @error('rw')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="telepon" class="col-sm-2 col-lg-12 col-form-label">No Telepon</label>
                                <input type="text" name="telepon" id="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror"
                                    placeholder="Nomor Telepon" value="{{ old('telepon') }}">
                            </div>
                            @error('telepon')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="identitas" class="col-sm-2 col-lg-12 col-form-label">Identitas</label>
                                <select class="form-control" aria-label="Default select example" name="identitas"
                                    name="identitas">
                                    <option selected> -- Pilih -- </option>
                                    <option value="KTP">KTP</option>
                                    <option value="SIM">SIM</option>
                                    <option value="Pasport">Pasport</option>
                                </select>
                                @error('identitas')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="no_identitas" class="col-sm-2 col-lg-12 col-form-label">No Identitas</label>
                                <input type="text" name="no_identitas" id="no_identitas"
                                    class="form-control @error('no_identitas') is-invalid @enderror"
                                    placeholder="No Identitas" value="{{ old('no_identitas') }}" required>
                                @error('no_identitas')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="layanan" class="col-sm-2 col-lg-12 col-form-label">Layanan</label>
                                <select class="form-control" aria-label="Default select example" name="layanan"
                                    name="layanan">
                                    <option selected> -- Pilih -- </option>
                                    <option value="Prabayar">Prabayar</option>
                                    <option value="Pascabayar">Pascabayar</option>
                                </select>
                                @error('layanan')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="peruntukan" class="col-sm-2 col-lg-12 col-form-label">Peruntukan</label>
                                <select class="form-control" aria-label="Default select example" name="peruntukan"
                                    name="peruntukan">
                                    <option selected> -- Pilih -- </option>
                                    <option value="Rumah Tangga">Rumah Tangga</option>
                                    <option value="Usaha">Usaha</option>
                                </select>
                                @error('peruntukan')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="daya" class="col-sm-2 col-lg-12 col-form-label">Daya</label>
                                <select class="form-control" aria-label="Default select example" name="daya"
                                    name="daya">
                                    <option selected> -- Pilih -- </option>
                                    <option value="450">450 VA</option>
                                    <option value="900">900 VA</option>
                                    <option value="1300">1300 VA</option>
                                    <option value="2200">2200 VA</option>
                                    <option value="3300">3300 VA</option>
                                    <option value="4400">4400 VA</option>
                                    <option value="5500">5500 VA</option>
                                    <option value="6600">6600 VA</option>
                                </select>
                                @error('daya')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Buat Pengajuan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                    aria-label="Close">Batal</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
