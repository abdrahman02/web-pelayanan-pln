@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Daftar Berita</h3>
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

        <a href="{{ route('berita.create') }}" class="btn btn-primary float-end">
            <i class="fa fa-plus"></i>&nbsp; Tambah Data
        </a>

        <div class="table-responsive">
            @if ($beritas->isNotEmpty())
            <table class="table border text-nowrap text-md-nowrap">
                <thead>
                    <tr>
                        <th class="text-center border-bottom-0">No</th>
                        <th class="text-center border-bottom-0">Judul Berita</th>
                        <th class="text-center border-bottom-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $key => $berita)
                    <tr>
                        <td class="text-center">{{ $beritas->firstItem() + $key }}</td>
                        <td>{{ $berita->judul_berita }}</td>
                        <td class="text-center">
                            <a class="badge badge-info link-info" title="Lihat"
                                href="{{ route('berita.show', $berita->id) }}">
                                <i class="fe fe-eye"></i>
                            </a>
                            <a class="badge badge-warning link-warning mx-2" title="Edit"
                                href="{{ route('berita.edit', $berita->id) }}">
                                <i class="fe fe-edit"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href="#"
                                onclick="if(confirm('Apakah anda yakin?')) {
                                event.preventDefault(); document.getElementById('delete-form{{ $berita->id }}').submit()};">
                                <i class="fe fe-minus-square"></i>
                                <form action="{{ route('berita.destroy', $berita->id) }}" method="post"
                                    id="delete-form{{ $berita->id }}" class="d-none">
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
                {{ $beritas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection