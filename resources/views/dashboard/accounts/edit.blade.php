@extends('layouts.admin-master')
@section('menu-4', 'active')
@section('title', 'Akun')

@push('css-libraries')
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

@push('js-after')
@endpush

@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Profil {{$user->name}}</h1>
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

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{Storage::url($user->photo)}}"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Jumlah Permohonan</div>
                                    <div class="profile-widget-item-value">{{$user->letter_request->count()}}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Akun dibuat</div>
                                    <div class="profile-widget-item-value">{{$user->created_at->diffForHumans()}}</div>
                                </div>
                            </div>

                        </div>
                        <div class="profile-widget-description">
                            <form method="POST" action="{{route('update.akun', $user->id)}}" enctype="multipart/form-data" autocomplete="off">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{$user->name}}" required>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid
                                            @enderror" name="nik" value="{{$user->villager->nik}}" required>
                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 col-12">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" value="{{$user->villager->address}}" required>
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{$user->email}}" required>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-12">
                                        <label>Tempat Lahir</label>
                                        <input type="text"
                                            class="form-control @error('birthplace') is-invalid @enderror"
                                            name="birthplace" value="{{$user->villager->birthplace}}" required>
                                        @error('birthplace')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control datepicker @error('birthdate') is-invalid
                                        @enderror" name="birthdate" value="{{$user->villager->birthdate}}" required>
                                        @error('birthdate')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                            required>
                                            @foreach ($genders as $item)
                                            <option value="{{$item->id}}"
                                                @if ($user->villager->gender_id == $item->id)
                                                selected
                                                @endif>
                                                {{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Status Pernikahan</label>
                                        <select class="form-control @error('marital_status') is-invalid @enderror"
                                            name="marital_status" required>
                                            @foreach ($marital_statuses as $item)
                                            <option value="{{$item->id}}"
                                                @if ($user->villager->marital_status_id == $item->id)
                                                selected
                                                @endif>
                                                {{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('marital_status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-12">
                                        <label>Nomor HP</label>
                                        <input type="text" class="form-control @error('hp') is-invalid
                                            @enderror" name="hp" value="{{$user->villager->phone}}" required>
                                        @error('hp')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Profesi</label>
                                        <input type="text" class="form-control @error('profession') is-invalid
                                        @enderror" name="profession" value="{{$user->villager->profession}}" required>
                                        @error('profession')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Pendidikan Terakhir</label>
                                        <input type="text" class="form-control @error('last_education') is-invalid
                                        @enderror" name="last_education" value="{{$user->villager->last_education}}"
                                            required>
                                        @error('last_education')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Agama</label>
                                        <input type="text" class="form-control @error('religion') is-invalid
                                        @enderror" name="religion" value="{{$user->villager->religion}}" required>
                                        @error('religion')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-12">
                                        <label>KTP</label>
                                        <input type="file" class="form-control @error('ktp') is-invalid
                                            @enderror" name="ktp">
                                        <small><a href="{{Storage::url($user->villager->ktp)}}" target="_blanks">Lihat
                                                KTP</a></small>
                                        @error('ktp')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>KK</label>
                                        <input type="file" class="form-control @error('kk') is-invalid
                                        @enderror" name="kk">
                                        <small><a href="{{Storage::url($user->villager->kk)}}" target="_blanks">Lihat
                                                KK</a></small>
                                        @error('kk')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
