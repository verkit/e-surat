<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{route('home')}}">e-surat</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('home')}}">ES</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Menu</li>
        <li class="dropdown @yield('menu-1')">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="far fa-file-alt"></i><span>Permohonan Masuk</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('menu-1-1')"><a class="nav-link" href="{{route('permohonan-surat')}}">Terkirim</a>
                </li>
                <li class="@yield('menu-1-2')"><a class="nav-link"
                        href="{{route('permohonan-surat.sukses')}}">Selesai</a></li>
            </ul>
        </li>
        <li class="dropdown @yield('menu-2')">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-align-left"></i>
                <span>Form</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('menu-2-1')"><a class="nav-link" href="{{route('form')}}">Daftar Form</a></li>
                <li class="@yield('menu-2-2')"><a class="nav-link" href="{{route('buat.form')}}">Tambah Form</a></li>
            </ul>
        </li>
        <li class="dropdown @yield('menu-3')">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file"></i>
                <span>Surat</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('menu-3-1')"><a class="nav-link" href="{{route('surat')}}">Daftar Surat</a></li>
                <li class="@yield('menu-3-2')"><a class="nav-link" href="{{route('buat.surat')}}">Tambah Surat</a></li>
            </ul>
        </li>
        <li class="@yield('menu-4')">
            <a href="{{route('akun')}}" class="nav-link"><i class="fas fa-users"></i><span>Data Akun</span></a>
        </li>
        <li class="@yield('menu-5')">
            <a href="{{route('profil')}}" class="nav-link"><i class="far fa-user"></i><span>Profil</span></a>
        </li>
        <li class="@yield('menu-6')">
            <a href="{{route('perangkat-desa')}}" class="nav-link"><i class="far fa-address-card"></i><span>Perangkat
                    Desa</span></a>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
            class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>
