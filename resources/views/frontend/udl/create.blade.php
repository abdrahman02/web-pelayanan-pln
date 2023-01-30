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
                    <h2 data-animate="fadeInUp" data-delay=".1">Silahkan Pilih Daya Dang Ingin Diubah</h2>
                </div>
            </div>

            <div class="row">
                <div class="table-responsive">
                    @if ($pasbars->isNotEmpty())
                        <table class="table border text-nowrap text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center border-bottom-0">No</th>
                                    <th class="text-center border-bottom-0">Nama Pelanggan</th>
                                    <th class="text-center border-bottom-0" colspan="2">Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasbars as $key => $pasbar)
                                    <tr>
                                        <td class="text-center">{{ $pasbars->firstItem() + $key }}</td>
                                        <td>{{ $pasbar->user->name }}</td>
                                        <td>{{ Str::words($pasbar->alamat, 3) }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-warning link-warning mx-2" title="Edit" href="#"
                                                data-toggle="modal" data-target="#modal-tbh-udl{{ $pasbar->id }}">
                                                <i class="fa fa-exchange"></i>
                                            </a>
                                        </td>
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








    {{-- Modal Tambah Data UDL --}}
    @foreach ($pasbars as $pasbar)
        @php
            $id = $pasbar->id;
            $daya = $pasbar->daya;
        @endphp
        <div class="modal fade" id="modal-tbh-udl{{ $id }}" role="dialog" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollabl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Pengajuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('change-power.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    Nama Pelanggan (ID Pelanggan)
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    : {{ $pasbar->user->name }}({{ $pasbar->user->id }})
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="alamat" class="col-sm-2 col-lg-12 col-form-label">Alamat</label>
                                    <input type="text" name="alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Silahkan masukkan nama jalan..."
                                        value="{{ old('alamat', $pasbar->alamat) }}" required readonly>
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
                                        class="form-control @error('kelurahan') is-invalid @enderror"
                                        placeholder="Kelurahan" value="{{ old('kelurahan', $pasbar->kelurahan) }}" required
                                        readonly>
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
                                        class="form-control @error('no_rumah') is-invalid @enderror"
                                        placeholder="Nomor Rumah" value="{{ old('no_rumah', $pasbar->no_rumah) }}"
                                        readonly>
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
                                        value="{{ old('rt', $pasbar->rt) }}" required readonly>
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
                                        value="{{ old('rw', $pasbar->rw) }}" required readonly>
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
                                        placeholder="Nomor Telepon" value="{{ old('telepon', $pasbar->telepon) }}"
                                        readonly>
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
                                    <input type="text" name="identitas" id="identitas"
                                        class="form-control @error('identitas') is-invalid @enderror"
                                        placeholder="Identitas" value="{{ old('identitas', $pasbar->identitas) }}"
                                        readonly>
                                    @error('identitas')
                                        <div class="invalid-feedback">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="no_identitas" class="col-sm-2 col-lg-12 col-form-label">No
                                        Identitas</label>
                                    <input type="text" name="no_identitas" id="no_identitas"
                                        class="form-control @error('no_identitas') is-invalid @enderror"
                                        placeholder="No Identitas"
                                        value="{{ old('no_identitas', $pasbar->no_identitas) }}" required readonly>
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
                                    <input type="text" name="layanan" id="layanan"
                                        class="form-control @error('layanan') is-invalid @enderror" placeholder="Layanan"
                                        value="{{ old('layanan', $pasbar->layanan) }}" readonly>
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
                                    <input type="text" name="peruntukan" id="peruntukan"
                                        class="form-control @error('peruntukan') is-invalid @enderror"
                                        placeholder="Peruntukan" value="{{ old('peruntukan', $pasbar->peruntukan) }}"
                                        readonly>
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
                                        <option value="{{ $pasbar->daya }}" selected>{{ $pasbar->daya }}</option>
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
    @endforeach
@endsection
