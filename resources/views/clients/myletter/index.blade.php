@extends('layouts.client-master')
@section('content')
<!-- Service Area-->
<section class="service-area section-padding-120" id="layanan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h2>Riwayat Permohonan</h2>
                    <p>Berikut daftar riwayat permohonan surat yang telah anda lakukan</p>
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
        </div>
        <div class="hero--content--area">
            <div class="row g-4 mb-5">
                <h5>Surat Keterangan Umum</h5>
                @if (count($letters) > 0)
                @foreach ($letters as $item)
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card hero-card h-100 border-0 wow fadeInUp" data-wow-delay="100ms"
                        data-wow-duration="1000ms"
                        onclick="window.open('{{route('surat.saya.umum', $item->id)}}', '_blank');">
                        <div class="card-body"><i class="lni-library"></i>
                            <h5>{{$item->letter->letter_name}}</h5>
                            <p>{{$item->created_at->isoFormat('d MMMM Y')}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>Anda belum pernah melakukan permohonan</p>
                @endif
            </div>
            <div class="row g-4 mb-5">
                <h5>KTP</h5>
                @if (count($ktp) > 0)
                @foreach ($ktp as $item)
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card hero-card h-100 border-0 wow fadeInUp" data-wow-delay="100ms"
                        data-wow-duration="1000ms"
                        onclick="window.open('{{route('surat.saya.ktp', $item->id)}}', '_blank');">
                        <div class="card-body"><i class="lni-library"></i>
                            <h5>KTP</h5>
                            <p>{{$item->fullname}}</p>
                            <small>{{$item->created_at->isoFormat('d MMMM Y')}}</small>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>Anda belum pernah melakukan permohonan</p>
                @endif
            </div>
            <div class="row g-4">
                <h5>KK</h5>
                @if (count($kk) > 0)
                @foreach ($kk as $item)
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card hero-card h-100 border-0 wow fadeInUp" data-wow-delay="100ms"
                        data-wow-duration="1000ms"
                        onclick="window.open('{{route('surat.saya.kk', $item->id)}}', '_blank');">
                        <div class="card-body"><i class="lni-library"></i>
                            @if ($item->is_new == 1)
                            <h5>Permohonan Baru</h5>
                            @else
                            <h5>Permohonan Pisah</h5>
                            @endif
                            <p>{{$item->number}}</p>
                            <small>{{$item->created_at->isoFormat('d MMMM Y')}}</small>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>Anda belum pernah melakukan permohonan</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
