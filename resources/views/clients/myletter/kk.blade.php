@extends('layouts.client-master')
@section('content')
<!-- Register Area-->
<div class="register-area section-padding-120-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h2>Permohonan KK @if ($data->is_new == 1)
                        Baru
                        @elseif($data->is_separate == 1)
                        Pisah
                        @endif</h2>
                    <p>Tanggal permohonan : {{$data->created_at->isoFormat('d MMMM Y')}}</p>
                    <button type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal"
                        data-target="#deleteModal">
                        Hapus Permohonan
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h6 class="modal-title">Yakin menghapus permohonan KK?</h6>
                                    <div class="flex d-flex mt-3 justify-content-center">
                                        <button type="button" class="btn btn-sm btn-primary mr-1"
                                            data-dismiss="modal">Tidak</button>
                                        <form action="{{route('hapus.kk', $data->id)}}" method="POST">
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
            <div class="col-12 col-lg-8">
                <div class="card register-card bg-gray p-1 p-sm-4 mb-50">
                    <div class="card-body">
                        <h4>Form KK</h4>
                        <!-- Register Form-->
                        @include('clients.myletter.kk-form')
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card register-card bg-gray p-1 p-sm-4 mb-50">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h6>Anggota Keluarga</h6>
                            </div>
                            <div class="col-2">
                                <a href="{{route('buat.anggota.kk', $data->id)}}"
                                    class="btn btn-primary btn-sm ml-auto"><i class="lni-plus"></i></a>
                            </div>
                        </div>
                        @foreach ($members as $item)
                        <div class="row my-3">
                            <div class="col-10">
                                <a
                                    href="{{route('detail.anggota.kk', ['id'=>$data->id, 'aid'=>$item->id])}}">{{$item->fullname}}</a>
                            </div>
                            <div class="ml-auto col-2">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#deleteModal{{$item->id}}">
                                    <i class="lni-trash"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h6 class="modal-title">Yakin menghapus "{{$item->fullname}}" dari anggota
                                            keluarga?</h6>
                                        <div class="flex d-flex mt-3">
                                            <button type="button" class="btn btn-sm btn-primary mr-1"
                                                data-dismiss="modal">Tidak</button>
                                            <form action="{{route('hapus.anggota.kk.saya', $item->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Iya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
