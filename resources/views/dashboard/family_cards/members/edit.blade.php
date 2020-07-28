@extends('layouts.admin-master')
@section('menu-7', 'active')
@section('title', 'Permohonan Blangko KK')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Anggota Blangko KK</h1>
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

            <h2 class="section-title">Hi, {{Auth::user()->name}}</h2>
            <p class="section-lead">
                Anda dapat merubah data anggota keluarga blangko KK pada halaman ini
            </p>
            <div class="row">
                @include('dashboard.family_cards.members.form')
            </div>
        </div>
    </section>
</div>
@endsection
