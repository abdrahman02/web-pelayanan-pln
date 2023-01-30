@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Daftar Akun Pelanggan PLN</h3>
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
            @if ($pelanggans->isNotEmpty())
            <table class="table border text-nowrap text-md-nowrap">
                <thead>
                    <tr>
                        <th class="text-center border-bottom-0">No</th>
                        <th class="text-center border-bottom-0">Nama Pelanggan(ID Pelanggan)</th>
                        <th class="text-center border-bottom-0">Email </th>
                        <th class="text-center border-bottom-0">Username</th>
                        <th class="text-center border-bottom-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $key => $pelanggan)
                    <tr>
                        <td class="text-center">{{ $pelanggans->firstItem() + $key }}</td>
                        <td>{{ Str::words($pelanggan->name, 4) }}({{ $pelanggan->id }})</td>
                        <td>{{ $pelanggan->email }}</td>
                        <td>{{ $pelanggan->username }}</td>
                        <td class="text-center">
                            <a class="badge badge-info link-info" title="Lihat" href="#" data-bs-toggle="modal"
                                data-bs-target="#modal-lht-pelanggan{{ $pelanggan->id }}">
                                <i class="fe fe-eye"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href="#"
                                onclick="if(confirm('Apakah anda yakin?')) {
                                event.preventDefault(); document.getElementById('delete-form{{ $pelanggan->id }}').submit()};">
                                <i class="fe fe-minus-square"></i>
                                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="post"
                                    id="delete-form{{ $pelanggan->id }}" class="d-none">
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
                {{ $pelanggans->links() }}
            </div>
        </div>
    </div>
</div>



{{-- Modal Lihat Data --}}
@foreach ($pelanggans as $pelanggan)
@php
$id = $pelanggan->id;
@endphp
<div class="modal fade" id="modal-lht-pelanggan{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Informasi Akun Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Nama Pelanggan (ID Pelanggan)
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pelanggan->name }}({{ $pelanggan->id }})
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Email
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pelanggan->email }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Username
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pelanggan->username }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        Member Since
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        : {{ $pelanggan->created_at->format('d-M-Y') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <a class="badge bg-indigo text-white" href="#" data-bs-dismiss="modal" aria-label="Close">
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