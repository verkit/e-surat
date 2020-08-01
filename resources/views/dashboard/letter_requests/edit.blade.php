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

            @if ($data->isdone == 0)
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    Mohon diisi nomor surat, dan isian yang masih kosong lainnya
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
                            <div class="card-header">
                                <h4>{{$data->letter->letter_name}}</h4>
                                <div class="ml-auto">
                                    <a href="{{route('cetak.permohonan-surat', $data->id)}}" class="btn btn-primary"><i
                                            class="fas fa-print"></i> Cetak</a>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($data->letter->forms as $key => $item)
                                <div class="form-group">
                                    <label>{{$item->form_name}}</label>
                                    <input type="text" class="form-control @error('form_name[]') is-invalid
                                        @enderror" required name="form_name[]" value="{{$forms[$key]->text}}">
                                    <input type="text" class="form-control" name="form_id[]"
                                        value="{{$forms[$key]->id}}" hidden readonly>
                                    @error('form_name[]')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                @endforeach
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
