<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <title>@yield('title') - {{config('app.name')}}</title>
    <link rel="icon" href="{{url('storage/logo-magetan.png')}}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    @stack('css-libraries')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                @include('dashboard.partials.topnav')
            </nav>
            <div class="main-sidebar sidebar-style-2">
                @include('dashboard.partials.sidebar')
            </div>

            <!-- Main Content -->
            @yield('main-content')

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020 <div class="bullet"></div> Develop by Verdy Bangkit (KKN UNEJ 2020) <div
                        class="bullet"></div> Pemerintah Desa Simbatan
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @stack('js-before')
    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/popper.js')}}"></script>
    <script src="{{asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    @stack('js-libraries')

    <!-- Page Specific JS File -->
    @stack('js-spesifics')

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script>
        const baseUrl = $('meta[name="base-url"]').attr('content');
        const _token = $('meta[name="csrf-token"]').attr('content');
        console.log(baseUrl);
    </script>
    @stack('js-after')

</body>

</html>
