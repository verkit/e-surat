@extends('layouts.admin-master')
@section('menu-6', 'active')
@section('title', 'Perangkat Desa')

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Perangkat desa</h1>
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
                Anda dapat mengubah data perangkat desa pada halaman ini
            </p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form autocomplete="off" method="POST" action="{{route('ubah.perangkat-desa', $data->id)}}">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                <h4>Form mengubah perangkat desa</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid
                                    @enderror" required name="name" value="{{$data->name}}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control @error('position') is-invalid
                                    @enderror" required name="position" value="{{$data->position}}">
                                    @error('position')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control @error('address') is-invalid
                                    @enderror" required name="address" value="{{$data->address}}">
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
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
