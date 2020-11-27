@extends('layouts.app')

@section('title', 'Tambah Indikator')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah Indikator</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("indikator.index", $analisis) }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('indikator.store', $analisis) }}" method="post">
            @csrf
            <input type="hidden" name="jawaban[]" value="0">
            <input type="hidden" name="nilai[]" value="0">
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="nomor">Nomor Pertanyaan</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="nomor" placeholder="Masukkan Nomor Pertanyaan ..." value="">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="kategori_id">Kategori</label>
                <div class="col-md-10">
                    <select class="form-control" name="kategori_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($analisis->kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="bobot">Bobot</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="bobot" placeholder="Masukkan Bobot ..." value="">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="tipe">Tipe Pertanyaan</label>
                <div class="col-md-10">
                    <select class="form-control" name="tipe" id="tipe">
                        <option value="">Pilih Tipe Pertanyaan</option>
                        <option value="1">Pilihan</option>
                        <option value="2">Isian</option>
                        <option value="3">Angka</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="pertanyaan">Pertanyaan</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="pertanyaan" placeholder="Masukkan Pertanyaan ..."></textarea>
                    <div id="pilihan" class="mt-3" style="display: none;">
                        <div class="card shadow mb-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jawaban[]" placeholder="Jawaban ...">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="nilai[]" placeholder="nilai ...">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-success atas" title="Pindah Ke Atas"><i class="fas fa-arrow-up"></i></button>
                                            <button type="button" class="btn btn-outline-success bawah" title="Pindah Ke Bawah"><i class="fas fa-arrow-down"></i></button>
                                            <button type="button" class="btn btn-outline-primary tambah" title="Tambah"><i class="fas fa-plus"></i></button>
                                            <button type="button" class="btn btn-outline-danger hapus" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="angka" class="mt-3" style="display: none;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="form-control-label col-form-label col-md-2" for="minimal">Minimal</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" name="minimal" placeholder="Masukkan Minimal ..." value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-form-label col-md-2" for="maksimal">Maksimal</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" name="maksimal" placeholder="Masukkan Maksimal ..." value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/indikator.js') }}"></script>
@endpush
