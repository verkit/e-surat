<div class="col-12 col-md-10 col-lg-10">
    <div class="card">
        <form autocomplete="off" method="POST" action="{{route('ubah.anggota.kk', $data->id)}}">
            @method('put')
            @csrf
            <div class="card-header">
                <h4>Anggota Blangko KK</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control @error('fullname') is-invalid
                        @enderror" name="fullname" value="{{$data->fullname}}">
                    @error('fullname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid
                            @enderror" name="nik" value="{{$data->nik}}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Jenis Kelamin</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="gender" value="1" class="selectgroup-input"
                                @if($data->gender_id == 1)
                                checked
                                @endif>
                                <span class="selectgroup-button">Laki-Laki</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="gender" value="2" class="selectgroup-input"
                                @if($data->gender_id == 2)
                                checked
                                @endif >
                                <span class="selectgroup-button">Perempuan</span>
                            </label>
                        </div>
                        @error('gender')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control @error('birthplace') is-invalid
                            @enderror" name="birthplace" value="{{$data->birthplace}}">
                        @error('birthplace')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control @error('birthdate') is-invalid
                            @enderror" name="birthdate" value="{{$data->birthdate}}">
                        <small>Contoh format : 11-09-1990</small>
                        @error('birthdate')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Agama</label>
                        <input type="text" class="form-control @error('religion') is-invalid
                            @enderror" name="religion" value="{{$data->religion}}">
                        @error('religion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Pendidikan</label>
                        <input type="text" class="form-control @error('education') is-invalid
                            @enderror" name="education" value="{{$data->education}}">
                        @error('education')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control @error('profession') is-invalid
                            @enderror" name="profession" value="{{$data->profession}}">
                        @error('profession')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Golongan Darah</label>
                        <input type="text" class="form-control @error('blood_type') is-invalid
                            @enderror" name="blood_type" value="{{$data->blood_type}}">
                        @error('blood_type')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Status Perkawinan</label>
                        <select class="form-control" name="marital_status">
                            @foreach ($marital_statuses as $item)
                            <option value="{{$item->id}}" @if ($item->id == $data->marital_status_id)
                                selected
                                @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('marital_status')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Tanggal Pernikahan</label>
                        <input type="text" class="form-control @error('marriage_date') is-invalid
                            @enderror" name="marriage_date" value="{{$data->marriage_date}}">
                        <small>Contoh format : 11-09-1990</small>
                        @error('marriage_date')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Status hubungan dalam keluarga</label>
                        <input type="text" class="form-control @error('status_in_family') is-invalid
                            @enderror" name="status_in_family" value="{{$data->status_in_family}}">
                        @error('status_in_family')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Kewarganegaraan</label>
                        <input type="text" class="form-control @error('citizenship') is-invalid
                            @enderror" name="citizenship" value="{{$data->citizenship}}">
                        @error('citizenship')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>No Passport</label>
                        <input type="text" class="form-control @error('passport') is-invalid
                            @enderror" name="passport" value="{{$data->passport}}">
                        @error('passport')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>No KITAP</label>
                        <input type="text" class="form-control @error('kitap') is-invalid
                            @enderror" name="kitap" value="{{$data->kitap}}">
                        @error('kitap')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Nama Ayah</label>
                        <input type="text" class="form-control @error('father_name') is-invalid
                            @enderror" name="father_name" value="{{$data->father_name}}">
                        @error('father_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Nama Ibu</label>
                        <input type="text" class="form-control @error('mother_name') is-invalid
                            @enderror" name="mother_name" value="{{$data->mother_name}}">
                        @error('mother_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
