@extends('layouts.app')

@section('title', 'Database')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Database</h2>
                                <p class="mb-0 text-sm">Kelola Database</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("folder.backup") }}" class="btn btn-primary" title="download folder backup (zip)"><i class="fas fa-download"></i> Backup Folder</a>
                                <a href="{{ route("database.backup") }}" class="btn btn-success" title="download file backup (sql)"><i class="fas fa-download"></i> Backup Database</a>
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
    <div class="col-md-6 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('folder.restore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="form-control-label col-form-label col-md-3" for="zip">Folder Backup (zip)</label>
                        <div class="col-md-9">
                            <input type="file" accept=".zip" class="form-control @error('zip') is-invalid @enderror" name="zip" placeholder="Masukkan File zip ...">
                            @error('zip')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <p class="text-sm mb-3 text-danger">*Pastikan file yang dimasukkan adalah hasil backupan dari backup folder</p>
                    <button type="submit" class="btn btn-primary btn-block" id="simpan">Restore Folder Backup</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('database.restore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="form-control-label col-form-label col-md-3" for="sql">File (sql)</label>
                        <div class="col-md-9">
                            <input type="file" accept=".sql" class="form-control @error('sql') is-invalid @enderror" name="sql" placeholder="Masukkan File sql ...">
                            @error('sql')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <p class="text-sm mb-3 text-danger">*Pastikan file yang dimasukkan adalah hasil backupan dari backup database</p>
                    <button type="submit" class="btn btn-success btn-block" id="simpan">Restore Database</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
