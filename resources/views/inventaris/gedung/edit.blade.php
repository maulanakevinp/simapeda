@extends('layouts.app')

@section('title', 'Edit Gedung Dan Bangunan')

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
                                <h2 class="mb-0">Edit Gedung Dan Bangunan</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("gedung.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('gedung.update', $gedung) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="barang">Nama Barang</label>
                <div class="col-md-9">
                    @php
                        $reg = App\InventarisGedung::count() + 1;
                        $jumlah_kata = strlen($reg);
                        $hasil = sprintf("%06s",$reg);
                    @endphp
                    <select class="form-control" name="barang" id="barang">
                        <option value="{{ $gedung->nama_barang }}">{{ $gedung->nama_barang }}</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->nama }}_{{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }}.{{ $hasil }}">Kode: {{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="nama_barang" id="nama_barang" value="{{ $gedung->nama_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_barang">Kode Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang ..." value="{{ $gedung->kode_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_register">Nomor Register</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_register" id="nomor_register" placeholder="Masukkan Nomor Register ..." value="{{ $gedung->nomor_register }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="kondisi_bangunan">Kondisi Bangunan</label>
                <div class="col-sm-9">
                    <select name="kondisi_bangunan" id="kondisi_bangunan" class="form-control">
                        <option value="">Pilih Kondisi Bangunan</option>
                        <option value="Baik" {{ $gedung->kondisi_bangunan == "Baik" ? "selected" : '' }}>Baik</option>
                        <option value="Rusak Ringan" {{ $gedung->kondisi_bangunan == "Rusak Ringan" ? "selected" : '' }}>Rusak Ringan</option>
                        <option value="Rusak Sedang" {{ $gedung->kondisi_bangunan == "Rusak Sedang" ? "selected" : '' }}>Rusak Sedang</option>
                        <option value="Rusak Berat" {{ $gedung->kondisi_bangunan == "Rusak Berat" ? "selected" : '' }}>Rusak Berat</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="bangunan_bertingkat">Bangunan Bertingkat</label>
                <div class="col-sm-9">
                    <input class="form-control" id="bangunan_bertingkat" name="bangunan_bertingkat" type="number" placeholder="Masukkan Bangunan Bertingkat ..." value="{{ $gedung->bangunan_bertingkat }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="kontruksi_beton">Kontruksi Beton</label>
                <div class="col-sm-9">
                    <select name="kontruksi_beton" id="kontruksi_beton" class="form-control">
                        <option value="0" {{ $gedung->konstruksi_beton == '0' ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ $gedung->konstruksi_beton == '1' ? 'selected' : '' }}>Ya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="luas_bangunan">Luas Bangunan (M<sup>2</sup>)</label>
                <div class="col-sm-9">
                    <input class="form-control" name="luas_bangunan" id="luas_bangunan" type="number" placeholder="Masukkan Luas Bangunan ..." value="{{ $gedung->luas_bangunan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="letak_atau_lokasi">Letak / Lokasi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="letak_atau_lokasi" id="letak_atau_lokasi" placeholder="Masukkan Letak / Lokasi ...">{{ $gedung->letak_atau_lokasi }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tahun_pengadaan">Tahun Pengadaan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tahun_pengadaan" id="tahun_pengadaan" type="number" placeholder="Masukkan Tahun Pengadaan ..." value="{{ $gedung->tahun_pengadaan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_bangunan">Nomor Bangunan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_bangunan" id="nomor_bangunan" type="text" placeholder="Masukkan Nomor Bangunan ..." value="{{ $gedung->nomor_bangunan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tanggal_dokumen_bangunan">Tanggal Dokumen Bangunan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tanggal_dokumen_bangunan" id="tanggal_dokumen_bangunan" type="date" placeholder="Masukkan Tanggal Dokumen Bangunan ..." value="{{ $gedung->tanggal_dokumen_bangunan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="status_tanah">Status Tanah</label>
                <div class="col-sm-9">
                    <select name="status_tanah" id="status_tanah" class="form-control">
                        <option value="">Pilih Status Tanah</option>
                        <option value="Tanah milik Pemda" {{ $gedung->status_tanah == 'Tanah milik Pemda' ? 'selected' : '' }}>Tanah milik Pemda</option>
                        <option value="Tanah Negara" {{ $gedung->status_tanah == 'Tanah Negara' ? 'selected' : '' }}>Tanah Negara (Tanah yang dikuasai langsung oleh Negara)</option>
                        <option value="Tanah Hak Ulayat" {{ $gedung->status_tanah == 'Tanah Hak Ulayat' ? 'selected' : '' }}>Tanah Hak Ulayat (Tanah masyarakat Hukum Adat)</option>
                        <option value="Tanah Hak" {{ $gedung->status_tanah == 'Tanah Hak' ? 'selected' : '' }}>Tanah Hak (Tanah kepunyaan perorangan atau Badan Hukum)</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="luas_tanah">Luas Tanah (M<sup>2</sup>)</label>
                <div class="col-sm-9">
                    <input class="form-control" name="luas_tanah" id="luas_tanah" type="number" placeholder="Masukkan Luas Tanah ..." value="{{ $gedung->luas_tanah }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_kode_tanah">Nomor Kode Tanah</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_kode_tanah" id="nomor_kode_tanah" type="text" placeholder="Masukkan Nomor Kode Tanah ..." value="{{ $gedung->nomor_kode_tanah }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="penggunaan_barang">Penggunaan Barang</label>
                <div class="col-md-9">
                    <select class="form-control" name="penggunaan_barang" id="penggunaan_barang">
                        <option value="01" {{ $gedung->penggunaan_barang == '01' ? 'selected' : '' }}>Pemerintah Desa</option>
                        <option value="02" {{ $gedung->penggunaan_barang == '02' ? 'selected' : '' }}>Badan Permusyawaratan Daerah</option>
                        <option value="03" {{ $gedung->penggunaan_barang == '03' ? 'selected' : '' }}>PKK</option>
                        <option value="04" {{ $gedung->penggunaan_barang == '04' ? 'selected' : '' }}>LKMD</option>
                        <option value="05" {{ $gedung->penggunaan_barang == '05' ? 'selected' : '' }}>Karang Taruna</option>
                        <option value="06" {{ $gedung->penggunaan_barang == '06' ? 'selected' : '' }}>RW</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="asal_usul">Asal Usul </label>
                <div class="col-sm-9">
                    <select name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul">
                        <option value="">Pilih Asal Usul Lahan</option>
                        <option value="Bantuan Kabupaten" {{ $gedung->asal_usul == 'Bantuan Kabupaten' ? 'selected' : '' }}>Bantuan Kabupaten</option>
                        <option value="Bantuan Pemerintah" {{ $gedung->asal_usul == 'Bantuan Pemerintah' ? 'selected' : '' }}>Bantuan Pemerintah</option>
                        <option value="Bantuan Provinsi" {{ $gedung->asal_usul == 'Bantuan Provinsi' ? 'selected' : '' }}>Bantuan Provinsi</option>
                        <option value="Pembelian Sendiri" {{ $gedung->asal_usul == 'Pembelian Sendiri' ? 'selected' : '' }}>Pembelian Sendiri</option>
                        <option value="Sumbangan" {{ $gedung->asal_usul == 'Sumbangan' ? 'selected' : '' }}>Sumbangan</option>
                        <option value="Hak Adat" {{ $gedung->asal_usul == 'Hak Adat' ? 'selected' : '' }}>Hak Adat</option>
                        <option value="Hibah" {{ $gedung->asal_usul == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="harga">Harga (Rp)</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control input-sm number col-form-label" id="harga" name="harga" placeholder="Harga" value="{{ $gedung->harga }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">{{ $gedung->keterangan }}</textarea>
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
