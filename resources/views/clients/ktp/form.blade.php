<form method="POST" action="{{route('simpan.ktp')}}" autocomplete="off">
    @csrf
    <div class="row">
        <div class="form-group my-3">
            <label class="mb-2">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                value="{{old('nama')}}" >
            @error('nama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid
                    @enderror" name="nik" value="{{old('nik')}}" >
            @error('nik')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Golongan Darah</label>
            <select class="form-control @error('golongan_darah') is-invalid @enderror" name="golongan_darah" >
                <option value="" disabled selected>Pilih</option>
                @foreach ($blood_types as $item)
                <option value="{{$item->id}}">
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
            <select class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" >
                <option value="" disabled selected>Pilih</option>
                @foreach ($citizenships as $item)
                <option value="{{$item->id}}">
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
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                value="{{old('alamat')}}" >
            @error('alamat')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">RT</label>
            <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt" value="{{old('rt')}}"
                placeholder="Contoh : 001" >
            @error('rt')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">RW</label>
            <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw" value="{{old('rw')}}"
                placeholder="Contoh : 001" >
            @error('rw')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                value="{{old('tempat_lahir')}}" >
            @error('tempat_lahir')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                value="{{old('tanggal_lahir')}}" >
            @error('tanggal_lahir')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        {{-- <div class="form-group my-3">
            <label class="mb-2">Bulan Lahir</label>
            <input type="text" class="form-control @error('birthmonth') is-invalid @enderror" name="birthmonth"
                value="{{old('birthmonth')}}" >
            @error('birthmonth')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label class="mb-2">Tahun Lahir</label>
            <input type="text" class="form-control @error('birthyear') is-invalid @enderror" name="birthyear"
                value="{{old('birthyear')}}" >
            @error('birthyear')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div> --}}
        <div class="form-group my-3">
            <label class="mb-2">Jenis Kelamin</label>
            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" >
                <option value="" disabled selected>Pilih</option>
                @foreach ($genders as $item)
                <option value="{{$item->id}}">
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
            <select class="form-control @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" >
                <option value="" disabled selected>Pilih</option>
                @foreach ($marital_statuses as $item)
                <option value="{{$item->id}}">
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
                @enderror" name="profesi" value="{{old('profesi')}}" >
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
                <option value="" disabled selected>Pilih</option>
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
    </div>
    <button class="btn saasbox-btn white-btn w-100" type="submit">Ajukan Permohonan</button>
</form>
