<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">e-surat</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">ES</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Menu</li>
        <li class="@yield('menu-1')">
            <a href="#" class="nav-link"><i class="far fa-file-alt"></i><span>Permohonan Masuk</span></a>
        </li>
        <li class="dropdown @yield('menu-2')">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Surat</span></a>
            <ul class="dropdown-menu">
                <li class="@yield('menu-2-1')"><a class="nav-link" href="layout-default.html">Tambah Format Surat</a></li>
                <li class="@yield('menu-2-2')"><a class="nav-link" href="layout-transparent.html">Daftar Surat</a></li>
            </ul>
        </li>
        <li class="@yield('menu-3')">
            <a href="#" class="nav-link"><i class="far fa-user"></i><span>Profil</span></a>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</aside>
