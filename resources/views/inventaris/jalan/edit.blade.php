@extends('layouts.app')

@section('title', 'Edit Jalan, Irigasi, dan Jaringan')

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
                                <h2 class="mb-0">Edit Jalan, Irigasi, dan Jaringan</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("jalan.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('jalan.update', $jalan) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="barang">Nama Barang</label>
                <div class="col-md-9">
                    @php
                        $reg = App\InventarisJalan::count() + 1;
                        $jumlah_kata = strlen($reg);
                        $hasil = sprintf("%06s",$reg);
                    @endphp
                    <select class="form-control" name="barang" id="barang">
                        <option value="{{ $jalan->nama_barang }}">{{ $jalan->nama_barang }}</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->nama }}_{{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }}.{{ $hasil }}">Kode: {{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="nama_barang" id="nama_barang" value="{{ $jalan->nama_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_barang">Kode Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang ..." value="{{ $jalan->kode_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_register">Nomor Register</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_register" id="nomor_register" placeholder="Masukkan Nomor Register ..." value="{{ $jalan->nomor_register }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="kondisi_bangunan">Kondisi Bangunan</label>
                <div class="col-sm-9">
                    <select name="kondisi_bangunan" id="kondisi_bangunan" class="form-control">
                        <option value="">Pilih Kondisi Bangunan</option>
                        <option value="Baik" {{ $jalan->kondisi_bangunan == "Baik" ? "selected" : '' }}>Baik</option>
                        <option value="Rusak Ringan" {{ $jalan->kondisi_bangunan == "Rusak Ringan" ? "selected" : '' }}>Rusak Ringan</option>
                        <option value="Rusak Sedang" {{ $jalan->kondisi_bangunan == "Rusak Sedang" ? "selected" : '' }}>Rusak Sedang</option>
                        <option value="Rusak Berat" {{ $jalan->kondisi_bangunan == "Rusak Berat" ? "selected" : '' }}>Rusak Berat</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="kontruksi">Kontruksi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="kontruksi" id="kontruksi" placeholder="Masukkan Kontruksi ...">{{ $jalan->kontruksi }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="panjang">Panjang (m)</label>
                <div class="col-sm-9">
                    <input class="form-control" id="panjang" name="panjang" type="number" placeholder="Masukkan Panjang ..." value="{{ $jalan->panjang }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="lebar">Lebar (m)</label>
                <div class="col-sm-9">
                    <input class="form-control" id="lebar" name="lebar" type="number" placeholder="Masukkan Lebar (m) ..." value="{{ $jalan->lebar }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="luas">Luas (m)</label>
                <div class="col-sm-9">
                    <input class="form-control" id="luas" name="luas" type="number" placeholder="Masukkan Luas (m) ..." value="{{ $jalan->luas }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="letak_atau_lokasi">Letak / Lokasi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="letak_atau_lokasi" id="letak_atau_lokasi" placeholder="Masukkan Letak / Lokasi ...">{{ $jalan->letak_atau_lokasi }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tahun_pengadaan">Tahun Pengadaan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tahun_pengadaan" id="tahun_pengadaan" type="number" placeholder="Masukkan Tahun Pengadaan ..." value="{{ $jalan->tahun_pengadaan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_kepemilikan">Nomor Kepemilikan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_kepemilikan" id="nomor_kepemilikan" type="text" placeholder="Masukkan Nomor Kepemilikan ..." value="{{ $jalan->nomor_kepemilikan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tanggal_dokumen_kepemilikan">Tanggal Dokumen Kepemilikan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tanggal_dokumen_kepemilikan" id="tanggal_dokumen_kepemilikan" type="date" placeholder="Masukkan Tanggal Dokumen Kepemilikan ..." value="{{ $jalan->tanggal_dokumen_kepemilikan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="status_tanah">Status Tanah</label>
                <div class="col-sm-9">
                    <select name="status_tanah" id="status_tanah" class="form-control">
                        <option value="">Pilih Status Tanah</option>
                        <option value="Tanah milik Pemda" {{ $jalan->status_tanah == 'Tanah milik Pemda' ? 'selected' : '' }}>Tanah milik Pemda</option>
                        <option value="Tanah Negara" {{ $jalan->status_tanah == 'Tanah Negara' ? 'selected' : '' }}>Tanah Negara (Tanah yang dikuasai langsung oleh Negara)</option>
                        <option value="Tanah Hak Ulayat" {{ $jalan->status_tanah == 'Tanah Hak Ulayat' ? 'selected' : '' }}>Tanah Hak Ulayat (Tanah masyarakat Hukum Adat)</option>
                        <option value="Tanah Hak" {{ $jalan->status_tanah == 'Tanah Hak' ? 'selected' : '' }}>Tanah Hak (Tanah kepunyaan perorangan atau Badan Hukum)</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_kode_tanah">Nomor Kode Tanah</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_kode_tanah" id="nomor_kode_tanah" type="text" placeholder="Masukkan Nomor Kode Tanah ..." value="{{ $jalan->nomor_kode_tanah }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="penggunaan_barang">Penggunaan Barang</label>
                <div class="col-md-9">
                    <select class="form-control" name="penggunaan_barang" id="penggunaan_barang">
                        <option value="01" {{ $jalan->penggunaan_barang == '01' ? 'selected' : '' }}>Pemerintah Desa</option>
                        <option value="02" {{ $jalan->penggunaan_barang == '02' ? 'selected' : '' }}>Badan Permusyawaratan Daerah</option>
                        <option value="03" {{ $jalan->penggunaan_barang == '03' ? 'selected' : '' }}>PKK</option>
                        <option value="04" {{ $jalan->penggunaan_barang == '04' ? 'selected' : '' }}>LKMD</option>
                        <option value="05" {{ $jalan->penggunaan_barang == '05' ? 'selected' : '' }}>Karang Taruna</option>
                        <option value="06" {{ $jalan->penggunaan_barang == '06' ? 'selected' : '' }}>RW</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="asal_usul">Asal Usul </label>
                <div class="col-sm-9">
                    <select name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul">
                        <option value="">Pilih Asal Usul Lahan</option>
                        <option value="Bantuan Kabupaten" {{ $jalan->asal_usul == 'Bantuan Kabupaten' ? 'selected' : '' }}>Bantuan Kabupaten</option>
                        <option value="Bantuan Pemerintah" {{ $jalan->asal_usul == 'Bantuan Pemerintah' ? 'selected' : '' }}>Bantuan Pemerintah</option>
                        <option value="Bantuan Provinsi" {{ $jalan->asal_usul == 'Bantuan Provinsi' ? 'selected' : '' }}>Bantuan Provinsi</option>
                        <option value="Pembelian Sendiri" {{ $jalan->asal_usul == 'Pembelian Sendiri' ? 'selected' : '' }}>Pembelian Sendiri</option>
                        <option value="Sumbangan" {{ $jalan->asal_usul == 'Sumbangan' ? 'selected' : '' }}>Sumbangan</option>
                        <option value="Hak Adat" {{ $jalan->asal_usul == 'Hak Adat' ? 'selected' : '' }}>Hak Adat</option>
                        <option value="Hibah" {{ $jalan->asal_usul == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="harga">Harga (Rp)</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control input-sm number col-form-label" id="harga" name="harga" placeholder="Harga" value="{{ $jalan->harga }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">{{ $jalan->keterangan }}</textarea>
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
