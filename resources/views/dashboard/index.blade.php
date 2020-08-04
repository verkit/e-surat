@extends('layouts.admin-master')
@section('title', 'Dashboard')
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Admin</h1>
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
                Selamat datang kembali ke dashboard e-surat desa simbatan
            </p>
        </div>
    </section>
</div>
@endsection
