@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa  .' - Layanan Surat')

@section('styles')
<meta name="description" content="Website Resmi Pemerintah Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}. Melayani pembuatan surat keterangan secara online">
<style>
    .animate-up:hover {
        top: -5px;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <h2 class=" text-muted">LAYANAN SURAT</h2>
                <p class="">Dengan menggunakan layanan surat website Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah membuat beberapa surat keterangan berikut ini secara online.</p>
                <form class="navbar-search">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Cari Surat ...." type="text" name="cari" id="cari" value="{{ request('cari') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="card" class="row justify-content-center">
        @forelse ($surat as $item)
            <div class="col-lg-4 col-md-6 surats">
                <div class="single-service bg-white rounded shadow p-3 animate-up">
                    <a href="{{ route('buat-surat', ['id' => $item->id,'slug' => Str::slug($item->nama)]) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>{{ $item->nama }}</h4>
                    </a>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="single-service bg-white rounded shadow">
                    <h4>Data belum tersedia</h4>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('[name="cari"]').on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#card .surats").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endpush
