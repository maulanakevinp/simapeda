@extends('layouts.app')

@section('title', 'Edit Peserta Bantuan')

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
                                <h2 class="mb-0">Edit Peserta Bantuan</h2>
                                <p class="mb-0 text-sm">Kelola Bantuan</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("bantuan-penduduk.index", $bantuan->id) }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
@include('bantuan-penduduk.detail')
<div class="card bg-secondary shadow h-100">
    <div class="card-body">
        <form autocomplete="off" action="{{ route('bantuan-penduduk.update', $bantuan_penduduk) }}" method="post" enctype="multipart/form-data">
            @csrf @method('patch')
            <input type="hidden" name="bantuan_id" value="{{ $bantuan->id }}">
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="penduduk_id">Cari NIK / Nama Penduduk</label>
                <div class="col-md-9">
                    <select class="form-control @error('penduduk_id') is-invalid @enderror" name="penduduk_id" id="penduduk_id" id="penduduk_id">
                        <option value="">Pilih Sasaran Program</option>
                        @foreach ($bantuan->sasaran_program == 1 ? App\Penduduk::all() : App\Penduduk::whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->get() as $item)
                            <option value="{{ $item->id }}" {{ old('penduduk_id', $bantuan_penduduk->penduduk_id) == $item->id ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('penduduk_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header text-white bg-info font-weight-bold"><i class="fas fa-user"></i> Konfirmasi Peserta</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">NIK</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="nik_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Nama</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="nama_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Alamat</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="alamat_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Tempat, Tanggal Lahir</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="tempat_tanggal_lahir_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Jenis Kelamin</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="jenis_kelamin_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Umur</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="umur_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Pendidikan</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="pendidikan_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Warga Negara / Agama</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="warga_negara_agama_penduduk"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" width="150px">Bantuan Yang Sedang Diterima</td>
                                        <td style="padding:0.5rem;" width="1px">:</td>
                                        <td style="padding:0.5rem; white-space: normal !important; word-wrap: break-word;" id="bantuan_yang_sedang_diterima_penduduk"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header text-white bg-success font-weight-bold"><i class="fas fa-id-card-alt"></i> Identitas Kartu Peserta</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="form-control-label col-form-label col-md-4" for="nomor_kartu_peserta">Nomor Kartu Peserta</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('nomor_kartu_peserta') is-invalid @enderror" name="nomor_kartu_peserta" id="nomor_kartu_peserta" placeholder="Masukkan Nomor Kartu Peserta ..." value="{{ old('nomor_kartu_peserta', $bantuan_penduduk->nomor_kartu_peserta) }}">
                                    @error('nomor_kartu_peserta')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-form-label col-md-4" for="gambar_kartu_peserta">Gambar Kartu Peserta</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control @error('gambar_kartu_peserta') is-invalid @enderror" name="gambar_kartu_peserta" id="gambar_kartu_peserta" placeholder="Masukkan Gambar Kartu Peserta ..." value="{{ old('gambar_kartu_peserta', $bantuan_penduduk->gambar_kartu_peserta) }}">
                                    @error('gambar_kartu_peserta')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-form-label col-md-4" for="nik">NIK</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="Masukkan NIK ..." value="{{ old('nik', $bantuan_penduduk->nik) }}">
                                    @error('nik')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-form-label col-md-4" for="nama">Nama</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukkan Nama ..." value="{{ old('nama', $bantuan_penduduk->nama) }}">
                                    @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-form-label col-md-4" for="tempat_lahir">Tempat Lahir</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir ..." value="{{ old('tempat_lahir', $bantuan_penduduk->tempat_lahir) }}">
                                    @error('tempat_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-form-label col-md-4" for="tanggal_lahir">Tanggal Lahir</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir ..." value="{{ old('tanggal_lahir', $bantuan_penduduk->tanggal_lahir) }}">
                                    @error('tanggal_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-form-label col-md-4" for="alamat">Alamat</label>
                                <div class="col-md-8">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Masukkan Alamat ...">{{ old('alamat', $bantuan_penduduk->alamat) }}</textarea>
                                    @error('alamat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                        </div>
                    </div>
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
        $.get(baseURL + '/bantuan/penduduk/cari-penduduk/' + $("#penduduk_id").val(), function (response) {
            $.each(response, function(i,e){
                $(`td[id*='${i}']`).html(e);
                $(`input[id*='${i}']`).val(e);
                $(`textarea[id*='${i}']`).html(e);
            });
        });
    }
</script>
@endpush
