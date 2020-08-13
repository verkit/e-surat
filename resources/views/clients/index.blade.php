@extends('layouts.client-master')
@section('content')
<!-- Welcome Area-->
<section class="welcome-area hero2" id="beranda">
    <!-- Background Shape-->
    <div class="hero-background-shape"><img src="{{asset('client/img/core-img/hero-2.png')}}" alt=""></div>
    <!-- Background Animation-->
    <div class="background-animation">
        <div class="star-ani"></div>
        <div class="circle-ani"></div>
        <div class="box-ani"></div>
    </div>
    <!-- Hero Circle-->
    <div class="hero2-big-circle"></div>
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-between">
            <div class="col-12 col-md-6">
                <!-- Content-->
                <div class="welcome-content pr-3">
                    <h2 class="wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">Pelayanan Publik Desa
                        Simbatan</h2>
                    <p class="mb-4 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">Pelayanan yang
                        dapat membantu masyarakat dalam permohonan surat keterangan yang dibuat oleh desa dilakukan
                        secara daring</p>
                    <div class="btn-group-one wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
                        {{-- <a class="btn saasbox-btn white-btn mt-3" href="#">More About
                                Us</a> --}}
                        <a class="btn saasbox-btn mt-3 white-btn video-play-btn"
                            href="https://www.youtube.com/watch?v=rQxCOL9gAxQ" data-effect="mfp-zoom-in"><i
                                class="mr-1 lni-play"></i>Panduan</a></div>
                </div>
            </div>
            <div class="col-10 col-md-6">
                <div class="welcome-thumb wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms"><img
                        src="{{asset('client/img/bg-img/hero-6.png')}}" alt=""></div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="border-dashed"></div>
</div>
<!-- FAQ Area-->
<div class="faq--area section-padding-120-70" id="faq">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-6">
                <div class="faq-content mb-50">
                    <h2>Tanya Jawab</h2>
                    <div class="accordion faq--accordian mt-5" id="faqaccordian">
                        <!-- Single FAQ-->
                        <div class="card border-0">
                            <div class="card-header" id="headingOne">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">Bagaimana cara mengajukan
                                    permohonan surat?</button>
                            </div>
                            <div class="collapse show" id="collapseOne" aria-labelledby="headingOne"
                                data-parent="#faqaccordian">
                                <div class="card-body">
                                    <p>Silahkan menuju bagian <a href="/#layanan">surat</a> dan isikan seluruh form yang
                                        tertera. Sebelum anda mengajukan surat, anda harus <a
                                        href="{{route('register')}}">mendaftarkan akun</a> terlebih dahulu.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single FAQ-->
                        <div class="card border-0">
                            <div class="card-header" id="headingTwo">
                                <button class="btn collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Kapan
                                    surat bisa diambil?</button>
                            </div>
                            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo"
                                data-parent="#faqaccordian">
                                <div class="card-body">
                                    <p>Surat dapat diambil keesokan hari setelah melakukan permohonan. Jika hari esok adalah hari libur, maka surat dapat diambil setelah hari libur</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single FAQ-->
                        <div class="card border-0">
                            <div class="card-header" id="headingThree">
                                <button class="btn collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true"
                                    aria-controls="collapseThree">Kapan kantor desa beroperasi?</button>
                            </div>
                            <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                                data-parent="#faqaccordian">
                                <div class="card-body">
                                    <p>Kantor desa beroperasi setiap hari senin -jumat kecuali hari libur nasional,
                                        mulai dari jam 08:00 - 14:00 WIB </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="faq--thumbnail mb-50"><img src="{{asset('client/img/bg-img/hero-4.png')}}" alt=""></div>
            </div>
        </div>
    </div>
</div>
<!-- Service Area-->
<section class="service-area section-padding-120" id="layanan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h2>Layanan E-Surat</h2>
                    <p>Berikut pelayanan online yang bisa dilakukan secara daring</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-5">
            <!-- Single Service Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="card service-card wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                    <div class="card-body">
                        <div class="icon"><i class="lni-library"></i></div>
                        <h4>Permohonan KK</h4>
                        <p>Permohonan pembuatan KK</p>
                        <a href="{{route('buat.kk')}}" class="btn-sm saasbox-btn mt-3">Ajukan Permohonan</a>
                    </div>
                </div>
            </div>
            <!-- Single Service Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="card service-card wow active fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">
                    <div class="card-body">
                        <div class="icon"><i class="lni-layers"></i></div>
                        <h4>Surat Keterangan Umum</h4>
                        <p>Permohonan pembuatan surat keterangan umum. Contoh : SKTM, Surat Pergi, Dll</p>
                        <a href="{{route('surat-umum')}}" class="btn-sm saasbox-btn mt-3">Ajukan Permohonan</a>
                    </div>
                </div>
            </div>
            <!-- Single Service Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="card service-card wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                    <div class="card-body">
                        <div class="icon"><i class="lni-postcard"></i></div>
                        <h4>Permohonan KTP</h4>
                        <p>Permohonan pembuatan KTP baru</p>
                        <a href="{{route('buat.ktp')}}" class="btn-sm saasbox-btn mt-3">Ajukan Permohonan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
