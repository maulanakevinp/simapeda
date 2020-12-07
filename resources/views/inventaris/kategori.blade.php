<div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item {{ request()->segment(2) == 'tanah' ? 'active' : '' }}" href="{{ route('tanah.index') }}">Tanah</a>
    <a class="dropdown-item {{ request()->segment(2) == 'peralatan' ? 'active' : '' }}" href="{{ route('peralatan.index') }}">Peralatan Dan Mesin</a>
    <a class="dropdown-item {{ request()->segment(2) == 'gedung' ? 'active' : '' }}" href="{{ route('gedung.index') }}">Gedung Dan Bangunan</a>
    <a class="dropdown-item {{ request()->segment(2) == 'jalan' ? 'active' : '' }}" href="{{ route('jalan.index') }}">Jalan, Irigasi, dan Jaringan</a>
    <a class="dropdown-item {{ request()->segment(2) == 'asset' ? 'active' : '' }}" href="{{ route('asset.index') }}">Asset Tetap Lainnya</a>
    <a class="dropdown-item {{ request()->segment(2) == 'kontruksi' ? 'active' : '' }}" href="{{ route('kontruksi.index') }}">Kontruksi Dalam Pengerjaan</a>
    <a class="dropdown-item {{ request()->segment(2) == 'laporan' ? 'active' : '' }}" href="{{ route('laporan.index') }}">Laporan Semua Asset</a>
</div>
