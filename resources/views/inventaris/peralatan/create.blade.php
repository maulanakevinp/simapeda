@extends('layouts.app')

@section('title', 'Tambah Peralatan')

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
                                <h2 class="mb-0">Tambah Peralatan</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("peralatan.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('peralatan.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="barang">Nama Barang</label>
                <div class="col-md-9">
                    @php
                        $reg = App\InventarisPeralatan::count() + 1;
                        $jumlah_kata = strlen($reg);
                        $hasil = sprintf("%06s",$reg);
                    @endphp
                    <select class="form-control" name="barang" id="barang">
                        @foreach ($barang as $item)
                            <option value="{{ $item->nama }}_{{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }}.{{ $hasil }}">Kode: {{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="nama_barang" id="nama_barang">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_barang">Kode Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_register">Nomor Register</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_register" id="nomor_register" placeholder="Masukkan Nomor Register ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="merk_atau_type">Merk/Type</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="merk_atau_type" id="merk_atau_type" placeholder="Masukkan Merk/Type ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="ukuran_atau_cc">Ukuruan/CC</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="ukuran_atau_cc" id="ukuran_atau_cc" placeholder="Masukkan Ukuruan/CC ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="bahan">Bahan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Masukkan Bahan ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tahun_pembelian">Tahun Pembelian</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="tahun_pembelian" id="tahun_pembelian" placeholder="Masukkan Tahun Pembelian ..." value="{{ date('Y') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_pabrik">Nomor Pabrik</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_pabrik" id="nomor_pabrik" placeholder="Masukkan Nomor Pabrik ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_rangka">Nomor Rangka</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_rangka" id="nomor_rangka" placeholder="Masukkan Nomor Rangka ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_mesin">Nomor Mesin</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_mesin" id="nomor_mesin" placeholder="Masukkan Nomor Mesin ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_polisi">Nomor Polisi</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nomor_polisi" id="nomor_polisi" placeholder="Masukkan Nomor Polisi ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="bpkb">BPKB</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="bpkb" id="bpkb" placeholder="Masukkan BPKB ...">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="penggunaan_barang">Penggunaan Barang</label>
                <div class="col-md-9">
                    <select class="form-control" name="penggunaan_barang" id="penggunaan_barang">
                        <option value="01">Pemerintah Desa</option>
                        <option value="02">Badan Permusyawaratan Daerah</option>
                        <option value="03">PKK</option>
                        <option value="04">LKMD</option>
                        <option value="05">Karang Taruna</option>
                        <option value="06">RW</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" style="text-align:left;" for="asal_usul">Asal Usul</label>
                <div class="col-sm-9">
                    <select name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul">
                        <option value="">Pilih Asal Usul Lahan</option>
                        <option value="Bantuan Kabupaten">Bantuan Kabupaten</option>
                        <option value="Bantuan Pemerintah">Bantuan Pemerintah</option>
                        <option value="Bantuan Provinsi">Bantuan Provinsi</option>
                        <option value="Pembelian Sendiri">Pembelian Sendiri</option>
                        <option value="Sumbangan">Sumbangan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" style="text-align:left;" for="harga">Harga</label>
                <div class="col-sm-9">
                        <input type="number" class="form-control input-sm number col-form-label" id="harga" name="harga" placeholder="Harga"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" style="text-align:left;" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
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

            $('#kode_barang').val("{{ substr($desa->kode_desa,0,2) . '.' . substr($desa->kode_desa,2,2) . '.' . substr($desa->kode_desa,4,2) . '.' . substr($desa->kode_desa,6,4) }}."+$('#penggunaan_barang').val()+"."+$('#tahun_pembelian').val());

        $("#tahun_pembelian").change(function(){
            $('#kode_barang').val("{{ substr($desa->kode_desa,0,2) . '.' . substr($desa->kode_desa,2,2) . '.' . substr($desa->kode_desa,4,2) . '.' . substr($desa->kode_desa,6,4) }}."+$('#penggunaan_barang').val()+"."+$('#tahun_pembelian').val());
        });

        $("#penggunaan_barang").change(function(){
            $('#kode_barang').val("{{ substr($desa->kode_desa,0,2) . '.' . substr($desa->kode_desa,2,2) . '.' . substr($desa->kode_desa,4,2) . '.' . substr($desa->kode_desa,6,4) }}."+$('#penggunaan_barang').val()+"."+$('#tahun_pembelian').val());
        });

            $('#nomor_register').val($('#barang').val().split("_").pop());
            $('#nama_barang').val($('#barang').val().slice(0,-22));

        $("#barang").change(function(){
            $('#nomor_register').val($('#barang').val().split("_").pop());
            $('#nama_barang').val($('#barang').val().slice(0,-22));
        });
    });
</script>
@endpush
