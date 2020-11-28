@extends('layouts.app')

@section('title', 'Pemerintahan Desa')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Pemerintahan Desa</h2>
                                <p class="mb-0 text-sm">Profil Desa</p>
                            </div>
                            <div class="mb-3">
                                <button type="button" data-toggle="tooltip" title="Hapus data terpilih" class="btn btn-danger" id="delete" name="delete" >
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a target="_blank" href="#print" id="btn-print" data-toggle="tooltip" class="btn btn-secondary" title="Cetak"><i class="fas fa-print"></i></a>
                                <a href="{{ route('pemerintahan-desa.create') }}" data-toggle="tooltip" class="btn btn-success" title="Tambah Aparat"><i class="fas fa-plus"></i></a>
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
        <div class="row justify-content-center mb-3">
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Aparat Desa</h5>
                                <span class="h2 font-weight-bold mb-0">{{ App\PemerintahanDesa::count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Laki-laki</h5>
                                <span class="h2 font-weight-bold mb-0">{{ App\PemerintahanDesa::where('jenis_kelamin',1)->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Perempuan</h5>
                                <span class="h2 font-weight-bold mb-0">{{ App\PemerintahanDesa::where('jenis_kelamin',2)->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
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
            <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <th class="text-center">
                        <input type="checkbox" name="check_all" id="check_all">
                    </th>
                    <th class="text-center">No</th>
                    <th class="text-center">Opsi</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">NIP</th>
                    <th class="text-center">NIPD</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Agama</th>
                    <th class="text-center">Pangkat/Golongan</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Pendidikan</th>
                    <th class="text-center">Nomor SK Pengangkatan</th>
                    <th class="text-center">Tanggal SK Pengangkatan</th>
                    <th class="text-center">Nomor SK Pemberhentian</th>
                    <th class="text-center">Tanggal SK Pemberhentian</th>
                    <th class="text-center">Masa Jabatan</th>
                </thead>
                <tbody>
                    @forelse ($pemerintahan_desa as $key => $item)
                        <tr>
                            <td style="vertical-align: middle">
                                <input type="checkbox" class="pemerintah-desa-checkbox" id="delete{{ $item->id }}" name="delete[]" value="{{ $item->id }}">
                            </td>
                            <td style="vertical-align: middle" class="text-center">{{ ($pemerintahan_desa->currentpage()-1) * $pemerintahan_desa->perpage() + $loop->index + 1 }}</td>
                            <td style="vertical-align: middle">
                                @if ($key != 0)
                                    <button data-id="{{ $item->id }}" title="Pindah Ke Atas" data-toggle="tooltip" class="btn btn-sm btn-success atas"><i class="fas fa-arrow-up"></i></button>
                                @endif
                                @if ($key+1 != count($pemerintahan_desa))
                                    <button data-id="{{ $item->id }}" title="Pindah Ke Bawah" data-toggle="tooltip" class="btn btn-sm btn-success bawah"><i class="fas fa-arrow-down"></i></button>
                                @endif
                                <a href="{{ route('pemerintahan-desa.edit', $item) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->nama }}" data-action="{{ route("pemerintahan-desa.destroy", $item) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                            </td>
                            <td style="vertical-align: middle">{{ $item->nama }}</td>
                            <td style="vertical-align: middle"><a href="{{ App\Penduduk::where("nik",$item->nik)->first() ? route('penduduk.show', $item->nik) : '' }}">{{ $item->nik }}</a></td>
                            <td style="vertical-align: middle">{{ $item->nip }}</td>
                            <td style="vertical-align: middle">{{ $item->nipd }}</td>
                            <td style="vertical-align: middle">{{ $item->tempat_lahir }}</td>
                            <td style="vertical-align: middle">{{ tgl(date('Y-m-d',strtotime($item->tanggal_lahir))) }}</td>
                            <td style="vertical-align: middle">{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                            <td style="vertical-align: middle">{{ $item->agama->nama ?? '-' }}</td>
                            <td style="vertical-align: middle">{{ $item->pangkat_atau_golongan ?? '-' }}</td>
                            <td style="vertical-align: middle">{{ $item->jabatan }}</td>
                            <td style="vertical-align: middle">{{ $item->pendidikan->nama ?? '-' }}</td>
                            <td style="vertical-align: middle">{{ $item->nomor_sk_pengangkatan ?? '-' }}</td>
                            <td style="vertical-align: middle">{{ $item->tanggal_sk_pengangkatan ? tgl(date('Y-m-d', strtotime($item->tanggal_sk_pengangkatan))) : '-' }}</td>
                            <td style="vertical-align: middle">{{ $item->nomor_sk_pemberhentian ?? '-' }}</td>
                            <td style="vertical-align: middle">{{ $item->tanggal_sk_pemberhentian ? tgl(date('Y-m-d', strtotime($item->tanggal_sk_pemberhentian))) : '-' }}</td>
                            <td style="vertical-align: middle">{{ $item->masa_jabatan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="19" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pemerintahan_desa->links('layouts.components.pagination') }}
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Aparat?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus aparat akan menghapus semua data yang dimilikinya</p>
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

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-import">Import .xlsx</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route("pemerintahan-desa.import") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input accept=".xlsx" type="file" name="xlsx" class="form-control" placeholder="Masukkan File Excel">
                    <div class="mt-5 d-flex justify-content-between">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
                <form class="d-inline" action="{{ route("pemerintahan-desa.print_all") }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="ditandatangani">Laporan Ditandatangani</label> <img style="display: none" id="loading" height="20px" src="{{ asset('storage/loading.gif') }}" alt="Loading">
                        <select required class="form-control @error('ditandatangani') is-invalid @enderror" name="ditandatangani" id="ditandatangani">
                            <option selected value="">Pilih Aparat Pemerintahan Desa</option>
                            @foreach ($pemerintahan_desa as $item)
                                <option value="{{ $item->id }}" {{ old('ditandatangani') == $item->id ? 'selected="true"' : ''  }}>{{ $item->nama }} ({{ $item->jabatan }})</option>
                            @endforeach
                        </select>
                        @error('ditandatangani')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="diketahui">Laporan Diketahui</label> <img style="display: none" id="loading" height="20px" src="{{ asset('storage/loading.gif') }}" alt="Loading">
                        <select required class="form-control @error('diketahui') is-invalid @enderror" name="diketahui" id="diketahui">
                            <option selected value="">Pilih Aparat Pemerintahan Desa</option>
                            @foreach ($pemerintahan_desa as $item)
                                <option value="{{ $item->id }}" {{ old('diketahui') == $item->id ? 'selected="true"' : ''  }}>{{ $item->nama }} ({{ $item->jabatan }})</option>
                            @endforeach
                        </select>
                        @error('diketahui')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Print</button>
                </form>
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>

<form id="form-urutan" action="{{ route('pemerintahan-desa.urutan') }}" method="post">
    @csrf
    <input type="hidden" name="urutan">
    <input type="hidden" name="id">
</form>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(".atas").click(function () {
            $('input[name="urutan"]').val('atas');
            $('input[name="id"]').val($(this).data('id'));
            $('#form-urutan').submit();
        });

        $(".bawah").click(function () {
            $('input[name="urutan"]').val('bawah');
            $('input[name="id"]').val($(this).data('id'));
            $('#form-urutan').submit();
        });

        $('#btn-print').click(function (e) {
            e.preventDefault();
            $("#print").modal('show');
        });

        $(document).on('click', '#delete', function(){
            let id = [];
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                $(".pemerintah-desa-checkbox:checked").each(function () {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    $.ajax({
                        url     : "{{ route('pemerintah-desa.destroys') }}",
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
                    alertFail('Harap pilih salah satu aparat');
                }
            }
        });

        $("#check_all").click(function(){
            if (this.checked) {
                $(".pemerintah-desa-checkbox").prop('checked',true);
            } else {
                $(".pemerintah-desa-checkbox").prop('checked',false);
            }
        });
    });
</script>
@endpush
