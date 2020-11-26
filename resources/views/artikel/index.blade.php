@extends('layouts.app')

@section('title', 'Artikel')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<style>
    .animate-up:hover {
        top: -5px;
    }
</style>
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
                                <h2 class="mb-0">Artikel</h2>
                                <p class="mb-0 text-sm">Kelola Artikel</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('artikel.create') }}" class="btn btn-success" title="Tambah"><i class="fas fa-plus"></i> Tambah Artikel</a>
                            </div>
                        </div>
                        <form class="navbar-search mt-3 cari-none" action="{{ URL::current() }}" method="GET">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('form-search')
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ URL::current() }}" method="GET">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="row mt-4 justify-content-center">
    @forelse ($artikel as $item)
        @php
            $url = '/';
            if ($item->menu) {
                $url .= Str::slug($item->menu) .'/';
            }

            if ($item->submenu) {
                $url .= Str::slug($item->submenu) .'/';
            }

            if ($item->sub_submenu) {
                $url .= Str::slug($item->sub_submenu) .'/';
            }

            $url .= $item->id .'/'. Str::slug($item->judul);
        @endphp
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card animate-up shadow">
                <a href="{{ $url }}">
                    <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                </a>
                <div class="card-body text-center">
                    <a href="{{ $url }}">
                        <h3>{{ $item->judul }}</h3>
                        <p class="text-sm text-muted">{{ $item->menu ? $item->menu : '' }}{{ $item->submenu ? ', '. $item->submenu : '' }}{{ $item->sub_submenu ? ', '. $item->sub_submenu : '' }}</p>
                        <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                            <i class="fas fa-clock"> {{ $item->created_at->diffForHumans() }}</i>
                            <i class="fas fa-eye"> {{ $item->dilihat }} Kali Dibaca</i>
                        </div>
                    </a>
                    <div class="mt-3">
                        <a href="{{ route('artikel.edit', $item) }}" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->judul }}" data-action="{{ route('artikel.destroy',$item) }}" data-toggle="modal" href="#modal-hapus" title="Hapus"><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <div class="single-service bg-white rounded shadow">
                <h4>Data belum tersedia</h4>
            </div>
        </div>
    @endforelse
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Artikel?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus artikel akan menghapus semua data yang dimilikinya</p>
                    <p><strong id="nama-hapus"></strong></p>
                </div>

            </div>

            <div class="modal-footer">
                <form id="form-hapus" action="" method="POST" >
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-white">Yakin</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
            </div>

        </div>
    </div>
</div>
@endsection
