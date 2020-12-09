@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
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
                                <h2 class="mb-0">Surat Masuk</h2>
                                <p class="mb-0 text-sm">Kelola Surat Masuk</p>
                            </div>
                            <div class="mb-3">
                                <button type="button" data-toggle="tooltip" title="Hapus data terpilih" class="btn btn-danger" id="delete" name="delete" >
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('surat-masuk.create') }}" class="btn btn-success" title="Tambah" data-toggle="tooltip"><i class="fas fa-plus"></i></a>
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
        <input type="search" name="cari" class="form-control form-control-rounded form-control-prepended" placeholder="cari" aria-label="cari" value="{{ request('cari') }}">
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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-stripped table-bordered">
                <thead>
                    <th class="text-center" width="20px">#</th>
                    <th class="text-center">No. Urut</th>
                    <th class="text-center">Opsi</th>
                    <th class="text-center">Tanggal Penerimaan</th>
                    <th class="text-center">Nomor Surat</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">Pengirim</th>
                    <th class="text-center">Isi Singkat</th>
                </thead>
                <tbody>
                    @forelse ($surat_masuk as $item)
                        <tr>
                            <td style="vertical-align: middle">
                                <input type="checkbox" class="surat-masuk-checkbox" id="delete{{ $item->id }}" name="delete[]" value="{{ $item->id }}">
                            </td>
                            <td class="text-center">{{ $item->nomor_urut }}</td>
                            <td>
                                <a href="{{ route('surat-masuk.edit', $item) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                @if ($item->berkas)
                                    <a target="_blank" href="{{ url(Storage::url($item->berkas)) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                @endif
                                <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->nama }}" data-action="{{ route("surat-masuk.destroy", $item) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                            </td>
                            <td>{{ tgl(date('Y-m-d', strtotime($item->tanggal_penerimaan))) }}</td>
                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ tgl(date('Y-m-d', strtotime($item->tanggal_surat))) }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->isi_singkat_atau_perihal }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Surat Masuk?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus surat masuk akan menghapus semua data yang dimilikinya</p>
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

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '#delete', function(){
            let id = [];
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                $(".surat-masuk-checkbox:checked").each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    $.ajax({
                        url     : "{{ route('surat-masuk.destroys') }}",
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
                    alertFail('Harap pilih salah satu surat masuk');
                }
            }
        });

        $("#check_all").click(function(){
            if (this.checked) {
                $(".surat-masuk-checkbox").prop('checked',true);
            } else {
                $(".surat-masuk-checkbox").prop('checked',false);
            }
        });
    });
</script>
@endpush
