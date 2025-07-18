<div class="iq-sidebar  sidebar-default  ">
    <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
        <a href="../backend/index.html" class="header-logo">
            <img src="{{ asset('datum') }}/assets/images/logo.png" class="img-fluid rounded-normal light-logo"
                alt="logo">
            <img src="{{ asset('datum') }}/assets/images/logo-dark.png"
                class="img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
            <span>SI IKA</span>
        </a>
        <div class="side-menu-bt-sidebar-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="side-menu">
                <li class="{{ Request::is('/dashboard') ? 'active' : '' }}
                    sidebar-layout">
                    <a href="{{ url('/dashboard') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </i>
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li class="px-3 pt-3 pb-2">
                    <span class="text-uppercase small font-weight-bold">Kriteria Parameter</span>
                </li>
                {{-- <li class="{{ Request::is('kurva-parameter') ? 'active' : '' }} sidebar-layout">
                    <a href="{{ route('index-kurva') }}" class="svg-icon">
                        <i class="">
                            <svg class="svg-icon" id="iq-chart-1" width="18" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"
                                    style="stroke-dasharray: 96, 116; stroke-dashoffset: 0;"></path>
                            </svg>
                        </i>
                        <span class="ml-2">Kurva Parameter</span>
                    </a>
                </li> --}}
                @if (Auth::user()->role == 'admin')
                    <li class="{{ Request::is('parameter-biotalaut') ? 'active' : '' }} sidebar-layout">
                        <a href="{{ route('index-biota') }}" class="svg-icon">
                            <i class="">
                                <svg class="svg-icon" width="18" id="iq-ui-1-10" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                        style="stroke-dasharray: 83, 103; stroke-dashoffset: 0;"></path>
                                </svg>
                            </i>
                            <span class="ml-2">Biota Laut</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('parameter-wisatabahari') ? 'active' : '' }} sidebar-layout">
                        <a href="{{ route('index-wisata') }}" class="svg-icon">
                            <i class="">
                                <svg class="svg-icon" width="18" id="iq-ui-1-12" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        style="stroke-dasharray: 85, 105; stroke-dashoffset: 0;"></path>
                                </svg>
                            </i>
                            <span class="ml-2">Wisata Bahari</span>
                        </a>
                    </li>
                @endif
                <li class="px-3 pt-3 pb-2">
                    <span class="text-uppercase small font-weight-bold">Data</span>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="{{ Request::is('data-pesisir') ? 'active' : '' }} sidebar-layout">
                        <a href="{{ route('index-pesisir') }}" class="svg-icon">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </i>
                            <span class="ml-2">Data Pesisir Laut</span>
                        </a>
                    </li>
                    <li class="sidebar-layout">
                        <a href="#app6" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </i>
                            <span class="ml-2">Data Parameter</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active"
                                width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <ul id="app6" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="{{ Request::is('data-parameter/biota-laut') ? 'active' : '' }} sidebar-layout">
                                <a href="{{ route('index-databiota') }}" class="svg-icon">
                                    <i class="">
                                        <svg class="svg-icon" width="18" id="iq-ui-1-10"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                                style="stroke-dasharray: 83, 103; stroke-dashoffset: 0;"></path>
                                        </svg>
                                    </i>
                                    <span class="ml-2">Biota Laut</span>
                                </a>
                            </li>
                            <li
                                class="{{ Request::is('data-parameter/wisata-bahari') ? 'active' : '' }} sidebar-layout">
                                <a href="{{ route('index-datawisata') }}" class="svg-icon">
                                    <i class="">
                                        <svg class="svg-icon" width="18" id="iq-ui-1-12"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                style="stroke-dasharray: 85, 105; stroke-dashoffset: 0;"></path>
                                        </svg>
                                    </i>
                                    <span class="ml-2">Wisata Bahari</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="{{ Request::is('data-uji') ? 'active' : '' }} sidebar-layout">
                    <a href="{{ route('index-uji') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </i>
                        <span class="ml-2">Data Uji</span>
                    </a>
                </li>
                <li class="{{ Request::is('data-laporan') ? 'active' : '' }} sidebar-layout">
                    <a href="{{ route('index-laporan') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                            </svg>
                        </i><span class="ml-2">Laporan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="pt-5 pb-5"></div>
    </div>
</div>
