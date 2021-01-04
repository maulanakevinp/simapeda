@extends('layouts.app')

@section('title', 'Edit Peserta Grup')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Peserta Grup</h2>
                                <p class="mb-0 text-sm">Kelola Grup</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("grup-penduduk.index", $grup) }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')
@include('grup-penduduk.detail')
<div class="card bg-secondary shadow h-100">
    <div class="card-body">
        <form autocomplete="off" action="{{ route('grup-penduduk.update', $grup_penduduk) }}" method="post" enctype="multipart/form-data">
            @csrf @method('patch')
            <input type="hidden" name="grup_id" value="{{ $grup->id }}">
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="penduduk_id">Cari NIK / Nama Penduduk</label>
                <div class="col-md-9">
                    <select class="form-control @error('penduduk_id') is-invalid @enderror" name="penduduk_id" id="penduduk_id" id="penduduk_id">
                        <option value="">Pilih Penduduk</option>
                        @foreach ($grup->sasaran == 1 ? App\Penduduk::all() : App\Penduduk::whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->get() as $item)
                            <option value="{{ $item->id }}" {{ old('penduduk_id', $grup_penduduk->penduduk_id) == $item->id ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('penduduk_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="card">
                <div class="card-header text-white bg-info font-weight-bold"><i class="fas fa-user"></i> Konfirmasi Peserta</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <tr>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="200px">NIK</td>
                                <td style="padding:0.5rem;" width="1px">:</td>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="nik"></td>
                            </tr>
                            <tr>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="200px">Nama</td>
                                <td style="padding:0.5rem;" width="1px">:</td>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="nama"></td>
                            </tr>
                            <tr>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="200px">Tempat, Tanggal Lahir</td>
                                <td style="padding:0.5rem;" width="1px">:</td>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="tempat_tanggal_lahir"></td>
                            </tr>
                            <tr>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="200px">Jenis Kelamin</td>
                                <td style="padding:0.5rem;" width="1px">:</td>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="jenis_kelamin"></td>
                            </tr>
                            <tr>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="200px">Alamat</td>
                                <td style="padding:0.5rem;" width="1px">:</td>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="alamat"></td>
                            </tr>
                            <tr>
                                <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="200px">Keterangan</td>
                                <td style="padding:0.5rem;" width="1px">:</td>
                                <td style="padding:0.5rem;">
                                    <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">{{ old('keterangan',$grup_penduduk->keterangan) }}</textarea>
                                    @error('keterangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#penduduk_id').select2({
            placeholder: "Pilih Penduduk",
            allowClear: true
        });

        cari();
        $('#penduduk_id').change(function () {
            cari();
        });
    });

    function cari(){
        $.get(baseURL + '/grup/penduduk/cari-penduduk/' + $("#penduduk_id").val(), function (response) {
            $.each(response, function(i,e){
                $(`td[id*='${i}']`).html(e);
            });
        });
    }
</script>
@endpush
