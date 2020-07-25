@extends('layouts.admin-master')
@section('menu-6', 'active')
@section('title', 'Perangkat Desa')

@push('css-libraries')
<link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet"
    href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endpush

@push('js-libraries')
<script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
@endpush

@push('js-spesifics')
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>
@endpush

@push('js-after')
<script src="{{asset('js/ajax/administrator.js')}}"></script>
@endpush

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Perangkat Desa </h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('buat.perangkat-desa')}}" target="_blank" class="btn btn-primary"><i class="fas fa-plus"></i> Perangkat Desa</a>
            </div>
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
                Anda dapat melihat data perangkat desa pada halaman ini
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="max-width: 60px">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        data-checkbox-role="dad" class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all"
                                                        class="custom-control-label">&nbsp;</label>
                                                    <button type="button" class="btn btn-danger btn-sm" id="delete"
                                                        name="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th style="max-width: 50px">Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
