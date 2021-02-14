@extends('layouts.layout')
@section('title', 'Desa ' . $desa->nama_desa . ' - Buat ' . $surat->nama)

@section('styles')
<meta name="description" content="Buat {{ $surat->nama }} di Website Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}">
@endsection

@section('content')
@include('layouts.components.alert')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="">Buat Surat {{ $surat->nama }}</h2>
                <p class="">{{ $surat->deskripsi }}</p>
            </div>
        </div>
    </div>
    <div class="card shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
            <form role="form" action="{{ route('cetak-surat.store', ['id' => $surat->id, 'slug' => Str::slug($surat->nama)]) }}" method="POST">
                @csrf
                <div class="form-group mb-5">
                    <label for="nomor_induk_penduduk" class="form-control-label">NIK</label>
                    <div class="input-group mb-3">
                        <input required type="text" onkeypress="return hanyaAngka(this)" id="nomor_induk_penduduk" class="form-control form-control-alternative" name="nomor_induk_penduduk" autofocus placeholder="Masukkan NIK">
                        <div class="input-group-append">
                            <button id="cari-nik" type="submit" class="input-group-text">cari</button>
                        </div>
                    </div>
                </div>
                <div id="isian" style="display: none">
                    @foreach ($surat->isiSurat as $key => $isiSurat)
                        @if ($isiSurat->jenis_isi == 3)
                            <div class="form-group mb-3">
                                <label for="{{ $isiSurat->isi . ' ' . $key }}" class="form-control-label">{{ $isiSurat->isi }}</label>
                                <input required id="{{ $isiSurat->isi . ' ' . $key }}" data-isian="{{ $isiSurat->isian }}" class="form-control form-control-alternative" name="isian[]" autofocus placeholder="Masukkan {{ $isiSurat->isi }} ...">
                            </div>
                        @endif
                        @if ($isiSurat->tampilkan == 1)
                            @php
                                $paragraf1 = str_replace('[nama_desa]', $desa->nama_desa, $isiSurat->isi);
                                $paragraf2 = str_replace('[nama_kecamatan]', $desa->nama_kecamatan, $paragraf1);
                                $paragraf = str_replace('[nama_kabupaten]', $desa->nama_kabupaten, $paragraf2);
                            @endphp
                            <p class="mt-5 mb-0">{{ $paragraf }}</p>
                        @endif
                        @php
                            $string = $isiSurat->isi;
                            preg_match_all("/\{[A-Za-z\s\(\)]+\}/", $string, $matches);
                        @endphp
                        @foreach ($matches[0] as $k => $value)
                            @php
                                $pertama = substr($value,1);
                                $hasil = substr($pertama,0,-1);
                            @endphp
                            <div class="form-group mb-3">
                                <label for="{{ $hasil . ' ' . $k }}" class="form-control-label">{{ $hasil }}</label>
                                <input required id="{{ $hasil . ' ' . $k }}" class="form-control form-control-alternative" name="isian[]" autofocus placeholder="Masukkan {{ $hasil }} ...">
                            </div>
                        @endforeach
                    @endforeach

                    @if ($surat->tanda_tangan_bersangkutan == 1)
                        <div class="form-group mb-3">
                            <label for="tanda_tangan_bersangkutan" class="form-control-label">Nama yang bersangkutan</label>
                            <input required id="tanda_tangan_bersangkutan" class="form-control form-control-alternative" name="isian[]" autofocus placeholder="Masukkan nama yang bersangkutan ...">
                        </div>
                    @endif
                </div>

                <div class="text-center" id="submit" style="display: none">
                    <button type="submit" class="btn btn-primary my-4">Cetak</button>
                </div>
                <p>{!! nl2br($surat->persyaratan) !!}</p>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("form").submit(function () {
            $(this).children('.text-center').children('button').attr('disabled','disabled');
            $(this).children('.text-center').children('button').html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt=""> Sedang diproses`);
        });

        $("#cari-nik").click(function (e){
            e.preventDefault();
            $.ajax({
                url : baseURL + '/penduduk/cari',
                type: 'GET',
                data: {
                    nik: $("#nomor_induk_penduduk").val()
                },
                before: function () {
                    $("#cari-nik").html(`<img height="20px" src="${baseURL}/storage/loading.gif" alt="">`);
                },
                success: function(response){
                    if (response.nik) {
                        $("#cari-nik").html(`cari`);
                        $("#isian").css('display','block');
                        $("#submit").css('display','block');
                        $.each(response, function(i,e){
                            $(`input[data-isian="${i}"]`).val(e);
                        });
                        $("#tanda_tangan_bersangkutan").val(response.nama);
                    }
                }
            })
        });
    });
</script>
@endpush
