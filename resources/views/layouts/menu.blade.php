<?php
$data = ['surat*',  'kategori*' , 'kabinet*'];

?>


<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="{{ request()->is('/') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="{{ request()->is($data) ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#components-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ request()->is($data) ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('surat') }}" class="{{ request()->is('surat*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Surat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('kategori') }}" class="{{ request()->is('kategori*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Ketegori</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('kabinet') }}" class="{{ request()->is('kabinet*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Kabinet</span>
                    </a>
                </li>
                <li>
                    <a href="components-breadcrumbs.html">
                        <i class="bi bi-circle"></i><span>Data Peminjam</span>
                    </a>
                </li>
                <li>
                    <a href="components-buttons.html">
                        <i class="bi bi-circle"></i><span>Data User</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->




    </ul>

</aside><!-- End Sidebar-->
