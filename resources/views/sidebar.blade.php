@if (App\Gallery::where('slider', 1)->count() > 0)
    <div class="card shadow mb-3">
        <div class="card-header bg-dark text-white">
            <b>Informasi</b>
        </div>
        <div class="card-body">
            <div id="owl-one" class="owl-carousel owl-theme" style="z-index: 0">
                @foreach(App\Gallery::where('slider', 1)->latest()->get() as $key => $item)
                    <a class="text-center" href="{{ asset(Storage::url($item->gallery)) }}" data-caption="{{ $item->caption }}" data-fancybox>
                        <img class="mw-100" style="height: 300px; object-fit: cover;" src="{{ asset(Storage::url($item->gallery)) }}" alt="{{ $item->caption }}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif

<div class="card shadow mb-3">
    <div class="card-header bg-dark text-white">
        <b><a href="{{ route('layanan-surat') }}" class="text-white">Layanan Surat</a></b>
    </div>
    <div class="card-body overflow-auto" style="height: 500px">
        <div class="list-group">
            @foreach (App\Surat::select('id','nama')->whereTampilkan(1)->latest()->get() as $item)
                <a href="{{ route('buat-surat', ['id' => $item->id,'slug' => Str::slug($item->nama)]) }}" class="list-group-item list-group-item-action" style="font-size: 0.8rem">{{ $item->nama }}</a>
            @endforeach
        </div>
    </div>
</div>
@if (App\PemerintahanDesa::count() > 0)
    <div class="card shadow mb-3">
        <div class="card-header bg-dark text-white">
            <b>Pemerintahan Desa</b>
        </div>
        <div class="card-body">
            <div id="owl-two" class="owl-carousel owl-theme" style="z-index: 0">
                @foreach(App\PemerintahanDesa::select('foto','nama','jabatan')->orderBy('urutan')->get() as $key => $item)
                    <div class="text-center">
                        <a class="text-center" href="{{ $item->foto ? asset(Storage::url($item->foto)) : asset('storage/noavatar.png') }}" data-caption="{{ $item->nama }} {{ $item->jabatan ? '(' . $item->jabatan . ')' : '' }}" data-fancybox>
                            <img class="mw-100" src="{{ $item->foto ? asset(Storage::url($item->foto)) : asset('storage/noavatar.png') }}" alt="Pemerintahan Desa {{ $key }}">
                        </a>
                        <p style="font-size: 0.8rem">{{ $item->nama }}<br><b>{{ $item->jabatan ? '('. $item->jabatan . ')': '' }}</b></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@if ($desa->link_facebook || $desa->link_instagram || $desa->link_twitter || $desa->link_youtube)
<div class="card shadow mb-3">
    <div class="card-header bg-dark text-white">
        <b>Tautan <i class="fas fa-link"></i></b>
    </div>
    <div class="card-body">
        <div class="list-group">
            @if ($desa->link_facebook)
                <a class="list-group-item list-group-item-action" target="_blank" href="{{ $desa->link_facebook }}" class="btn" title="facebook" style="font-size: 0.8rem"><i class="fab fa-facebook text-primary"></i> Facebook</a>
            @endif
            @if ($desa->link_instagram)
                <a class="list-group-item list-group-item-action" target="_blank" href="{{ $desa->link_instagram }}" class="btn" title="instagram" style="font-size: 0.8rem"><i class="fab fa-instagram text-secondary"></i> Instagram</a>
            @endif
            @if ($desa->link_twitter)
                <a class="list-group-item list-group-item-action" target="_blank" href="{{ $desa->link_twitter }}" class="btn" title="twitter" style="font-size: 0.8rem"><i class="fab fa-twitter text-primary"></i> Twitter</a>
            @endif
            @if ($desa->link_youtube)
                <a class="list-group-item list-group-item-action" target="_blank" href="{{ $desa->link_youtube }}" class="btn" title="youtube" style="font-size: 0.8rem"><i class="fab fa-youtube text-danger"></i> YouTube</a>
            @endif
        </div>
    </div>
</div>
@endif
{!! $desa->link_maps !!}
