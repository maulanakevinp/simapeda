@extends('layouts.app')

@section('title', 'Pengaturan Surat')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <h2 class="mb-0">Pengaturan Surat</h2>
                        <p class="mb-0 text-sm">Kelola Pengaturan Surat</p>
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
        <form autocomplete="off" action="{{ route('pengaturan-surat.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-control-label" for="penomoran_surat">Penomoran Surat</label>
                <select class="form-control @error('penomoran_surat') is-invalid @enderror" name="penomoran_surat" id="penomoran_surat">
                    <option value="">Pilih Penomoran Surat</option>
                    <option value="1" {{ old('penomoran_surat',$desa->penomoran_surat) == 1 ? 'selected' : ''}}>Nomor berurutan untuk masing-masing surat masuk dan surat keluar; dan untuk semua surat layanan</option>
                    <option value="2" {{ old('penomoran_surat',$desa->penomoran_surat) == 2 ? 'selected' : ''}}>Nomor berurutan untuk seluruh surat masuk, surat keluar dan surat layanan</option>
                </select>
                @error('penomoran_surat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div id="masing">
                <div class="form-group">
                    <label class="form-control-label" for="nomor_layanan_surat">Nomor Layanan Surat</label>
                    <input class="form-control @error('nomor_layanan_surat') is-invalid @enderror" type="number" name="nomor_layanan_surat" id="nomor_layanan_surat" placeholder="Masukkan Nomor Layanan Surat ..." value="{{ old('nomor_layanan_surat',$desa->nomor_layanan_surat ?? 1) }}">
                    @error('nomor_layanan_surat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="nomor_surat_masuk">Nomor Surat Masuk</label>
                    <input class="form-control @error('nomor_surat_masuk') is-invalid @enderror" type="number" name="nomor_surat_masuk" id="nomor_surat_masuk" placeholder="Masukkan Surat Masuk ..." value="{{ old('nomor_surat_masuk',$desa->nomor_surat_masuk ?? 1) }}">
                    @error('nomor_surat_masuk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="nomor_surat_keluar">Nomor Surat Keluar</label>
                    <input class="form-control @error('nomor_surat_keluar') is-invalid @enderror" type="number" name="nomor_surat_keluar" id="nomor_surat_keluar" placeholder="Masukkan Surat Keluar ..." value="{{ old('nomor_surat_keluar',$desa->nomor_surat_keluar ?? 1) }}">
                    @error('nomor_surat_keluar')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div id="seluruh">
                <div class="form-group">
                    <label class="form-control-label" for="nomor_surat">Nomor Surat</label>
                    <input class="form-control @error('nomor_surat') is-invalid @enderror" type="number" name="nomor_surat" id="nomor_surat" placeholder="Masukkan Nomor Surat ..." value="{{ old('nomor_surat',$desa->nomor_surat ?? 1) }}">
                    @error('nomor_surat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        penomoran();
        $("#penomoran_surat").change(function () {
            penomoran();
        });
    });

    function penomoran() {
        if ($("#penomoran_surat").val() == 1) {
            $("#masing").css('display','');
            $("#seluruh").css('display','none');
        } else if ($("#penomoran_surat").val() == 2) {
            $("#masing").css('display','none');
            $("#seluruh").css('display','');
        } else {
            $("#masing").css('display','none');
            $("#seluruh").css('display','none');
        }
    }
</script>
@endpush
