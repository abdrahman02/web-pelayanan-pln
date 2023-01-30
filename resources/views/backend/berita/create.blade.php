@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Form Tambah Berita</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul_berita" class="fw-bold">
                    Judul Berita
                </label>
                <input class="form-control @error('judul_berita') is-invalid @enderror" id="judul_berita"
                    placeholder="Judul Berita" type="text" name="judul_berita" required autofocus
                    value="{{ old('judul_berita') }}">
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
                <img class="img-preview img-fluid mb-3"  style="max-width: 300px;">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="body" class="fw-bold">
                    Isi Berita
                </label>
                <input id="body" name="body" type="hidden" required value="{{ old('body') }}">
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