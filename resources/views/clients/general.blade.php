@extends('layouts.client-master')
@section('content')
<!-- Service Area-->
<section class="service-area section-padding-120" id="layanan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h2>Surat Keterangan Umum</h2>
                    <p>Berikut pelayanan online surat umum yang bisa dilakukan secara daring</p>
                </div>
            </div>
        </div>
        <div class="hero--content--area">
            <div class="row justify-content-center g-4">
                @foreach ($letters as $item)
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card hero-card h-100 border-0 wow fadeInUp" data-wow-delay="100ms"
                        data-wow-duration="1000ms">
                        <div class="card-body"><i class="lni-library"></i>
                            <h5>{{$item->letter_name}}</h5>
                            <a href="{{route('detail.surat', $item->id)}}" class="btn saasbox-btn white-btn btn-sm mt-2">Ajukan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
