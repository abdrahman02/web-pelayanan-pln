@extends('backend.layouts.main')
@section('isi')
<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 col-xl-6">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="profile-img-main rounded">
                        @if (!empty($user->image))
                        <img src="{{ asset('storage/user/'.$user->image) }}" alt="img" class="m-0 p-1"
                            style="height: 200px; width: 200px; border-radius: 50%; border: 2px solid #000">
                        @else
                        <img src="{{ asset('img/6.jpg') }}" alt="img" class="m-0 p-1"
                            style="height: 200px; width: 200px; border-radius: 50%; border: 2px solid #000">
                        @endif
                    </div>
                    <div class="ms-4">
                        <h4>{{ auth()->user()->name }}</h4>
                        <p class="text-muted mb-2">Member Since: {{ auth()->user()->created_at->format('d-M-Y') }}</p>
                        <div class="btn btn-primary btn-sm"><i class="mdi mdi-account-star"></i> {{ auth()->user()->role
                            }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="wideget-user-tab">
            <div class="tab-menu-heading">
                <div class="tabs-menu1">
                    <ul class="nav">
                        <li><a href="#accountSettings" class="active show" data-bs-toggle="tab">Account Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane active show" id="accountSettings">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 main-content-label">Account</div>

                    <div class="form-group ">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <label for="name" class="form-label">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Nama..." value="{{ auth()->user()->name }}">
                            </div>
                            @error('name')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <label for="image" class="form-label">
                                    Upload Gambar
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="hidden" name="oldImage" value="{{ $user->image }}"
                                    placeholder="string image di database..">
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                    name="image" onchange="previewImage()">
                            </div>
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @if ($user->image)
                        <img src="{{ asset('storage/user/'.$user->image) }}" class="img-preview img-fluid mb-3"
                            style="max-width: 300px;">
                        @else
                        <img class="img-preview img-fluid mb-3" style="max-width: 300px;">
                        @endif
                    </div>

                    <div class="form-group ">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Email" value="{{ auth()->user()->email }}">
                            </div>
                            @error('email')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <label for="username" class="form-label">Username</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" placeholder="Username"
                                    value="{{ auth()->user()->username }}">
                            </div>
                            @error('username')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group float-end">
                        <div class="row row-sm">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success my-1">Simpan Perubahan</button>
                                <a class="btn btn-info my-1" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modal-ubh-password{{ auth()->user()->id }}">Change Password</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- Modal Ubah Password --}}
@php
$id = $user->id;
@endphp
<div class="modal fade" id="modal-ubh-password{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update',$id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="password_lama" class="col-sm-2 col-lg-12 col-form-label fw-bold">Password
                                Lama</label>
                            <input type="password" name="password_lama" id="password_lama"
                                class="form-control @error('password_lama') is-invalid @enderror"
                                placeholder="Masukkan password lama....." autofocus required>
                        </div>
                        @error('password_lama')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="password" class="col-sm-2 col-lg-12 col-form-label fw-bold">Password
                                Baru</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan password baru....." required>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="password_confirmation"
                                class="col-sm-2 col-lg-12 col-form-label fw-bold">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Masukkan password baru....." required>
                        </div>
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Ubah Password</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
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