<div class="card-header text-center" style="border: none; padding-bottom: 0px">
    <a href="{{ route('sk-kades.index') }}" class="btn btn-secondary {{ request()->segment(2) == "sk-kades" ? 'active' : '' }}">SK Kades</a>
    <a href="{{ route('perdes.index') }}" class="btn btn-secondary {{ request()->segment(2) == "perdes" ? 'active' : '' }}">Perdes</a>
    <a href="{{ route('perkades.index') }}" class="btn btn-secondary {{ request()->segment(2) == "perkades" ? 'active' : '' }}">Perkades</a>
</div>
