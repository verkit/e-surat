<form autocomplete="off" method="POST" action="{{route('simpan.anggota.kk', $kk->id)}}">
    @csrf
    <div class="row">
        <div class="form-group my-3">
            <label class="mb-2">Nama Lengkap*</label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid
                @enderror" name="nama_lengkap" value="{{old('nama_lengkap')}}">
            @error('nama_lengkap')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">NIK*</label>
            <input type="text" class="form-control @error('nik') is-invalid
                    @enderror" name="nik" value="{{old('nik')}}">
            @error('nik')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Jenis Kelamin*</label>
            <select class="form-control" name="jenis_kelamin">
                <option disabled selected>Pilih</option>
                @foreach ($genders as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('jenis_kelamin')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Tempat Lahir*</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid
                    @enderror" name="tempat_lahir" value="{{old('tempat_lahir')}}">
            @error('tempat_lahir')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Tanggal Lahir*</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid
                    @enderror" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
            @error('tanggal_lahir')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Agama*</label>
            <select class="form-control" name="agama">
                <option disabled selected>Pilih</option>
                @foreach ($religions as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('agama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Pendidikan*</label>
            <input type="text" class="form-control @error('pendidikan') is-invalid
                    @enderror" name="pendidikan" value="{{old('pendidikan')}}">
            @error('pendidikan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Pekerjaan*</label>
            <input type="text" class="form-control @error('pekerjaan') is-invalid
                    @enderror" name="pekerjaan" value="{{old('pekerjaan')}}">
            @error('pekerjaan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Golongan Darah*</label>
            <select class="form-control" name="golongan_darah">
                <option disabled selected>Pilih</option>
                @foreach ($blood_types as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('golongan_darah')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Status Perkawinan*</label>
            <select class="form-control" name="status_perkawinan">
                <option disabled selected>Pilih</option>
                @foreach ($marital_statuses as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('status_perkawinan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Tanggal Pernikahan</label>
            <input type="date" class="form-control @error('tanggal_pernikahan') is-invalid
                    @enderror" name="tanggal_pernikahan" value="{{old('tanggal_pernikahan')}}">
            @error('tanggal_pernikahan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Status hubungan dalam keluarga*</label>
            <input type="text" class="form-control @error('status_hubungan') is-invalid
                    @enderror" name="status_hubungan" value="{{old('status_hubungan')}}">
            @error('status_hubungan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Kewarganegaraan*</label>
            <select class="form-control" name="kewarganegaraan">
                <option disabled selected>Pilih</option>
                @foreach ($citizenships as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('kewarganegaraan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">No Passport</label>
            <input type="text" class="form-control @error('passport') is-invalid
                    @enderror" name="passport" value="{{old('passport')}}">
            @error('passport')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">No KITAP</label>
            <input type="text" class="form-control @error('kitap') is-invalid
                    @enderror" name="kitap" value="{{old('kitap')}}">
            @error('kitap')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Nama Ayah*</label>
            <input type="text" class="form-control @error('nama_ayah') is-invalid
                    @enderror" name="nama_ayah" value="{{old('nama_ayah')}}">
            @error('nama_ayah')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Nama Ibu*</label>
            <input type="text" class="form-control @error('nama_ibu') is-invalid
                    @enderror" name="nama_ibu" value="{{old('nama_ibu')}}">
            @error('nama_ibu')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <button class="btn saasbox-btn white-btn w-100" type="submit">Simpan</button>
</form>
