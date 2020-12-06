<div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item {{ request()->segment(2) == 'tanah' ? 'active' : '' }}" href="{{ route('tanah.index') }}">Tanah</a>
    <a class="dropdown-item {{ request()->segment(2) == 'peralatan' ? 'active' : '' }}" href="{{ route('peralatan.index') }}">Peralatan Dan Mesin</a>
    <a class="dropdown-item {{ request()->segment(2) == 'gedung' ? 'active' : '' }}" href="{{ route('gedung.index') }}">Gedung Dan Bangunan</a>
    <a class="dropdown-item {{ request()->segment(2) == 'jalan' ? 'active' : '' }}" href="{{ route('jalan.index') }}">Jalan, Irigasi, dan Jaringan</a>
</div>
