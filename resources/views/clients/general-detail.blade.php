@extends('layouts.client-master')
@section('content')
<!-- Register Area-->
<div class="register-area section-padding-120-70">
    <div class="container">
        <div class="row justify-content-center">
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
                        <h4>{{$letter->letter_name}}</h4>
                        <p>{{$letter->letter_description}}</p>
                        <!-- Register Form-->
                        <div class="my-5">
                            <form action="{{route('buat.permohonan-surat', $letter->id)}}" method="post"
                                autocomplete="off">
                                @csrf
                                @foreach ($letter->forms as $item)
                                @if ($item->is_displayed == 0)
                                <div class="form-group mb-3">
                                    <label class="mb-2">{{$item->form_name}}</label>
                                    <input class="form-control rounded-0" @if ($item->is_date == 1)
                                    type="date"
                                    @else
                                    type="text"
                                    @endif
                                    name="form_name[]" required>
                                    @if ($item->form_code == "[KETERANGAN]")
                                    <small>isi keterangan sedetail-detailnya. misal: surat dibuat untuk apa, lokasi dimana, tanggal, dll.</small>
                                    @elseif($item->form_code == "[NAMA]")
                                    <small>Tuliskan nama lengkap</small>
                                    @endif
                                    <input type="text" name="form_id[]" value="{{$item->id}}" readonly hidden>
                                </div>
                                @else
                                <input type="text" name="form_name[]" value="" readonly hidden>
                                <input type="text" name="form_id[]" value="{{$item->id}}" readonly hidden>
                                @endif
                                @endforeach
                                <button class="btn saasbox-btn white-btn w-100" type="submit">Ajukan Permohonan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
