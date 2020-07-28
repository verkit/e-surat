@extends('layouts.admin-master')
@section('menu-3', 'active')
@section('menu-3-1', 'active')
@section('title', 'Surat')

@push('css-libraries')
<link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
@endpush

@push('js-libraries')
<script src="{{asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
<script src="{{asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
<script src="{{asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
@endpush

@push('js-spesifics')
<script src="{{asset('assets/js/page/forms-advanced-forms.js')}}"></script>
@endpush


@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Surat</h1>
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
                Anda dapat memperbarui data surat pada halaman ini
            </p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form autocomplete="off" method="POST" action="{{route('ubah.surat', $data->id)}}"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                <h4>Update data surat</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Surat</label>
                                    <input type="text" class="form-control @error('letter_name') is-invalid
                                    @enderror" required name="letter_name" value="{{$data->letter_name}}">
                                    @error('letter_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Surat</label>
                                    <textarea name="letter_description" id="letter_description" cols="30" rows="10"
                                        class="form-control @error('letter_description') is-invalid
                                    @enderror" required>{{$data->letter_description}}</textarea>
                                    @error('letter_description')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Format Surat <a href="{{Storage::url($data->letter_format)}}" target="_blank"
                                            class="btn btn-sm btn-primary">Lihat surat</a></label>
                                    <input type="file" class="form-control @error('letter_format') is-invalid
                                    @enderror" name="letter_format" value="{{$data->letter_format}}" accept=".rtf">
                                    <small>Apabila hendak mengubah surat, silahkan upload ulang suratnya</small><br>
                                    <small>Format surat : .rtf</small>
                                    @error('letter_format')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Form Isian</label>
                                    <select class="form-control select2" multiple="multiple" name="form_letter[]"
                                        required id="form_letter">
                                        @foreach ($form_letters as $item)
                                        <option value="{{$item->id}}" @foreach ($data->forms as $selected)
                                            @if ($item->id == $selected->id) selected @endif
                                            @endforeach
                                            >{{$item->form_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Dibuka untuk pelayanan mandiri?</label>
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
