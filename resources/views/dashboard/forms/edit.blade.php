@extends('layouts.admin-master')
@section('menu-2', 'active')
@section('menu-2-1', 'active')
@section('title', 'Form Surat')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
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
                Anda dapat mengubah data form pada halaman ini
            </p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form autocomplete="off" method="POST" action="{{route('ubah.form', $data->id)}}">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                <h4>Ubah data form pada surat</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
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
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Hanya diisi oleh perangkat desa?</label>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="is_displayed" value="1"
                                                        class="selectgroup-input" @if ($data->is_displayed == 1)
                                                    checked @endif>
                                                    <span class="selectgroup-button">Iya</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="is_displayed" value="0"
                                                        class="selectgroup-input" @if ($data->is_displayed == 0)
                                                    checked @endif>
                                                    <span class="selectgroup-button">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
