@extends('layouts.client-master')
@section('content')
<!-- Register Area-->
<div class="register-area section-padding-120-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h2>Permohonan KTP</h2>
                    <p>{{$data->created_at->isoFormat('d MMMM Y')}}</p>
                    <button type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal"
                        data-target="#deleteModal">
                        Hapus Permohonan
                    </button>
                     <!-- Modal -->
                     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h6 class="modal-title">Yakin menghapus permohonan KTP?</h6>
                                    <div class="flex d-flex mt-3 justify-content-center">
                                        <button type="button" class="btn btn-sm btn-primary mr-1"
                                            data-dismiss="modal">Tidak</button>
                                        <form action="{{route('hapus.ktp', $data->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Iya</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <h4>Formulir KTP Baru</h4>
                        <!-- Register Form-->
                        <div class="row">
                            <div class="form-group my-3">
                                <label class="mb-2">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{$data->fullname}}" readonly>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid
                                            @enderror" name="nik" value="{{$data->nik}}" readonly>
                                @error('nik')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Golongan Darah</label>
                                <select class="form-control @error('golongan_darah') is-invalid @enderror"
                                    name="golongan_darah">
                                    @foreach ($blood_types as $item)
                                    <option value="{{$item->id}}" @if ($data->blood_type_id == $item->id)
                                        selected
                                        @endif
                                        disabled>
                                        {{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('golongan_darah')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Kewarganegaraan</label>
                                <select class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                    name="kewarganegaraan">
                                    @foreach ($citizenships as $item)
                                    <option value="{{$item->id}}" @if ($data->citizenship_id == $item->id)
                                        selected
                                        @endif
                                        disabled>
                                        {{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('kewarganegaraan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{$data->address}}" readonly>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">RT</label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"
                                    value="{{$data->rt}}" readonly placeholder="Contoh : 001">
                                @error('rt')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">RW</label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw"
                                    value="{{$data->rw}}" readonly placeholder="Contoh : 001">
                                @error('rw')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    name="tempat_lahir" value="{{$data->birthplace}}" readonly>
                                @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Tanggal Lahir</label>
                                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir"
                                    value="{{$data->birthdate}}-{{$data->birthmonth}}-{{$data->birthyear}}" readonly>
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin">
                                    @foreach ($genders as $item)
                                    <option value="{{$item->id}}" @if ($data->gender_id == $item->id)
                                        selected
                                        @endif
                                        disabled>
                                        {{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Status Pernikahan</label>
                                <select class="form-control @error('status_perkawinan') is-invalid @enderror"
                                    name="status_perkawinan">
                                    @foreach ($marital_statuses as $item)
                                    <option value="{{$item->id}}" @if ($data->marital_status_id ==
                                        $item->id)
                                        selected
                                        @endif>
                                        {{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('status_perkawinan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Pekerjaan</label>
                                <input type="text" class="form-control @error('profesi') is-invalid
                                        @enderror" name="profesi" value="{{$data->profession}}" readonly>
                                @error('profesi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2">Agama</label>
                                <select name="agama" id="agama" class="form-control @error('agama') is-invalid
                                        @enderror">
                                    @foreach ($religions as $item)
                                    <option value="{{$item->id}}" @if ($data->religion_id ==
                                        $item->id)
                                        selected
                                        @endif
                                        disabled>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('agama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
