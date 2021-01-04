@extends('layouts.app')

@section('title', 'Edit Tanah')

@section('styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
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
                                <h2 class="mb-0">Edit Tanah</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("tanah.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="card bg-secondary shadow h-100">
    <div class="card-body">
        <form autocomplete="off" action="{{ route('tanah.update', $tanah) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="barang">Nama Barang</label>
                <div class="col-md-9">
                    @php
                        $reg = App\InventarisTanah::count() + 1;
                        $jumlah_kata = strlen($reg);
                        $hasil = sprintf("%06s",$reg);
                    @endphp
                    <select class="form-control" name="barang" id="barang">
                        <option value="{{ $tanah->nama_barang }}">{{ $tanah->nama_barang }}</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->nama }}_{{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }}.{{ $hasil }}">Kode: {{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="nama_barang" id="nama_barang" value="{{ $tanah->nama_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_barang">Kode Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang ..." value="{{ $tanah->kode_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_register">Nomor Register</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_register" id="nomor_register" placeholder="Masukkan Nomor Register ..." value="{{ $tanah->nomor_register }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="luas_tanah">Luas Tanah (M<sup>2</sup>)</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="luas_tanah" id="luas_tanah" placeholder="Masukkan Luas Tanah ..." value="{{ $tanah->luas_tanah }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tahun_pengadaan">Tahun Pengadaan</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="tahun_pengadaan" id="tahun_pengadaan" placeholder="Masukkan Tahun Pengadaan ..." value="{{ $tanah->tahun_pengadaan }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="letak_atau_alamat">Letak/Alamat</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="letak_atau_alamat" id="letak_atau_alamat" placeholder="Masukkan Letak/Alamat ...">{{ $tanah->letak_atau_alamat }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="hak_tanah">Hak Tanah</label>
                <div class="col-md-9">
                    <select class="form-control" name="hak_tanah" id="hak_tanah">
                        <option value="">Pilih Hak Tanah</option>
                        <option value="Hak Pakai" {{ $tanah->hak_tanah == 'Hak Pakai' ? 'selected' : '' }}>Hak Pakai</option>
                        <option value="Hak Pengelola" {{ $tanah->hak_tanah == 'Hak Pengelola' ? 'selected' : '' }}>Hak Pengelola</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="penggunaan_barang">Penggunaan Barang</label>
                <div class="col-md-9">
                    <select class="form-control" name="penggunaan_barang" id="penggunaan_barang">
                        <option value="01" {{ $tanah->penggunaan_barang == '01' ? 'selected' : '' }}>Pemerintah Desa</option>
                        <option value="02" {{ $tanah->penggunaan_barang == '02' ? 'selected' : '' }}>Badan Permusyawaratan Daerah</option>
                        <option value="03" {{ $tanah->penggunaan_barang == '03' ? 'selected' : '' }}>PKK</option>
                        <option value="04" {{ $tanah->penggunaan_barang == '04' ? 'selected' : '' }}>LKMD</option>
                        <option value="05" {{ $tanah->penggunaan_barang == '05' ? 'selected' : '' }}>Karang Taruna</option>
                        <option value="06" {{ $tanah->penggunaan_barang == '06' ? 'selected' : '' }}>RW</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tanggal_sertifikat">Tanggal Sertifikat</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tanggal_sertifikat" id="tanggal_sertifikat" type="date" placeholder="Tanggal Sertifikat" value="{{ $tanah->tanggal_sertifikat }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_sertifikat">Nomor Sertifikat </label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_sertifikat" id="nomor_sertifikat" type="text" placeholder="Nomor Sertifikat" value="{{ $tanah->nomor_sertifikat }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="penggunaan">Penggunaan </label>
                <div class="col-sm-9">
                    <select name="penggunaan" id="penggunaan" class="form-control" placeholder="Penggunaan">
                        <option value="">Pilih Kegunaan Lahan</option>
                        <option value="Industri" {{ $tanah->penggunaan == 'Industri' ? 'selected' : '' }}>Industri</option>
                        <option value="Jalan" {{ $tanah->penggunaan == 'Jalan' ? 'selected' : '' }}>Jalan</option>
                        <option value="Komersial" {{ $tanah->penggunaan == 'Komersial' ? 'selected' : '' }}>Komersial</option>
                        <option value="Permukiman" {{ $tanah->penggunaan == 'Permukiman' ? 'selected' : '' }}>Permukiman</option>
                        <option value="Tanah Publik" {{ $tanah->penggunaan == 'Tanah Publik' ? 'selected' : '' }}>Tanah Publik</option>
                        <option value="Tanah Kosong" {{ $tanah->penggunaan == 'Tanah Kosong' ? 'selected' : '' }}>Tanah Kosong</option>
                        <option value="Perkebunan" {{ $tanah->penggunaan == 'Perkebunan' ? 'selected' : '' }}>Perkebunan</option>
                        <option value="Pertanian" {{ $tanah->penggunaan == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="asal_usul">Asal Usul </label>
                <div class="col-sm-9">
                    <select name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul">
                        <option value="">Pilih Asal Usul Lahan</option>
                        <option value="Bantuan Kabupaten" {{ $tanah->asal_usul == 'Bantuan Kabupaten' ? 'selected' : '' }}>Bantuan Kabupaten</option>
                        <option value="Bantuan Pemerintah" {{ $tanah->asal_usul == 'Bantuan Pemerintah' ? 'selected' : '' }}>Bantuan Pemerintah</option>
                        <option value="Bantuan Provinsi" {{ $tanah->asal_usul == 'Bantuan Provinsi' ? 'selected' : '' }}>Bantuan Provinsi</option>
                        <option value="Pembelian Sendiri" {{ $tanah->asal_usul == 'Pembelian Sendiri' ? 'selected' : '' }}>Pembelian Sendiri</option>
                        <option value="Sumbangan" {{ $tanah->asal_usul == 'Sumbangan' ? 'selected' : '' }}>Sumbangan</option>
                        <option value="Hak Adat" {{ $tanah->asal_usul == 'Hak Adat' ? 'selected' : '' }}>Hak Adat</option>
                        <option value="Hibah" {{ $tanah->asal_usul == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="harga">Harga</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control input-sm number col-form-label" id="harga" name="harga" placeholder="Harga" value="{{ $tanah->harga }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">{{ $tanah->keterangan }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#barang').select2({
            placeholder: "Pilih Barang",
            allowClear: true
        });

            $('#kode_barang').val("{{ $desa->kode_provinsi .'.'. $desa->kode_kabupaten .'.'. $desa->kode_kecamatan .'.'. $desa->kode_desa }}."+$('#penggunaan_barang').val()+"."+$('#tahun_pengadaan').val());

        $("#tahun_pengadaan").change(function(){
            $('#kode_barang').val("{{ $desa->kode_provinsi .'.'. $desa->kode_kabupaten .'.'. $desa->kode_kecamatan .'.'. $desa->kode_desa }}."+$('#penggunaan_barang').val()+"."+$('#tahun_pengadaan').val());
        });

        $("#penggunaan_barang").change(function(){
            $('#kode_barang').val("{{ $desa->kode_provinsi .'.'. $desa->kode_kabupaten .'.'. $desa->kode_kecamatan .'.'. $desa->kode_desa }}."+$('#penggunaan_barang').val()+"."+$('#tahun_pengadaan').val());
        });

        $("#barang").change(function(){
            $('#nomor_register').val($('#barang').val().split("_").pop());
            $('#nama_barang').val($('#barang').val().slice(0,-22));
        });
    });
</script>
@endpush
