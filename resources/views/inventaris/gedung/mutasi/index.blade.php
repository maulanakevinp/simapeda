@extends('layouts.app')

@section('title', 'Gedung Dan Bangunan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Gedung Dan Bangunan</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <div class="dropdown mb-2">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        Kategori Inventaris
                                    </a>
                                    @include('inventaris.kategori')
                                </div>
                                <div class="dropdown mb-2">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        Inventaris
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('gedung.index') }}">Daftar Inventaris</a>
                                        <a class="dropdown-item active" href="{{ route('gedung.mutasi') }}">Mutasi Inventaris</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <input class="form-control" placeholder="Cari ...." type="search" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('form-search-mobile')
<form class="mt-4 mb-3 d-md-none" action="{{ URL::current() }}" method="GET">
    <div class="input-group input-group-rounded input-group-merge">
        <input type="search" name="cari" class="form-control form-control-rounded form-control-prepended" placeholder="cari" aria-label="Search" value="{{ request('cari') }}">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <span class="fa fa-search"></span>
            </div>
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="card shadow">
    <div class="card-header">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
            <div class="mb-1 font-weight-bold">
                {{ request()->segment(3) == 'mutasi' ? 'Mutasi Inventaris' : 'Daftar Inventaris' }}
            </div>
            <div class="mb-1">
                <button type="button" data-toggle="tooltip" title="Hapus data terpilih" class="btn btn-sm btn-danger" id="delete" name="delete" >
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <th class="text-center" width="10px">
                        <input type="checkbox" name="check_all" id="check_all">
                    </th>
                    <th class="text-center" width="10px">No</th>
                    <th class="text-center" width="50px">Opsi</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Kode Barang</th>
                    <th class="text-center">Tahun Pengadaan</th>
                    <th class="text-center">Tanggal Mutasi</th>
                    <th class="text-center">Jenis Mutasi</th>
                    <th class="text-center">Keterangan</th>
                </thead>
                <tbody>
                    @forelse ($gedung as $item)
                        <tr>
                            <td style="vertical-align: middle">
                                <input type="checkbox" class="gedung-checkbox" id="delete{{ $item->id }}" name="delete[]" value="{{ $item->id }}">
                            </td>
                            <td style="vertical-align: middle" class="text-center">{{ ($gedung->currentpage()-1) * $gedung->perpage() + $loop->index + 1 }}</td>
                            <td style="vertical-align: middle">
                                <a href="{{ route('gedung.mutasi.edit', $item) }}?page={{ request('page') }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->nama_barang }}" data-action="{{ route("gedung.destroy", $item) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                            </td>
                            <td style="vertical-align: middle">{{ $item->nama_barang }}</td>
                            <td style="vertical-align: middle">{{ $item->kode_barang }}</td>
                            <td style="vertical-align: middle; text-align: center">{{ $item->tahun_pengadaan }}</td>
                            <td style="vertical-align: middle">{{ tgl($item->tahun_mutasi) }}</td>
                            <td style="vertical-align: middle">{{ $item->jenis_mutasi }}</td>
                            <td style="vertical-align: middle">{{ $item->keterangan_mutasi }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $gedung->links('layouts.components.pagination') }}
        </div>
    </div>
</div>

@include('layouts.components.hapus', ['nama_hapus' => 'gedung dan bangunan'])
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '#delete', function(){
            let id = [];
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                $(".gedung-checkbox:checked").each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    $.ajax({
                        url     : "{{ route('gedung.destroys') }}",
                        method  : 'delete',
                        data    : {
                            _token  : "{{ csrf_token() }}",
                            id      : id,
                        },
                        success : function(data){
                            alertSuccess(data.message);
                            location.reload();
                        }
                    });
                } else {
                    alertFail('Harap pilih salah satu gedung');
                }
            }
        });

        $("#check_all").click(function(){
            if (this.checked) {
                $(".gedung-checkbox").prop('checked',true);
            } else {
                $(".gedung-checkbox").prop('checked',false);
            }
        });
    });
</script>
@endpush
