@extends('backend.layouts.main')
@section('isi')
<div class="card custom-card">
    <div class="card-header border-bottom">
        <h3 class="card-title">Balas Keluhan</h3>
    </div>
    <div class="card-body">
        <a class="badge bg-indigo text-white" href="{{ route('berita.index') }}">
            <i class="fe fe-arrow-left"></i>&nbsp; Kembali
        </a>
        <form action="{{ route('respon.store') }}" method="post">
            @csrf

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                <div class="card">
                    <div class="main-content-app pt-0">
                        <div class="main-content-body main-content-body-chat h-100">
                            <div class="main-chat-header pt-3 d-block d-sm-flex">
                                <div class="main-img-user online">
                                    @php
                                    $image = $keluhan->user->image
                                    @endphp
                                    @if (!empty($user->image))
                                    <img alt="avatar" src="{{ asset('img/'.$image) }}">
                                    @else
                                    <img src="{{ asset('img/6.jpg') }}" alt="avatar">
                                    @endif
                                </div>
                                <div class="main-chat-msg-name mt-2">
                                    <p class="mb-0">{{ $keluhan->user->name }}</p>
                                </div>
                            </div>
                            <!-- main-chat-header -->
                            <div class="main-chat-body flex-2" id="ChatBody">
                                <div class="content-inner">
                                    <label class="main-chat-time"><span>{{ $keluhan->updated_at->diffForHumans()
                                            }}</span></label>
                                    <div class="media chat-left">
                                        <div class="main-img-user online"><img alt="avatar"
                                                src="{{ asset('img/6.jpg') }}"></div>
                                        <div class="media-body">
                                            <div class="main-msg-wrapper">
                                                {{ $keluhan->keluhan }}
                                            </div>
                                        </div>
                                    </div>
                                    @if ($keluhan->respon !== null)
                                    <div class="media flex-row-reverse chat-right">
                                        <div class="main-img-user online">
                                            @php
                                            $image = auth()->user()->image
                                            @endphp
                                            @if (!empty($image))
                                            <img alt="avatar" src="{{ asset('storage/user/'.$image) }}">
                                            @else
                                            <img src="{{ asset('img/6.jpg') }}" alt="avatar">
                                            @endif
                                        </div>
                                        <div class="media-body">
                                            <div class="main-msg-wrapper">
                                                {{ $keluhan->respon->respon }}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            {{-- @if ($keluhan->respon == 'null') --}}
                            <div class="main-chat-footer pt-5">
                                <input class="form-control @error('respon') is-invalid @enderror"
                                    placeholder="Balas keluhan...." type="text" id="respon" name="respon" required
                                    autofocus>
                                <button type="submit" class="btn btn-icon  btn-primary brround"><i
                                        class="fa fa-paper-plane-o"></i></button>
                                <nav class="nav">
                                </nav>
                            </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Input untuk keluhan_id --}}
            <input type="hidden" class="form-control d-none @error('keluhan_id') is-invalid @enderror" id="keluhan_id"
                name="keluhan_id" value="{{ $keluhan->id}}">

        </form>
    </div>
</div>
@endsection