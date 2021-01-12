@extends('layouts.app')

@section('title', 'Jalan, Irigasi, dan Jaringan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Jalan, Irigasi, dan Jaringan</h2>
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
                                        <a class="dropdown-item active" href="{{ route('jalan.index') }}">Daftar Inventaris</a>
                                        <a class="dropdown-item" href="{{ route('jalan.mutasi') }}">Mutasi Inventaris</a>
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
                <a href="{{ route('jalan.create') }}?page={{ request('page') }}" class="btn btn-sm btn-primary" title="Tambah" data-toggle="tooltip"><i class="fas fa-plus"></i></a>
                @if (count($jalan) > 0)
                    <a href="#print" id="btn-print" data-toggle="tooltip" class="btn btn-sm btn-secondary" title="Cetak"><i class="fas fa-print"></i></a>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="vertical-align: middle" rowspan="2" class="text-center" width="10px">
                            <input type="checkbox" name="check_all" id="check_all">
                        </th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center" width="10px">No</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center" width="50px">Opsi</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Nama Barang</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Kode Barang</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Kondisi</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Jenis Kontruksi</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Luas</th>
                        <th style="vertical-align: middle" rowspan="1" colspan="2" class="text-center">Dokumen Kepemilikan</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Status Tanah</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Asal Usul</th>
                        <th style="vertical-align: middle" rowspan="2" class="text-center">Harga</th>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle" rowspan="1" class="text-center">Tanggal</th>
                        <th style="vertical-align: middle" rowspan="1" class="text-center">Nomor</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jalan as $item)
                        <tr>
                            <td style="vertical-align: middle">
                                <input type="checkbox" class="jalan-checkbox" id="delete{{ $item->id }}" name="delete[]" value="{{ $item->id }}">
                            </td>
                            <td style="vertical-align: middle" class="text-center">{{ ($jalan->currentpage()-1) * $jalan->perpage() + $loop->index + 1 }}</td>
                            <td style="vertical-align: middle">
                                <a href="{{ route('jalan.mutasi.edit',$item) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Mutasi"><i class="fas fa-external-link-alt"></i></a>
                                <a href="{{ route('jalan.show',$item) }}?page={{ request('page') }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('jalan.edit',$item) }}?page={{ request('page') }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->nama_barang }}" data-action="{{ route("jalan.destroy", $item) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                            </td>
                            <td style="vertical-align: middle">{{ $item->nama_barang }}</td>
                            <td style="vertical-align: middle">{{ $item->kode_barang }}</td>
                            <td style="vertical-align: middle">{{ $item->kondisi_bangunan }}</td>
                            <td style="vertical-align: middle">{{ $item->kontruksi }}</td>
                            <td style="vertical-align: middle">{{ $item->luas }}</td>
                            <td style="vertical-align: middle">{{ tgl($item->tanggal_dokumen_kepemilikan) }}</td>
                            <td style="vertical-align: middle">{{ $item->nomor_kode_tanah }}</td>
                            <td style="vertical-align: middle">{{ $item->status_tanah }}</td>
                            <td style="vertical-align: middle">{{ $item->asal_usul }}</td>
                            <td style="vertical-align: middle; text-align: right">Rp. {{ substr(number_format($item->harga, 2, ',', '.'),0,-3) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="12" class="text-right">Total</th>
                        <th class="text-right">Rp. {{ substr(number_format($total, 2, ',', '.'),0,-3) }}</th>
                    </tr>
                </tfoot>
            </table>
            {{ $jalan->links('layouts.components.pagination') }}
        </div>
    </div>
</div>

@include('layouts.components.hapus', ['nama_hapus' => 'jalan, irigasi dan jaringan'])

<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="print" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Print</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <form action="{{ route("jalan.print") }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="tahun">Tahun</label> <img style="display: none" id="loading" height="20px" src="{{ asset('storage/loading.gif') }}" alt="Loading">
                        <select class="form-control @error('tahun') is-invalid @enderror" name="tahun" id="tahun">
                            <option selected value="">Semua Tahun</option>
                            @foreach ($tahun as $key => $item)
                                <option value="{{ $key }}" {{ old('tahun') == $key ? 'selected="true"' : ''  }}>{{ $key }}</option>
                            @endforeach
                        </select>
                        @error('tahun')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="ditandatangani">Ditandatangani</label> <img style="display: none" id="loading" height="20px" src="{{ asset('storage/loading.gif') }}" alt="Loading">
                        <select required class="form-control @error('ditandatangani') is-invalid @enderror" name="ditandatangani" id="ditandatangani">
                            <option selected value="">Pilih Aparat Pemerintahan Desa</option>
                            @foreach ($pemerintahan_desa as $item)
                                <option value="{{ $item->id }}" {{ old('ditandatangani') == $item->id ? 'selected="true"' : ''  }}>{{ $item->nama }} ({{ $item->jabatan }})</option>
                            @endforeach
                        </select>
                        @error('ditandatangani')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Print</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("#btn-print").click(function (e) {
            e.preventDefault();
            $("#print").modal('show');
        });
        $(document).on('click', '#delete', function(){
            let id = [];
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                $(".jalan-checkbox:checked").each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    $.ajax({
                        url     : "{{ route('jalan.destroys') }}",
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
                    alertFail('Harap pilih salah satu jalan');
                }
            }
        });

        $("#check_all").click(function(){
            if (this.checked) {
                $(".jalan-checkbox").prop('checked',true);
            } else {
                $(".jalan-checkbox").prop('checked',false);
            }
        });
    });
</script>
@endpush
