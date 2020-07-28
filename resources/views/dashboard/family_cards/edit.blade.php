@extends('layouts.admin-master')
@section('menu-7', 'active')
@section('title', 'Permohonan Blangko KK')

@push('css-libraries')
@endpush

@push('js-libraries')
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
@endpush

@push('js-spesifics')
<script src="{{asset('assets/js/page/components-table.js')}}"></script>
@endpush

@push('js-after')
@endpush

@section('main-content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Cetak Blangko KK</h1>
        </div>
        <div class="section-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session('success') }}
                </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    Terjadi kesalahan saat menyimpan data
                </div>

            </div>
            @endif

            <h2 class="section-title">Hi, {{Auth::user()->name}}</h2>
            <p class="section-lead">
                Anda dapat melakukan percetakan blangko KK pada halaman ini
            </p>
            <div class="row">
                @include('dashboard.family_cards.form-kk')
                @include('dashboard.family_cards.member-list')
            </div>
        </div>
    </section>

    @foreach ($members as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{$item->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin menghapus <b>{{$item->fullname}}</b> dari Blangko KK?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <form action="{{route('hapus.anggota.kk', $item->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Iya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
