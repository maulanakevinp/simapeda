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
                                <a href="{{ route("database.backup") }}" class="btn btn-success" title="download file backup sql"><i class="fas fa-download"></i> Backup sql</a>
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
        <form autocomplete="off" action="{{ route('database.restore') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="sql">File sql</label>
                <div class="col-md-9">
                    <input type="file" accept=".sql" class="form-control @error('sql') is-invalid @enderror" name="sql" placeholder="Masukkan File sql ...">
                    @error('sql')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">Restore Database sql</button>
        </form>
    </div>
</div>
@endsection
