@extends('layouts.admin-master')
@section('menu-8', 'active')
@section('title', 'Permohonan KTP')

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
<script src="{{asset('js/ajax/ktp.js')}}"></script>
@endpush

@section('main-content')
<div class="main-content">
    <div class="modal fade" tabindex="-1" role="dialog" id="fileModal">
        <div class="modal-dialog" role="document">
            <form action="{{route('ubah.ktp.format')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah blangko KTP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-control">
                            <input type="file" name="ktp" accept=".rtf">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="section">
        <div class="section-header">
            <h1>Permohonan KTP</h1>
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
                Anda dapat melihat permohonan KTP KK dari warga yang terdaftar di platform e-surat pada halaman ini<br>
                <a href="{{Storage::url('public/format-surat/blangko-ktp.rtf')}}"><b>Lihat format blangko ktp</b></a> dan
                <a href="" data-toggle="modal" data-target="#fileModal"><b>Ubah format blangko ktp</b></a> untuk
                mengubah format.
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
                                            <th style="max-width: 150px">Tanggal Pengajuan</th>
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
