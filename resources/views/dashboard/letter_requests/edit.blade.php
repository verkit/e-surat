@extends('layouts.admin-master')
@section('menu-1', 'active')
@section('title', 'Permohonan Surat')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Cetak Surat</h1>
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
                Anda dapat melakukan percetakan form pada halaman ini
            </p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form autocomplete="off" method="POST" action="{{route('ubah.permohonan-surat', $data->id)}}">
                            @method('put')
                            @csrf
                            {{-- <div class="card-header">
                                <h4>Verifikasi surat</h4>
                            </div> --}}
                            <div class="card-body">
                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <label>Nama Form</label>
                                        <input type="text" class="form-control @error('form_name') is-invalid
                                        @enderror" required name="form_name" value="{{$data->form_name}}">
                                        @error('form_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Form</label>
                                        <input type="text" class="form-control @error('form_code') is-invalid
                                        @enderror" required name="form_code" value="{{$data->form_code}}">
                                        @error('form_code')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
