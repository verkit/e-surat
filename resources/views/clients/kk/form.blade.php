
    <div class="form-group my-3">
        <label class="mb-2">No KK</label>
        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"
            value="{{old('no_kk')}}">
        <small>Isikan sesuai dengan no KK Lama</small>
        @error('no_kk')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">Kepala Keluarga</label>
        <input type="text" class="form-control @error('kepala_keluarga') is-invalid @enderror" name="kepala_keluarga"
            value="{{old('kepala_keluarga')}}">
        @error('kepala_keluarga')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
            value="{{old('alamat')}}">
        @error('alamat')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">RT/RW</label>
        <input type="text" class="form-control @error('rt_rw') is-invalid @enderror" name="rt_rw"
            value="{{old('rt_rw')}}">
        <small>Contoh: 001/002</small>
        @error('rt_rw')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">Kode Pos</label>
        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
            value="{{old('kode_pos')}}">
        @error('kode_pos')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">Desa/Kelurahan</label>
        <input type="text" class="form-control @error('desa_kelurahan') is-invalid @enderror" name="desa_kelurahan"
            value="{{old('desa_kelurahan')}}">
        @error('desa_kelurahan')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
            value="{{old('kecamatan')}}">
        @error('kecamatan')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">Kabupaten/Kota</label>
        <input type="text" class="form-control @error('kabupaten_kota') is-invalid @enderror" name="kabupaten_kota"
            value="{{old('kabupaten_kota')}}">
        @error('kabupaten_kota')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group my-3">
        <label class="mb-2">Provinsi</label>
        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi"
            value="{{old('provinsi')}}">
        @error('provinsi')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
