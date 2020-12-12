@php
    $menu = DB::table('artikel')->where('menu','!=',null)->select('menu','submenu','sub_submenu')->get()->groupBy('menu');
@endphp
<header id="header">
    <div class="container-fluid d-flex justify-content-center">
        <div class="logo mr-auto d-lg-none d-md-block">
            <!-- Uncomment below if you prefer to use an image logo -->
            <h2>
                <a href="{{ url('') }}">
                    <img src="{{ asset(Storage::url($desa->logo)) }}" alt="" class="img-fluid">
                    Desa {{ $desa->nama_desa }}
                </a>
            </h2>
        </div>

        <!-- Navbar -->
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li>
                    <a class="text-uppercase" href="{{ route('home.index') }}">Beranda</a>
                </li>
                @foreach ($menu as $menu => $submenu)
                    <li class="{{ count($submenu->where('submenu','!=', null)) > 0 ? 'drop-down' : '' }}">
                        <a class="text-uppercase" href="/{{ Str::slug($menu) }}">{{ $menu }}</a>
                        @if (count($submenu->where('submenu','!=', null)) > 0)
                            <ul>
                                @foreach ($submenu->where('submenu','!=', null)->groupBy('submenu') as $submenu => $sub_submenu)
                                    <li class="{{ count($sub_submenu->where('submenu','!=', null)->where('sub_submenu','!=', null)) > 0 ? 'drop-down' : '' }}">
                                        <a href="/{{ Str::slug($menu) }}/{{ Str::slug($submenu) }}">{{ $submenu }}</a>
                                        @if (count($sub_submenu->where('submenu','!=', null)->where('sub_submenu','!=', null)) > 0)
                                            <ul>
                                                @foreach ($sub_submenu->where('submenu','!=', null)->where('sub_submenu','!=', null)->groupBy('sub_submenu') as $sub_submenu => $item)
                                                    <li><a href="/{{ Str::slug($menu) }}/{{ Str::slug($submenu) }}/{{ Str::slug($sub_submenu) }}">{{ $sub_submenu }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                <li class="drop-down">
                    <a class="text-uppercase" href="#">Menu Utama</a>
                    <ul>
                        <li class="@if (Request::segment(1) == 'layanan-surat') active @endif">
                            <a class="" href="{{ route('layanan-surat') }}">Layanan Surat</a>
                        </li>
                        <li class="@if (Request::segment(1) == 'gallery') active @endif">
                            <a class="" href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li class="@if (Request::segment(1) == 'statistik-penduduk') active @endif">
                            <a class="" href="{{ route('statistik-penduduk') }}">Statistik Penduduk</a>
                        </li>
                        <li class="@if (Request::segment(1) == 'laporan-apbdes') active @endif">
                            <a class="" href="{{ route('laporan-apbdes') }}">Laporan APBDes</a>
                        </li>
                        <li class="@if (Request::segment(1) == 'produk-hukum') active @endif">
                            <a class="" href="{{ route('produk-hukum') }}">Produk Hukum</a>
                        </li>
                        @auth
                            <li>
                                <a href="{{ route('dashboard') }}">Dashboard Admin</a>
                            </li>
                            <hr class="m-0">
                            <li>
                                <a href="{{ route('keluar') }}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Keluar</a>
                            </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <form id="form-logout" action="{{ route('keluar') }}" method="POST" style="display: none;">
        @csrf
    </form>
</header>
