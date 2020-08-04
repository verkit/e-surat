@extends('layouts.client-master')
@section('content')
<section class="service-area section-padding-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Layanan E-Surat</h2>
                    <p>Permohonan KK</p>
                </div>
            </div>
            <div class="col-12 mb-5">
                <div class="faq-content">
                    <h2>Panduan</h2>
                    <div class="accordion faq--accordian mt-5" id="faqaccordian">
                        <!-- Single FAQ-->
                        <div class="card border-0">
                            <div class="card-header" id="headingOne">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">Bagaimana cara memperbarui
                                    KK?</button>
                            </div>
                            <div class="collapse show" id="collapseOne" aria-labelledby="headingOne"
                                data-parent="#faqaccordian">
                                <div class="card-body">
                                    <p>Silahkan klik "Ajukan Permohonan" pada <b>KK Baru</b>. Isikan seluruh formulir,
                                        dan isi
                                        data-data anggota keluarganya</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single FAQ-->
                        <div class="card border-0">
                            <div class="card-header" id="headingTwo">
                                <button class="btn collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true"
                                    aria-controls="collapseTwo">Bagaimana cara melakukan pisah KK?</button>
                            </div>
                            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo"
                                data-parent="#faqaccordian">
                                <div class="card-body">
                                    <p>Ada 2 permohonan yang harus dilakukan. <b>Pertama</b> perbarui KK Lama terlebih
                                        dahulu dengan membuat permohonan KK Baru, isikan seluruh form dan anggota
                                        keluarga. <b>Kedua</b> ajukan permohonan KK Pisah dan isikan seluruh form
                                        beserta anggota keluarganya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-5">
            <!-- Single Service Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="card service-card wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                    <div class="card-body">
                        <div class="icon"><i class="lni-library"></i></div>
                        <h4>KK Baru</h4>
                        <p>Permohonan pembuatan KK Baru</p>
                        <a href="{{route('buat.kk.baru')}}" class="btn-sm saasbox-btn mt-3">Ajukan Permohonan</a>
                    </div>
                </div>
            </div>
            <!-- Single Service Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="card service-card wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">
                    <div class="card-body">
                        <div class="icon"><i class="lni-layers"></i></div>
                        <h4>KK Pisah</h4>
                        <p>Permohonan pemisahan anggota KK</p>
                        <a href="{{route('buat.kk.pisah')}}" class="btn-sm saasbox-btn mt-3">Ajukan Permohonan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
