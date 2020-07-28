<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <form method="POST" action="{{route('ubah.ktp', $data->id)}}"
            autocomplete="off">
            @method('put')
            @csrf
            <div class="card-header">
                <h4>Permohonan KTP {{$data->fullname}}</h4>
                <div class="ml-auto">
                    <a href="{{route('cetak.ktp', $data->id)}}" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i>
                        Cetak</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4 col-12">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                            value="{{$data->fullname}}" required>
                        @error('fullname')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <label>NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid
                            @enderror" name="nik" value="{{$data->nik}}" required>
                        @error('nik')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label>Golongan Darah</label>
                        <select class="form-control @error('blood_type') is-invalid @enderror" name="blood_type" required>
                            @foreach ($blood_types as $item)
                            <option value="{{$item->id}}" @if ($data->blood_type_id == $item->id)
                                selected
                                @endif>
                                {{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_type')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label>Kewarganegaraan</label>
                        <select class="form-control @error('citizenship') is-invalid @enderror" name="citizenship" required>
                            @foreach ($citizenships as $item)
                            <option value="{{$item->id}}" @if ($data->citizenship_id == $item->id)
                                selected
                                @endif>
                                {{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('citizenship')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-8 col-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            value="{{$data->address}}" required>
                        @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label>RT</label>
                        <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"
                            value="{{$data->rt}}" required>
                        @error('rt')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label>RW</label>
                        <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw"
                            value="{{$data->rw}}" required>
                        @error('rw')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control @error('birthplace') is-invalid @enderror"
                            name="birthplace" value="{{$data->birthplace}}" required>
                        @error('birthplace')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control @error('birthdate') is-invalid @enderror"
                            name="birthdate" value="{{$data->birthdate}}" required>
                        @error('birthdate')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label>Bulan Lahir</label>
                        <input type="text" class="form-control @error('birthmonth') is-invalid @enderror"
                            name="birthmonth" value="{{$data->birthmonth}}" required>
                        @error('birthmonth')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label>Tahun Lahir</label>
                        <input type="text" class="form-control @error('birthyear') is-invalid @enderror"
                            name="birthyear" value="{{$data->birthyear}}" required>
                        @error('birthyear')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 col-12">
                        <label>Jenis Kelamin</label>
                        <select class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                            @foreach ($genders as $item)
                            <option value="{{$item->id}}" @if ($data->gender_id == $item->id)
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
                        <select class="form-control @error('marital_status') is-invalid @enderror" name="marital_status"
                            required>
                            @foreach ($marital_statuses as $item)
                            <option value="{{$item->id}}" @if ($data->marital_status_id ==
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
                    <div class="form-group col-md-3 col-12">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control @error('profession') is-invalid
                        @enderror" name="profession" value="{{$data->profession}}" required>
                        @error('profession')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Agama</label>
                        <select name="religion" id="religion" class="form-control @error('religion') is-invalid
                        @enderror">
                            @foreach ($religions as $item)
                            <option value="{{$item->id}}" @if ($data->religion_id ==
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
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-12">
                        <label>Penandatangan</label>
                        <select name="signature" id="signature" required class="form-control @error('signature') is-invalid
                        @enderror">
                            <option>Pilih penandatangan</option>
                            @foreach ($administrators as $item)
                            <option value="{{$item->id}}" @if ($data->signature_id == $item->id)
                                selected
                                @endif>{{$item->position}}</option>
                            @endforeach
                        </select>
                        @error('signature')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
