@extends('layouts.app')

@section('title', 'Edit Akses Submenu')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Akses Submenu</h2>
                                <p class="mb-0 text-sm">Kelola Akses Submenu</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("peran.edit", $peran_menu->peran_id) }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <div class="form-group">
                    <label class="form-control-label" for="nama">Nama Menu</label>
                    <input disabled type="text" class="form-control" name="nama" placeholder="Masukkan Nama Menu ..." value="{{ $peran_menu->menu->nama }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 mb-3">
        <div class="card shadow">
            <div class="card-header font-weight-bold">Akses Submenu</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <th width="20px">No</th>
                            <th>Nama Submenu</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                            @forelse ($peran_menu->menu->submenu as $item)
                                <tr>
                                    <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle">{{ $item->nama }}</td>
                                    <td>
                                        @php
                                            $peran_menu_submenu = App\PeranMenuSubmenu::where('peran_menu_id', $peran_menu->id)->where('submenu_id',$item->id)->first();
                                        @endphp
                                        @if ($peran_menu_submenu)
                                            <a href="#nonaktifkan" class="btn btn-dark btn-sm akses"><i class="fas fa-lock"></i> Nonaktifkan</a>
                                            <form action="{{ route('peran-menu-submenu.destroy', $peran_menu_submenu) }}" method="post">@csrf @method('delete')</form>
                                        @else
                                            <a href="#aktifkan" class="btn btn-success btn-sm akses"><i class="fas fa-unlock"></i> Aktifkan</a>
                                            <form action="{{ route('peran-menu-submenu.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="peran_menu_id" value="{{ $peran_menu->id }}">
                                                <input type="hidden" name="submenu_id" value="{{ $item->id }}">
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
