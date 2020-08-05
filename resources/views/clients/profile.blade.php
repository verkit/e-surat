@extends('layouts.client-master')
@section('content')
<!-- Service Area-->
<section class="service-area section-padding-120 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading">
                    <h2>Profil</h2>
                    <p>Data diri anda</p>
                </div>
            </div>
        </div>
        <div class="row g-5">
            @if(Auth::user()->villager->nik == null ||
            Auth::user()->villager->birthdate == null ||
            Auth::user()->villager->birthplace == null ||
            Auth::user()->villager->profession == null ||
            Auth::user()->villager->gender_id == null ||
            Auth::user()->villager->marital_status_id == null ||
            Auth::user()->villager->religion_id == null ||
            Auth::user()->villager->address == null ||
            Auth::user()->villager->last_education == null ||
            Auth::user()->villager->ktp == null ||
            Auth::user()->villager->kk == null ||
            Auth::user()->villager->phone == null)
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        Harap lengkapi biodata anda
                    </div>
                </div>
            </div>
            @endif
            @if (session('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif
            @if (session('warning'))
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('warning') }}
                    </div>
                </div>
            </div>
            @endif
            @if (session('warning'))
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('warning') }}
                    </div>
                </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        Terjadi kesalahan saat menyimpan data
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card register-card p-1 p-sm-4 mb-50 wow fadeInUp" data-wow-delay="200ms"
                    data-wow-duration="1000ms">
                    <form method="POST" action="{{route('update.profil')}}" enctype="multipart/form-data"
                        autocomplete="off">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <h4>Informasi Pribadi</h4>
                            <div class="my-5">
                                <div class="form-group my-3">
                                    <label class="mb-2">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{$user->name}}" required>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid
                                            @enderror" name="nik" value="{{$user->villager->nik}}" required>
                                    @error('nik')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group my-3">
                                    <label class="mb-2">Alamat</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{$user->villager->address}}" required>
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{$user->email}}" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group my-3">
                                    <label class="mb-2">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('birthplace') is-invalid @enderror"
                                        name="birthplace" value="{{$user->villager->birthplace}}" required>
                                    @error('birthplace')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">Tanggal Lahir</label>
                                    <input type="date" class="form-control datepicker @error('birthdate') is-invalid
                                        @enderror" name="birthdate" value="{{$user->villager->birthdate}}" required>
                                    @error('birthdate')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">Jenis Kelamin</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        required>
                                        <option disabled selected>Pilih</option>
                                        @foreach ($genders as $item)
                                        <option value="{{$item->id}}" @if ($user->villager->gender_id == $item->id)
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
                                <div class="form-group my-3">
                                    <label class="mb-2">Status Pernikahan</label>
                                    <select class="form-control @error('marital_status') is-invalid @enderror"
                                        name="marital_status" required>
                                        <option disabled selected>Pilih</option>
                                        @foreach ($marital_statuses as $item)
                                        <option value="{{$item->id}}" @if ($user->villager->marital_status_id ==
                                            $item->id)
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

                                <div class="form-group my-3">
                                    <label class="mb-2">Nomor HP</label>
                                    <input type="text" class="form-control @error('hp') is-invalid
                                            @enderror" name="hp" value="{{$user->villager->phone}}" required>
                                    @error('hp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">Profesi</label>
                                    <input type="text" class="form-control @error('profession') is-invalid
                                        @enderror" name="profession" value="{{$user->villager->profession}}" required>
                                    @error('profession')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control @error('last_education') is-invalid
                                        @enderror" name="last_education" value="{{$user->villager->last_education}}"
                                        required>
                                    @error('last_education')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">Agama</label>
                                    <select name="religion" id="religion" class="form-control @error('religion') is-invalid
                                        @enderror">
                                        <option disabled selected>Pilih</option>
                                        @foreach ($religions as $item)
                                        <option value="{{$item->id}}" @if ($user->villager->religion_id ==
                                            $item->id)
                                            selected
                                            @endif>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('religion')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">KTP
                                        @if ($user->villager->ktp)
                                        <a href="{{Storage::url($user->villager->ktp)}}"
                                            class="ml-2 btn btn-sm btn-primary" target="_blanks">Lihat</a>
                                        @endif
                                    </label>
                                    <input type="file" class="form-control @error('ktp') is-invalid
                                            @enderror" name="ktp" accept=".jpg,.jpeg,.png,.pdf">
                                    @if ($user->villager->ktp)
                                    <small>Silahkan upload KTP, apabila ingin memperbaruinya</small>
                                    @else
                                    <small>Kosongi apabila belum mempunyai KTP</small>
                                    @endif
                                    @error('ktp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="mb-2">KK
                                        @if ($user->villager->kk)
                                        <a href="{{Storage::url($user->villager->kk)}}"
                                            class="ml-2 btn btn-sm btn-primary" target="_blanks">Lihat</a>
                                        @endif
                                    </label>
                                    <input type="file" class="form-control @error('kk') is-invalid
                                        @enderror" name="kk" accept=".jpg,.jpeg,.png,.pdf">
                                    @if ($user->villager->kk)
                                    <small>Silahkan upload KK, apabila ingin memperbaruinya</small>
                                    @endif
                                    @error('kk')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn saasbox-btn mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Ganti Password -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="card register-card p-1 p-sm-4 mb-50 wow fadeInUp" data-wow-delay="200ms"
                    data-wow-duration="1000ms">
                    <div class="card-body">
                        <form action="{{route('update.password')}}" method="post" autocomplete="off">
                            @csrf
                            @method('put')
                            <h4>Ubah Password</h4>
                            <div class="form-group my-3">
                                <label class="mb-2">Password Lama</label>
                                <input type="password" class="form-control @error('password_lama') is-invalid
                                    @enderror" name="password_lama" required>
                                @error('password_lama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Password Baru</label>
                                <input type="password" class="form-control @error('password_baru') is-invalid
                                    @enderror" name="password_baru" required>
                                @error('password_baru')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
