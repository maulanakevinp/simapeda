@extends('layouts.app')

@section('title', 'Tambah Surat')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
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
                                <h2 class="mb-0">Tambah Surat</h2>
                                <p class="mb-0 text-sm">Kelola Surat</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('surat.index') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Tambah Surat</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route("surat.store") }}" method="post">
                    @csrf
                    <h6 class="heading-small text-muted">Detail Surat</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Kode Surat</label>
                            <select name="kode_surat" id="kode_surat" class="form-control">
                                <option value="">Pilih Kode Surat</option>
                                @foreach (App\KodeSurat::all() as $key => $item)
                                    <option value="{{ $item->kode }}">{{ $item->kode }} - {{ $item->nama }} {{ $item->uraian != '-' ? '- '. $item->uraian : ''}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Nama Surat</label>
                            <input class="form-control" name="nama" placeholder="Masukkan Nama Surat">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Persyaratan</label>
                            <textarea class="form-control" name="persyaratan" placeholder="Masukkan persyaratan untuk membuat surat yang ditujukan untuk warga"></textarea>
                        </div>
                    </div>
                    <h6 class="heading-small text-muted mt-4">Isian</h6>
                    <div class="pl-lg-4" id="isian">
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <textarea class="form-control" name="isi[]" placeholder="Paragraf ..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select name="isian[]" class="form-control" style="display: none;">
                                                <option value="">Pilih Isian</option>
                                                @foreach ($isian as $key => $item)
                                                    <option value="{{ $item }}">{{ str_replace('_',' ',$item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select name="jenis_isi[]" class="form-control">
                                                <option value="1">Paragraf</option>
                                                <option value="2">Kalimat</option>
                                                <option value="3">Isian</option>
                                                <option value="5">Subjudul</option>
                                            </select>
                                        </div>
                                        <div class="text-right mt-3">
                                            <input type="checkbox" name="tampil[]" value="1" style="transform: scale(1.5); margin-right: 15px" data-toggle="tooltip" title="Centang untuk ditampilkan pada form buat surat">
                                            <input type="hidden" name="tampilkan[]" value="0">
                                            <a class="bantuan mb-1 mr-2" href="{{ url('img/bantuan-paragraf.png') }}" data-fancybox><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
                                            <button class="btn btn-sm btn-success mb-1 atas-isian" data-toggle="tooltip" title="Pindahkan Ke Atas" type="button"><i  class="fas fa-arrow-up"></i></button>
                                            <button class="btn btn-sm btn-success mb-1 bawah-isian" data-toggle="tooltip" title="Pindahkan Ke Bawah" type="button"><i class="fas fa-arrow-down"></i></button>
                                            <button class="btn btn-sm btn-primary mb-1 tambah-isian" data-toggle="tooltip" title="Tambah Isian" type="button"><i class="fas fa-plus"></i></button>
                                            <button class="btn btn-sm btn-danger mb-1 hapus-isian" data-toggle="tooltip" title="Hapus Isian Ini" type="button"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="heading-small text-muted">Alat</h6>
                    <div class="pl-lg-4">
                        <a class="btn btn-primary btn-sm"  href="{{ url('img/bantuan-paragraf-kalimat-isian.png') }}" data-fancybox><i class="fas fa-question-circle" data-toggle="tooltip"></i> Bantuan</a>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_surat_ini" name="tampilkan_surat_ini" value="1">
                            <input type="hidden" name="tampilkan_surat" id="tampilkan_surat" value="0">
                            <label class="custom-control-label" for="tampilkan_surat_ini">Tampilkan surat ini untuk warga yang ingin mencetak surat keterangan ini</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_perihal" name="tampilkan_perihal" value="1">
                            <input type="hidden" name="perihal" id="perihal" value="0">
                            <label class="custom-control-label" for="tampilkan_perihal">Perihal</label> <a href="{{ url('img/bantuan-perihal.png') }}" data-fancybox data-caption="Akan menampilkan surat seperti ini"><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_data_kades" name="tampilkan_data_kades" value="1">
                            <input type="hidden" name="data_kades" id="data_kades" value="0">
                            <label class="custom-control-label" for="tampilkan_data_kades">Data Kades</label> <a href="{{ url('img/bantuan-data-kades.png') }}" data-fancybox data-caption="Akan menampilkan data kepala desa"><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_tanda_tangan_bersangkutan" name="tampilkan_tanda_tangan_bersangkutan" value="1">
                            <input type="hidden" name="tanda_tangan_bersangkutan" id="tanda_tangan_bersangkutan" value="0">
                            <label class="custom-control-label" for="tampilkan_tanda_tangan_bersangkutan">Tanda tangan bersangkutan</label> <a href="{{ url('img/bantuan-tanda-tangan-bersangkutan.png') }}" data-fancybox data-caption="Akan menampilkan tanda tangan yang bersangkutan"><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/surat.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#kode_surat').select2({
            placeholder: "Pilih Kode Surat",
            allowClear: true
        });
    });
</script>
@endpush
