@extends('layouts.app')

@section('title', 'Database')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <h2 class="mb-0">Database</h2>
                        <p class="mb-0 text-sm">Kelola Database</p>
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
    <div class="col-md-6 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header font-weight-bold">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                    <span class="mb-1">DATABASE</span>
                    <a href="{{ route("database.backup") }}" class="btn btn-success btn-sm" title="download file backup (sql)"><i class="fas fa-download"></i> Backup Database</a>
                </div>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('database.restore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="sql">File (sql)</label>
                        <input type="file" accept=".sql" class="form-control @error('sql') is-invalid @enderror" name="sql" placeholder="Masukkan File sql ...">
                        @error('sql')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <p class="text-sm mb-3 text-danger">*Pastikan file yang dimasukkan adalah hasil backupan dari backup database</p>
                    <button type="submit" class="btn btn-primary btn-block" id="simpan"><i class="fas fa-sync"></i> Restore Database</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header font-weight-bold">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                    <span class="mb-1">FOLDER</span>
                    <a href="{{ route("folder.backup") }}" class="btn btn-success btn-sm" title="download folder backup (zip)"><i class="fas fa-download"></i> Backup Folder</a>
                </div>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('folder.restore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="zip">Folder Backup (zip)</label>
                        <input type="file" accept=".zip" class="form-control @error('zip') is-invalid @enderror" name="zip" placeholder="Masukkan File zip ...">
                        @error('zip')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <p class="text-sm mb-3 text-danger">*Pastikan file yang dimasukkan adalah hasil backupan dari backup folder</p>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                        <button type="submit" class="btn btn-primary btn-block" id="simpan"><i class="fas fa-sync"></i> Restore Folder Backup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header font-weight-bold">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                    <span class="mb-1">DATA PENDUDUK</span>
                    <a href="{{ route('penduduk.export') }}" class="btn btn-success btn-sm"><i class="fas fa-file-export"></i> Export Excel</a>
                </div>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('penduduk.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="file_excel_penduduk">File (xlsx) <span class="text-sm text-danger font-weight-light"> *Pastikan file yang dimasukkan adalah hasil export excel data penduduk</span></label>
                        <div class="input-group mb-3">
                            <input accept=".xlsx" type="file" name="file_excel_penduduk" class="form-control @error('file_excel_penduduk') is-invalid @enderror" placeholder="Masukkan File Excel">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="simpan"><i class="fas fa-file-import"></i> Import</button>
                            </div>
                        </div>
                        @error('file_excel_penduduk')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                </form>
                <form autocomplete="off" action="{{ route('penduduk.import-prodeskel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="file_excel_penduduk_prodeskel">File (xlsx) <span class="text-sm text-danger font-weight-light"> *Pastikan file yang dimasukkan adalah hasil export excel data penduduk dari aplikasi <b class="font-weight-bold">prodeskel</b></span></label>
                        <div class="input-group mb-3">
                            <input accept=".xlsx" type="file" name="file_excel_penduduk_prodeskel" class="form-control @error('file_excel_penduduk_prodeskel') is-invalid @enderror" placeholder="Masukkan File Excel">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="simpan"><i class="fas fa-file-import"></i> Import</button>
                            </div>
                        </div>
                        @error('file_excel_penduduk_prodeskel')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                </form>
                <form autocomplete="off" action="{{ route('penduduk.import-opensid') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="file_excel_penduduk_opensid">File (xlsx) <span class="text-sm text-danger font-weight-light"> *Pastikan file yang dimasukkan adalah hasil export excel data penduduk dari aplikasi <b class="font-weight-bold">OpenSID</b></span></label>
                        <div class="input-group mb-3">
                            <input accept=".xlsx" type="file" name="file_excel_penduduk_opensid" class="form-control @error('file_excel_penduduk_opensid') is-invalid @enderror" placeholder="Masukkan File Excel">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="simpan"><i class="fas fa-file-import"></i> Import</button>
                            </div>
                        </div>
                        @error('file_excel_penduduk_opensid')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header font-weight-bold">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                    <span class="mb-1">DATA PEMERINTAHAN DESA</span>
                    <a href="{{ route('pemerintahan-desa.export') }}" class="btn btn-success btn-sm"><i class="fas fa-file-export"></i> Export Excel</a>
                </div>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('pemerintahan-desa.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="file_excel_pemerintahan_desa">File (xlsx)</label>
                        <input type="file" accept=".xlsx" class="form-control @error('file_excel_pemerintahan_desa') is-invalid @enderror" name="file_excel_pemerintahan_desa" placeholder="Masukkan File xlsx ...">
                        @error('file_excel_pemerintahan_desa')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <p class="text-sm mb-3 text-danger">*Pastikan file yang dimasukkan adalah hasil dari export excel data pemerintahan desa</p>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                        <button type="submit" class="btn btn-primary btn-block" id="simpan"><i class="fas fa-file-import"></i> Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
