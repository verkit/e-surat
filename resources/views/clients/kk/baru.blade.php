@extends('layouts.client-master')
@section('content')
<!-- Register Area-->
<div class="register-area section-padding-120-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h2>Permohonan KK Baru</h2>
                </div>
            </div>
            <div class="col-12 col-lg-8">
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
                <div class="card register-card bg-gray p-1 p-sm-4 mb-50">
                    <div class="card-body">
                        <h4>Formulir KK Baru</h4>
                        <!-- Register Form-->
                        <form method="POST" action="{{route('simpan.kk')}}" autocomplete="off">
                            @csrf
                            <div class="row">
                                @include('clients.kk.form')
                                <input type="text" name="is_separate" value="0" readonly hidden>
                                <input type="text" name="is_new" value="1" readonly hidden>
                            </div>
                            <button class="btn saasbox-btn white-btn w-100" type="submit">Selanjutnya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
