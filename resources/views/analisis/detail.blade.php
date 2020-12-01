<div class="card shadow h-100 mb-3">
    <div class="card-header text-center" style="border: none; padding-bottom: 0px">
        <a href="{{ route("analisis.edit", ['analisi' => $analisis->id]) }}" class="btn btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
        <div class="dropdown mb-2">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pengaturan Analisis
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item {{ request()->segment(3) == 'kategori' ? 'active' : '' }}" href="{{ route('kategori.index', $analisis) }}">Kategori/Variabel</a>
                <a class="dropdown-item {{ request()->segment(3) == 'indikator' ? 'active' : '' }}" href="{{ route('indikator.index', $analisis) }}">Indikator & Pertanyaan</a>
                <a class="dropdown-item {{ request()->segment(3) == 'klasifikasi' ? 'active' : '' }}" href="{{ route('klasifikasi.index', $analisis) }}">Klasifikasi Analisis</a>
                <a class="dropdown-item {{ request()->segment(3) == 'periode' ? 'active' : '' }}" href="{{ route('periode.index', $analisis) }}">Periode Sensus/Survei</a>
            </div>
        </div>
        <div class="dropdown mb-2">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Input
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item {{ request()->segment(3) == 'input' ? 'active' : '' }}" href="{{ route('input.index', [$analisis, 'periode' =>App\Periode::where('analisis_id', $analisis->id)->latest()->first() ?? '0']) }}">Input Data Sensus/Survei</a>
            </div>
        </div>
        <div class="dropdown mb-2">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Laporan Analisis
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item {{ request()->segment(3) == 'laporan-hasil-klasifikasi' ? 'active' : '' }}" href="{{ route('klasifikasi.laporan', [$analisis, 'periode' =>App\Periode::where('analisis_id', $analisis->id)->latest()->first() ?? '0']) }}">Laporan Hasil Klasifikasi</a>
                <a class="dropdown-item {{ request()->segment(3) == 'laporan-per-indikator' ? 'active' : '' }}" href="{{ route('indikator.laporan', $analisis) }}">Laporan Per Indikator</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <tr>
                    <td width="100px">Nama Analisis</td>
                    <td width="5px">:</td>
                    <td>{{ $analisis->nama }}</td>
                </tr>
                <tr>
                    <td width="100px">Subjek Analisis</td>
                    <td width="5px">:</td>
                    <td>{{ $analisis->subjek == 1 ? 'Penduduk' : ($analisis->subjek == 2 ? 'Keluarga / KK' : '-') }}</td>
                </tr>
                <tr>
                    <td width="100px">Status Analisis</td>
                    <td width="5px">:</td>
                    <td>{!! $analisis->status_analisis == 1 ? '<i class="fas fa-unlock"></i>' : ($analisis->status_analisis == 2 ? '<i class="fas fa-lock"></i>' : '-') !!}</td>
                </tr>
                <tr>
                    <td width="100px">Bilangan Pembagi</td>
                    <td width="5px">:</td>
                    <td>{{ $analisis->bilangan_pembagi ?? '-' }}</td>
                </tr>
                <tr>
                    <td width="100px">Deskripsi</td>
                    <td width="5px">:</td>
                    <td>{!! nl2br($analisis->deskripsi) ?? '-' !!}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
