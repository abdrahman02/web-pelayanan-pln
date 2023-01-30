@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Daftar Permintaan Ubah Daya</h3>
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
            @if ($udls->isNotEmpty())
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
                    @foreach ($udls as $key => $udl)
                    <tr>
                        <td class="text-center">{{ $udls->firstItem() + $key }}</td>
                        <td>{{ $udl->user->name }}</td>
                        <td>{{ Str::words($udl->alamat, 3) }}</td>
                        <td class="text-center">{{ $udl->telepon }}</td>
                        <td class="text-center">{{ $udl->jadwal_ubah }}</td>
                        <td class="text-center">
                            <a class="badge badge-info link-info" title="Lihat"
                                href="#" data-bs-toggle="modal"
                                data-bs-target="#modal-lht-udl{{ $udl->id }}">
                                <i class="fe fe-eye"></i>
                            </a>
                            <a class="badge badge-warning link-warning mx-2" title="Jadwalkan" href="#"
                                data-bs-toggle="modal" data-bs-target="#modal-ubh-udl{{ $udl->id }}">
                                <i class="ti ti-calendar"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href="#"
                                onclick="if(confirm('Apakah anda yakin?')) {
                                event.preventDefault(); document.getElementById('delete-form{{ $udl->id }}').submit()};">
                                <i class="fe fe-minus-square"></i>
                                <form action="{{ route('udl.destroy', $udl->id) }}" method="post"
                                    id="delete-form{{ $udl->id }}" class="d-none">
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
                {{ $udls->links() }}
            </div>
        </div>
    </div>
</div>


{{-- Modal Ubah Data --}}
@foreach ($udls as $udl)
@php
$id = $udl->id;
@endphp
<div class="modal fade" id="modal-ubh-udl{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Penjadwalan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('udl.update',$id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Nama Pelanggan (ID Pelanggan)
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->user->name }}({{ $udl->user->id }})
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Alamat
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->alamat }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Kelurahan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->kelurahan }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            No Rumah
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->no_rumah }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            RT / RW
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->rt }} / {{ $udl->rw }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Telepon
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->telepon }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Identitas / No Identitas
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->identitas }} / {{ $udl->no_identitas }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Layanan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->layanan }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Peruntukan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->peruntukan }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Daya
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->daya }} VA
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            Tanggal Permintaan
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            : {{ $udl->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="jadwal_ubah" class="col-sm-2 col-lg-12 col-form-label">Jadwal Ubah</label>
                            <input type="date" name="jadwal_ubah" id="jadwal_ubah"
                                class="form-control @error('jadwal_ubah') is-invalid @enderror"
                                placeholder="Silahkan pilih jadwal ubah..."
                                value="{{ old('jadwal_ubah', $udl->jadwal_ubah) }}" autofocus required>
                        </div>
                        @error('jadwal_ubah')
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
@foreach ($udls as $udl)
@php
$id = $udl->id;
@endphp
<div class="modal fade" id="modal-lht-udl{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
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
                        : {{ $udl->user->name }}({{ $udl->user->id }})
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Alamat
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->alamat }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Kelurahan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->kelurahan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        No Rumah
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->no_rumah }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        RT / RW
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->rt }} / {{ $udl->rw }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Telepon
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->telepon }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Identitas / No Identitas
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->identitas }} / {{ $udl->no_identitas }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Layanan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->layanan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Peruntukan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->peruntukan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Daya
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->daya }} VA
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Tanggal Permintaan
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->updated_at->diffForHumans() }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Jadwal Pasang
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $udl->jadwal_ubah }}
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