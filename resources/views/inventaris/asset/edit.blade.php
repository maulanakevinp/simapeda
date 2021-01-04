@extends('layouts.app')

@section('title', 'Edit Asset Tetap Lainnya')

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
                                <h2 class="mb-0">Edit Asset Tetap Lainnya</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("asset.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('asset.update', $asset) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="barang">Nama Barang</label>
                <div class="col-md-9">
                    @php
                        $reg = App\InventarisAsset::count() + 1;
                        $jumlah_kata = strlen($reg);
                        $hasil = sprintf("%06s",$reg);
                    @endphp
                    <select class="form-control" name="barang" id="barang">
                        <option value="{{ $asset->nama_barang }}">{{ $asset->nama_barang }}</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->nama }}_{{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }}.{{ $hasil }}">Kode: {{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="nama_barang" id="nama_barang" value="{{ $asset->nama_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_barang">Kode Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang ..." value="{{ $asset->kode_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_register">Nomor Register</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_register" id="nomor_register" placeholder="Masukkan Nomor Register ..." value="{{ $asset->nomor_register }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="jenis_asset">Jenis Asset</label>
                <div class="col-sm-9">
                    <select name="jenis_asset" id="jenis_asset" class="form-control">
                        <option value="">Pilih Jenis Asset</option>
                        <option value="Buku" {{ $asset->jenis_asset == 'Buku' ? 'selected' : '' }}>Buku</option>
                        <option value="Barang Kesenian" {{ $asset->jenis_asset == 'Barang Kesenian' ? 'selected' : '' }}>Barang Kesenian</option>
                        <option value="Hewan Ternak" {{ $asset->jenis_asset == 'Hewan Ternak' ? 'selected' : '' }}>Hewan Ternak</option>
                        <option value="Tumbuhan" {{ $asset->jenis_asset == 'Tumbuhan' ? 'selected' : '' }}>Tumbuhan</option>
                    </select>
                </div>
            </div>
            <div id="buku" style="display: none;">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="judul_dan_pencipta_buku">Judul Dan Pencipta Buku</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="judul_dan_pencipta_buku" name="judul_dan_pencipta_buku" type="text" placeholder="Masukkan Judul Dan Pencipta Buku ..." value="{{ $asset->judul_dan_pencipta_buku }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="spesifikasi_buku">Spesifikasi Buku</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="spesifikasi_buku" name="spesifikasi_buku" type="text" placeholder="Masukkan Spesifikasi Buku ..." value="{{ $asset->spesifikasi_buku }}"/>
                    </div>
                </div>
            </div>
            <div id="kesenian" style="display: none;">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="asal_daerah_kesenian">Asal Daerah Kesenian</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="asal_daerah_kesenian" name="asal_daerah_kesenian" type="text" placeholder="Masukkan Asal Daerah Kesenian ..." value="{{ $asset->asal_daerah_kesenian }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="pencipta_kesenian">Pencipta Kesenian</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="pencipta_kesenian" name="pencipta_kesenian" type="text" placeholder="Masukkan Pencipta Kesenian ..." value="{{ $asset->pencipta_kesenian }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="bahan_kesenian">Bahan Kesenian</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="bahan_kesenian" name="bahan_kesenian" type="text" placeholder="Masukkan Bahan Kesenian ..." value="{{ $asset->bahan_kesenian }}"/>
                    </div>
                </div>
            </div>
            <div id="hewan" style="display: none;">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="jenis_hewan_ternak">Jenis Hewan Ternak</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="jenis_hewan_ternak" name="jenis_hewan_ternak" type="text" placeholder="Masukkan Jenis Hewan Ternak ..." value="{{ $asset->jenis_hewan_ternak }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="ukuran_hewan_ternak">Ukuran Hewan Ternak (m)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="ukuran_hewan_ternak" name="ukuran_hewan_ternak" type="number" placeholder="Masukkan Ukuran Hewan Ternak (m) ..." value="{{ $asset->ukuran_hewan_ternak }}"/>
                    </div>
                </div>
            </div>
            <div id="tumbuhan" style="display: none;">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="jenis_tumbuhan">Jenis Tumbuhan</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="jenis_tumbuhan" name="jenis_tumbuhan" type="text" placeholder="Masukkan Jenis Tumbuhan ..." value="{{ $asset->jenis_tumbuhan }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label col-form-label" for="ukuran_tumbuhan">Ukuran Tumbuhan (cm)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="ukuran_tumbuhan" name="ukuran_tumbuhan" type="number" placeholder="Masukkan Ukuran Tumbuhan (cm) ..." value="{{ $asset->ukuran_tumbuhan }}"/>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="jumlah">Jumlah</label>
                <div class="col-sm-9">
                    <input class="form-control" id="jumlah" name="jumlah" type="number" placeholder="Masukkan Jumlah ..." value="{{ $asset->jumlah }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tahun_pengadaan">Tahun Pengadaan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tahun_pengadaan" id="tahun_pengadaan" type="number" placeholder="Masukkan Tahun Pengadaan ..." value="{{ $asset->tahun_pengadaan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="penggunaan_barang">Penggunaan Barang</label>
                <div class="col-md-9">
                    <select class="form-control" name="penggunaan_barang" id="penggunaan_barang">
                        <option value="01" {{ $asset->penggunaan_barang == '01' ? 'selected' : '' }}>Pemerintah Desa</option>
                        <option value="02" {{ $asset->penggunaan_barang == '02' ? 'selected' : '' }}>Badan Permusyawaratan Daerah</option>
                        <option value="03" {{ $asset->penggunaan_barang == '03' ? 'selected' : '' }}>PKK</option>
                        <option value="04" {{ $asset->penggunaan_barang == '04' ? 'selected' : '' }}>LKMD</option>
                        <option value="05" {{ $asset->penggunaan_barang == '05' ? 'selected' : '' }}>Karang Taruna</option>
                        <option value="06" {{ $asset->penggunaan_barang == '06' ? 'selected' : '' }}>RW</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="asal_usul">Asal Usul </label>
                <div class="col-sm-9">
                    <select name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul">
                        <option value="">Pilih Asal Usul Lahan</option>
                        <option value="Bantuan Kabupaten" {{ $asset->asal_usul == 'Bantuan Kabupaten' ? 'selected' : '' }}>Bantuan Kabupaten</option>
                        <option value="Bantuan Pemerintah" {{ $asset->asal_usul == 'Bantuan Pemerintah' ? 'selected' : '' }}>Bantuan Pemerintah</option>
                        <option value="Bantuan Provinsi" {{ $asset->asal_usul == 'Bantuan Provinsi' ? 'selected' : '' }}>Bantuan Provinsi</option>
                        <option value="Pembelian Sendiri" {{ $asset->asal_usul == 'Pembelian Sendiri' ? 'selected' : '' }}>Pembelian Sendiri</option>
                        <option value="Sumbangan" {{ $asset->asal_usul == 'Sumbangan' ? 'selected' : '' }}>Sumbangan</option>
                        <option value="Hak Adat" {{ $asset->asal_usul == 'Hak Adat' ? 'selected' : '' }}>Hak Adat</option>
                        <option value="Hibah" {{ $asset->asal_usul == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="harga">Harga (Rp)</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control input-sm number col-form-label" id="harga" name="harga" placeholder="Harga" value="{{ $asset->harga }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">{{ $asset->keterangan }}</textarea>
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

        asset();

        $("#jenis_asset").change(function () {
            asset();
        });

    });

    function asset(){
        switch ($("#jenis_asset").val()) {
            case "Buku":
                $("#buku").show();
                $("#kesenian").hide();
                $("#hewan").hide();
                $("#tumbuhan").hide();
                break;

            case "Barang Kesenian":
                $("#buku").hide();
                $("#kesenian").show();
                $("#hewan").hide();
                $("#tumbuhan").hide();
                break;

            case "Hewan Ternak":
                $("#buku").hide();
                $("#kesenian").hide();
                $("#hewan").show();
                $("#tumbuhan").hide();
                break;

            case "Tumbuhan":
                $("#buku").hide();
                $("#kesenian").hide();
                $("#hewan").hide();
                $("#tumbuhan").show();
                break;

            default:
                $("#buku").hide();
                $("#kesenian").hide();
                $("#hewan").hide();
                $("#tumbuhan").hide();
                break;
        }
    }
</script>
@endpush
