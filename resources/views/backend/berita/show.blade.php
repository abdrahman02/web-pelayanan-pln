@extends('backend.layouts.main')
@section('isi')
<div class="col-xl-12">

    <a class="badge bg-indigo text-white" href="{{ route('berita.index') }}">
        <i class="fe fe-arrow-left"></i>&nbsp; Kembali
    </a>
    <a class="badge bg-warning text-white mx-2" href="{{ route('berita.edit', $berita->id) }}">
        <i class="fe fe-edit"></i>&nbsp; Ubah
    </a>
    <a class="badge bg-danger text-white" title="Hapus" href="#"
        onclick="if(confirm('Apakah anda yakin?')) {event.preventDefault(); document.getElementById('delete-form{{ $berita->id }}').submit()};">
        <i class="fe fe-minus-square"></i>&nbsp; Hapus
        <form action="{{ route('berita.destroy', $berita->id) }}" method="post" id="delete-form{{ $berita->id }}"
            class="d-none">
            @csrf
            @method('delete')
        </form>
    </a>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-8">
                    <div class="">
                        <div class="d-sm-flex d-block align-items-center">
                            <div class="d-flex align-items-center mb-sm-0 mb-2">
                                <div class="avatar-list">
                                    <a href="javascript:void(0)" class="avatar avatar-sm rounded-circle cover-image"
                                        data-bs-image-src="{{ asset('img/6.jpg') }}"></a>
                                </div>
                                <h6 class="mb-0 text-muted ms-2 text-13 me-sm-0 me-2">{{ $berita->user->name }}</h6>
                            </div>
                            <a href="#" class="d-f-ai-c mx-0 mb-sm-0 mb-2 mx-sm-4 mx-0 text-13">
                                <span class="fe fe-calendar text-muted me-1 text-15"></span>
                                <span class="mt-0 mt-0 text-muted">Upload : {{ $berita->created_at->diffForHumans()
                                    }}</span>
                            </a>
                            <a href="#" class="d-f-ai-c mx-0 mb-sm-0 mb-2 mx-sm-4 mx-0 text-13">
                                <span class="fe fe-calendar text-muted me-1 text-15"></span>
                                <span class="mt-0 mt-0 text-muted">Terakhir diperbaharui : {{
                                    $berita->updated_at->diffForHumans() }}</span>
                            </a>
                        </div>
                        <div>
                            <h3 class="font-weight-normal text-dark-light mt-4 mb-4">{{ $berita->judul_berita }}</h3>
                        </div>
                    </div>
                    <div class="ps-relative p-1 bg-light br-5">
                        @if (!empty($berita->image))
                        <img src="{{ asset('storage/berita/'.$berita->image) }}" alt="{{ $berita->judul_berita }}"
                            class="cover-image br-5 ms-auto me-auto wp-100">
                        @else
                        <img src="{{ asset('img/background3.jpg') }}" alt="{{ $berita->judul_berita }}"
                            class="cover-image br-5 ms-auto me-auto wp-100">
                        @endif
                    </div>
                    <div class=" mb-2 mt-5 content">
                        {!! $berita->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection