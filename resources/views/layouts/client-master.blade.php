<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pelayanan publik desa simbatan, magetan">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>E-Surat | Pelayanan Publik Desa Simbatan, Magetan</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('storage/logo-magetan.png')}}">
    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="{{asset('client/style.css')}}">
</head>

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-light" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <!-- Header Area-->
    <header class="header-area header2">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar navbar2 justify-content-between" id="saasboxNav">
                    <!-- Logo--><a class="nav-brand mr-5" href="/"><img src="{{asset('client/img/core-img/logo.png')}}"
                            alt=""></a>
                    <!-- Navbar Toggler-->
                    <div class="classy-navbar-toggler"><span
                            class="navbarToggler"><span></span><span></span><span></span><span></span></span></div>
                    <!-- Menu-->
                    <div class="classy-menu">
                        <!-- close btn-->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start-->
                        <div class="classynav">
                            <ul id="corenav">
                                <li><a href="/#beranda">Beranda</a></li>
                                <li><a href="/#layanan">Layanan</a></li>
                                <li><a href="/#faq">Tanya Jawab</a></li>
                                @if (Auth::check())
                                @if (Auth::user()->role == "admin")
                                <li><a href="{{route('home')}}">Dashboard</a></li>
                                @else
                                <li><a href="#">Hi, {{Auth::user()->name}}</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('surat.saya')}}"><i class="lni-diamond"></i><span>Permohonan<span>riwayat
                                                        permohonan anda</span></span></a></li>
                                        <li><a href="{{route('profil.saya')}}"><i class="lni-cog"></i><span>Profil<span>Data
                                                        diri</span></span></a></li>
                                    </ul>
                                </li>
                                @endif

                                @endif
                            </ul>
                            <!-- Login Button-->
                            @guest
                            <div class="login-btn-area ml-4 mt-4 mt-lg-0"><a class="btn saasbox-btn btn-sm"
                                    href="{{route('login')}}">Masuk</a></div>
                            @else
                            <div class="login-btn-area ml-4 mt-4 mt-lg-0">
                                <a class="btn saasbox-btn btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">Keluar</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @endguest

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Cookie Alert Area-->
    {{-- <div class="cookiealert mb-0" role="alert">
      <p>This site uses cookies. We use cookies to ensure you get the best experience on our website. For details, please check our <a href="#" target="_blank"> Privacy Policy.</a></p>
      <button class="btn btn-primary acceptcookies" type="button" aria-label="Close">I agree</button>
    </div> --}}
    <!-- Footer Area-->
    <footer class="footer-area footer2 section-padding-50">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <!-- Copywrite Text-->
                    <div class="footer--content-text">
                        <p class="mb-1">Desa Simbatan, Kec. Nguntoronadi, Kab. Magetan </p>
                        <p class="mb-0">Dibuat oleh <a href="#" target="_blank">Verdy Bangkit (KKN 34 UNEJ 2020)</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- All JavaScript Files-->
    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{asset('client/js/default/classy-nav.min.js')}}"></script>
    <script src="{{asset('client/js/waypoints.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('client/js/default/jquery.scrollup.min.js')}}"></script>
    <script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('client/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('client/js/default/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.animatedheadline.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('client/js/wow.min.js')}}"></script>
    <script src="{{asset('client/js/jarallax.min.js')}}"></script>
    <script src="{{asset('client/js/jarallax-video.min.js')}}"></script>
    <script src="{{asset('client/js/default/cookiealert.js')}}"></script>
    <script src="{{asset('client/js/default/jquery.passwordstrength.js')}}"></script>
    <script src="{{asset('client/js/default/mail.js')}}"></script>
    <script src="{{asset('client/js/default/active.js')}}"></script>
    {{-- <script>
        if (window.location.href != '/m/profil') {
            @if(Auth::check()){
                @if(Auth::user()->role == "user") {
                    @if(Auth::user()->villager->nik == null ||
                        Auth::user()->villager->birthdate == null ||
                        Auth::user()->villager->birthplace == null ||
                        Auth::user()->villager->profession == null ||
                        Auth::user()->villager->gender_id == null ||
                        Auth::user()->villager->marital_status_id == null ||
                        Auth::user()->villager->religion_id == null ||
                        Auth::user()->villager->address == null ||
                        Auth::user()->villager->last_education == null ||
                        Auth::user()->villager->ktp == null ||
                        Auth::user()->villager->kk == null ||
                        Auth::user()->villager->phone == null) {
                        // setTimeout(function () {
                        //     window.location.href = '/m/profil';
                        // }, 500);
                    }
                    @endif

                }
                @endif
                }
            }
            @endif
    </script> --}}
</body>

</html>
