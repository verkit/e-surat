<div class="col-12 col-md-6 col-lg-6">
    <div class="card">
        <form autocomplete="off" method="POST" action="{{route('ubah.kk', $data->id)}}">
            @method('put')
            @csrf
            <div class="card-header">
                <h4>Blangko KK</h4>
                <div class="ml-auto">
                    <a href="{{route('cetak.kk', $data->id)}}" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i>
                        Cetak</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>No KK</label>
                    <input type="text" class="form-control @error('number') is-invalid
                        @enderror" required name="number" value="{{$data->number}}">
                    @error('number')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Nama Kepala Keluarga</label>
                        <input type="text" class="form-control @error('head_of_family') is-invalid
                            @enderror" required name="head_of_family" value="{{$data->head_of_family}}">
                        @error('head_of_family')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Desa/Kelurahan</label>
                        <input type="text" class="form-control @error('village') is-invalid
                            @enderror" required name="village" value="{{$data->village}}">
                        @error('village')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid
                            @enderror" required name="address" value="{{$data->address}}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control @error('district') is-invalid
                            @enderror" required name="district" value="{{$data->district}}">
                        @error('district')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>RT/RW</label>
                        <input type="text" class="form-control @error('rt_rw') is-invalid
                            @enderror" required name="rt_rw" value="{{$data->rt_rw}}">
                        <small>Contoh format : 001/001</small>
                        @error('rt_rw')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Kabupaten</label>
                        <input type="text" class="form-control @error('city') is-invalid
                            @enderror" required name="city" value="{{$data->city}}">
                        @error('city')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Kode Pos</label>
                        <input type="text" class="form-control @error('postal_code') is-invalid
                            @enderror" required name="postal_code" value="{{$data->postal_code}}">
                        @error('postal_code')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Provinsi</label>
                        <input type="text" class="form-control @error('province') is-invalid
                            @enderror" required name="province" value="{{$data->province}}">
                        @error('province')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
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
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
