@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Daftar Keluhan</h3>
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
            @if ($keluhans->isNotEmpty())
            <table class="table border text-nowrap text-md-nowrap">
                <thead>
                    <tr>
                        <th class="text-center border-bottom-0">No</th>
                        <th class="text-center border-bottom-0">Nama Pelanggan</th>
                        <th class="text-center border-bottom-0">Keluhan</th>
                        <th class="text-center border-bottom-0">Respon</th>
                        <th class="text-center border-bottom-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keluhans as $key => $keluhan)
                    <tr>
                        <td class="text-center">{{ $keluhans->firstItem() + $key }}</td>
                        <td>{{ $keluhan->user->name }}</td>
                        <td>{{ Str::words($keluhan->keluhan, 8) }}</td>
                        <td class="text-center">
                            @if (!empty($keluhan->respon->respon))
                            <i class="fe fe-check-circle text-primary"></i>
                            @else
                            <i class="fe fe-clock text-warning"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            <a class="badge badge-primary link-primary mx-2" title="Balas"
                                href="{{ route('keluhan.edit', $keluhan->id) }}">
                                <i class="fa fa-paper-plane-o"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href="#"
                                onclick="if(confirm('Apakah anda yakin?')) {
                                event.preventDefault(); document.getElementById('delete-form{{ $keluhan->id }}').submit()};">
                                <i class="fe fe-minus-square"></i>
                                <form action="{{ route('keluhan.destroy', $keluhan->id) }}" method="post"
                                    id="delete-form{{ $keluhan->id }}" class="d-none">
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
                {{ $keluhans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection