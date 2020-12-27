@extends('layouts.app')

@section('title', 'Edit Peran')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Peran</h2>
                                <p class="mb-0 text-sm">Kelola Peran</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("peran.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    <div class="col-md-5 mb-3">
        <div class="card bg-secondary shadow">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('peran.update', $peran) }}" method="post">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label class="form-control-label" for="nama">Nama Peran</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Peran ..." value="{{ old('nama', $peran->nama) }}">
                        @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7 mb-3">
        <div class="card shadow">
            <div class="card-header font-weight-bold">Akses Menu</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <th width="20px">No</th>
                            <th>Nama Menu</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                            @forelse (App\Menu::all() as $item)
                                <tr>
                                    <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle">{{ $item->nama }}</td>
                                    <td>
                                        @php
                                            $peran_menu = App\PeranMenu::where('peran_id', $peran->id)->where('menu_id',$item->id)->first();
                                        @endphp
                                        @if ($peran_menu)
                                            <a href="{{ route('peran-menu-submenu.index', $peran_menu) }}" class="btn btn-primary btn-sm"><i class="fas fa-list"></i> Submenu</a>
                                            <a href="#nonaktifkan" class="btn btn-dark btn-sm akses"><i class="fas fa-lock"></i> Nonaktifkan</a>
                                            <form action="{{ route('peran-menu.destroy', $peran_menu) }}" method="post">@csrf @method('delete')</form>
                                        @else
                                            <a href="#aktifkan" class="btn btn-success btn-sm akses"><i class="fas fa-unlock"></i> Aktifkan</a>
                                            <form action="{{ route('peran-menu.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="peran_id" value="{{ $peran->id }}">
                                                <input type="hidden" name="menu_id" value="{{ $item->id }}">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" align="center">Data tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(".akses").click(function (event) {
            event.preventDefault();
            $(this).siblings('form').submit();
        });
    });
</script>
@endpush
