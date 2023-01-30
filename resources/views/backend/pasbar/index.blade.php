@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Daftar Permintaan Pasang Baru</h3>
    </div>
    <div class="card-body">

        {{-- Alert Success --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fe fe-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            @if ($pasbars->isNotEmpty())
            <table class="table border text-nowrap text-md-nowrap">
                <thead>
                    <tr>
                        <th class="text-center border-bottom-0">No</th>
                        <th class="text-center border-bottom-0">Nama Pelanggan</th>
                        <th class="text-center border-bottom-0">Alamat</th>
                        <th class="text-center border-bottom-0">Telepon</th>
                        <th class="text-center border-bottom-0">Jadwal</th>
                        <th class="text-center border-bottom-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasbars as $key => $pasbar)
                    <tr>
                        <td class="text-center">{{ $pasbars->firstItem() + $key }}</td>
                        <td>{{ $pasbar->user->name }}</td>
                        <td>{{ Str::words($pasbar->alamat, 3) }}</td>
                        <td class="text-center">{{ $pasbar->telepon }}</td>
                        <td class="text-center">{{ $pasbar->jadwal_pasang }}</td>
                        <td class="text-center">
                            <a class="badge badge-info link-info" title="Lihat"
                                href="#" data-bs-toggle="modal"
                                data-bs-target="#modal-lht-pasbar{{ $pasbar->id }}">
                                <i class="fe fe-eye"></i>
                            </a>
                            <a class="badge badge-warning link-warning mx-2" title="Jadwalkan" href="#"
                                data-bs-toggle="modal" data-bs-target="#modal-ubh-pasbar{{ $pasbar->id }}">
                                <i class="ti ti-calendar"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href="#"
                                onclick="if(confirm('Apakah anda yakin?')) {
                                event.preventDefault(); document.getElementById('delete-form{{ $pasbar->id }}').submit()};">
                                <i class="fe fe-minus-square"></i>
                                <form action="{{ route('pasbar.destroy', $pasbar->id) }}" method="post"
                                    id="delete-form{{ $pasbar->id }}" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <div class="alert alert-primary text-center" role="alert">
                    Data is empty, please add data first!!
                </div>
                @endif
            </table>
            <div class="d-flex justify-content-center">
                {{ $pasbars->links() }}
            </div>
        </div>
    </div>
</div>


{{-- Modal Ubah Data --}}
@foreach ($pasbars as $pasbar)
@php
$id = $pasbar->id;
@endphp
<div class="modal fade" id="modal-ubh-pasbar{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Penjadwalan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pasbar.update',$id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Nama Pelanggan (ID Pelanggan)
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->user->name }}({{ $pasbar->user->id }})
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Alamat
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->alamat }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Kelurahan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->kelurahan }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            No Rumah
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->no_rumah }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            RT / RW
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->rt }} / {{ $pasbar->rw }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Telepon
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->telepon }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Identitas / No Identitas
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->identitas }} / {{ $pasbar->no_identitas }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Layanan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->layanan }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Peruntukan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->peruntukan }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Daya
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->daya }} VA
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Tanggal Permintaan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $pasbar->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="jadwal_pasang" class="col-sm-2 col-lg-12 col-form-label">Jadwal Pasang</label>
                            <input type="date" name="jadwal_pasang" id="jadwal_pasang"
                                class="form-control @error('jadwal_pasang') is-invalid @enderror"
                                placeholder="Silahkan pilih jadwal pasang..."
                                value="{{ old('jadwal_pasang', $pasbar->jadwal_pasang) }}" autofocus required>
                        </div>
                        @error('jadwal_pasang')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Atur Jadwal</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endforeach



{{-- Modal Lihat Data --}}
@foreach ($pasbars as $pasbar)
@php
$id = $pasbar->id;
@endphp
<div class="modal fade" id="modal-lht-pasbar{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Permintaan Pasang Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Nama Pelanggan (ID Pelanggan)
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->user->name }}({{ $pasbar->user->id }})
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Alamat
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->alamat }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Kelurahan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->kelurahan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        No Rumah
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->no_rumah }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        RT / RW
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->rt }} / {{ $pasbar->rw }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Telepon
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->telepon }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Identitas / No Identitas
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->identitas }} / {{ $pasbar->no_identitas }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Layanan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->layanan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Peruntukan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->peruntukan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Daya
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->daya }} VA
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Tanggal Permintaan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->updated_at->diffForHumans() }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Jadwal Pasang
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pasbar->jadwal_pasang }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <a class="badge bg-indigo text-white" href="#" data-bs-dismiss="modal"
                        aria-label="Close">
                            <i class="fe fe-arrow-left"></i>&nbsp; Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection