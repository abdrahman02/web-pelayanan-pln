@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Form Ubah Berita</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('berita.update', $berita->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul_berita">
                    Judul Berita
                </label>
                <input class="form-control @error('judul_berita') is-invalid @enderror" id="judul_berita"
                    placeholder="Judul Berita" type="text" name="judul_berita" required autofocus
                    value="{{ old('judul_berita', $berita->judul_berita) }}">
                </input>
                @error('judul_berita')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image" class="form-label fw-bold">
                    Upload Gambar
                </label>

                <input type="hidden" name="oldImage" value="{{ $berita->image }}">

                @if ($berita->image)
                <img src="{{ asset('storage/berita/'.$berita->image) }}" class="img-preview img-fluid mb-3"
                    style="max-width: 300px;">
                @else
                <img class="img-preview img-fluid mb-3" style="max-width: 300px;">
                @endif

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="body">
                    Isi Berita
                </label>
                <input id="body" name="body" type="hidden" required value="{{ old('body', $berita->body) }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mr-2">
                Submit
            </button>
            <a href="{{ route('berita.index') }}">
                <button type="button" class="btn btn-danger">
                    Cancel
                </button>
            </a>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        if(image.files.length > 0){
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            }
        }
    }
</script>
@endpush