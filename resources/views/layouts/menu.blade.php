<?php
$data = ['surat*', 'kategori*', 'kabinet*', 'user*' , 'jenis_surat*' , 'klasifikasi*'];

?>


<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="{{ request()->is('/') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ request()->is($data) ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#components-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ request()->is($data) ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                {{-- <li>
                    <a href="{{ url('surat') }}" class="{{ request()->is('surat*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Surat</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ url('klasifikasi') }}" class="{{ request()->is('klasifikasi*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Klasifikasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('kabinet') }}" class="{{ request()->is('kabinet*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Kabinet</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('jenis_surat') }}" class="{{ request()->is('jenis_surat*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Jenis Surat</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('user') }}" class="{{ request()->is('user*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Pengguna</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-heading">Master Surat</li>
        <li class="nav-item">
            <a class="{{ request()->is('data-surat-masuk*') ? 'nav-link' : 'nav-link collapsed' }} " href="{{ url('data-surat-masuk') }}">
                <i class="bi bi-arrow-down-square-fill"></i>
                <span>Data Surat Masuk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ request()->is('data-surat-keluar*') ? 'nav-link' : 'nav-link collapsed' }}" href="{{url('data-surat-keluar')}}">
                <i class="bi bi-arrow-up-square-fill"></i>
                <span>Data Surat Keluar</span>
            </a>
        </li>
        <li class="nav-heading">Master Laporan</li>
        <li class="nav-item">
            <a class="{{ request()->is('laporan-surat-masuk') ? 'nav-link' : 'nav-link collapsed' }}" href="{{url('laporan-surat-masuk')}}">
                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                <span>Laporan Surat Masuk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ request()->is('laporan-surat-keluar') ? 'nav-link' : 'nav-link collapsed' }}" href="{{url('laporan-surat-keluar')}}">
                <i class="bi bi-file-earmark-arrow-up-fill"></i>
                <span>Laporan Surat Keluar</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="{{ request()->is('laporan') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('laporan') }}">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Laporan</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="{{ request()->is('yj') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('log-out') }}">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>




    </ul>

</aside><!-- End Sidebar-->
