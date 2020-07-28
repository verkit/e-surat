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

            @if ($data->signature_id == null)
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    Harap pilih penandatangan surat sebelum mencetak blangko!
                </div>
            </div>
            @endif

            <h2 class="section-title">Hi, {{Auth::user()->name}}</h2>
            <p class="section-lead">
                Anda dapat melakukan percetakan blangko KK pada halaman ini
            </p>
            <div class="row">
                @include('dashboard.ktp.form-ktp')
            </div>
        </div>
    </section>
</div>
@endsection
