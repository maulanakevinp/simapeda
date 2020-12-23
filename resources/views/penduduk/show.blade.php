@extends('layouts.app')

@section('title', 'Detail Penduduk Penduduk')

@section('styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<style>
    .table th, .table td {
        padding: 5px;
    }
    .card .table td, .card .table th {
        padding-left: 5px;
        padding-right: 5px;
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
                                <h2 class="mb-0">Detail Penduduk Penduduk</h2>
                                <p class="mb-0 text-sm">Kelola Penduduk</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('penduduk.edit', $penduduk) }}" class="btn btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger hapus-data" data-nama="{{ $penduduk->nama }}" data-action="{{ route("penduduk.destroy", $penduduk) }}" data-toggle="tooltip" title="Hapus" href="#modal-hapus"><i class="fas fa-trash"></i></a>
                                <a href="{{ URL::previous() }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="row">
    <div class="col">
        <div class="card shadow h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group text-center">
                            <label class="form-control-label" for="nik">Foto Penduduk</label> <br>
                            <img class="mw-100 upload-image" style="max-height: 300px" src="{{ $penduduk->foto ? asset(Storage::url($penduduk->foto)) : asset('storage/noavatar.png') }}" alt="foto">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <td width="120px">NIK</td>
                                    <td width="5px">:</td>
                                    <td>{{ $penduduk->nik }}</td>
                                </tr>
                                <tr>
                                    <td width="120px">Nama</td>
                                    <td width="5px">:</td>
                                    <td>{{ $penduduk->nama }}</td>
                                </tr>
                                <tr>
                                    <td width="120px">Jenis Kelamin</td>
                                    <td width="5px">:</td>
                                    <td>{{ $penduduk->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="bg-primary text-white">Status Kepemilikan KTP</th>
                                </tr>
                                <tr>
                                    <td width="120px">KTP Elektronik</td>
                                    <td width="5px">:</td>
                                    <td>
                                        @if ($penduduk->ktp_elektronik == 1)
                                            Belum
                                        @elseif ($penduduk->ktp_elektronik == 2)
                                            KTP-EL
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="120px">Status Rekam</td>
                                    <td width="5px">:</td>
                                    <td>{{ $penduduk->statusRekam->nama ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <td width="120px">Nomor KK</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->kk }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Nomor Urut Dalam KK</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nomor_urut_dalam_kk }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Status Hubungan Dalam Keluarga</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->statusHubunganDalamKeluarga->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Agama</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->agama->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Agama</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->statusPenduduk->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Etnis/Suku</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->etnis_atau_suku ?? '-' }}</td>
                        </tr>
                        <tr><th colspan="3" class="bg-primary text-white">Data Kelahiran</th></tr>
                        <tr>
                            <td width="120px">Nomor Akta Kelahiran</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nomor_akta_kelahiran ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Tempat Lahir</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->tempat_lahir ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Tanggal Lahir</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->tanggal_lahir ? tgl(date('Y-m-d',strtotime($penduduk->tanggal_lahir))) : '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Waktu Lahir</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->waktu_kelahiran ? date('H:i',strtotime($penduduk->waktu_kelahiran)) : '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Tempat Dilahirkan</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->tempatDilahirkan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Jenis Kelahiran</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->jenisKelahiran->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Anak Ke</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->anak_ke ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Penolong Kelahiran</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->penolongKelahiran->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Berat Lahir</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->berat_lahir ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Panjang Lahir</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->panjang_lahir ?? '-' }}</td>
                        </tr>
                        <tr><th colspan="3" class="bg-primary text-white">Pendidikan Dan Pekerjaan</th></tr>
                        <tr>
                            <td width="120px">Pendidikan</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->pendidikan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Pekerjaan</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->pekerjaan->nama ?? '-' }}</td>
                        </tr>
                        <tr><th colspan="3" class="bg-primary text-white">Data Kewarganegaraan</th></tr>
                        <tr>
                            <td width="120px">Kewarganegaraan</td>
                            <td width="5px">:</td>
                            <td>
                                @if ($penduduk->kewarganegaraan == 1)
                                    Warga Negara Indonesia
                                @elseif ($penduduk->kewarganegaraan == 2) {
                                    Warga Negara Asing
                                @else
                                    Dwi Kewarganegaraan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="120px">Nomor Paspor</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nomor_paspor ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Tgl Berakhir Paspor</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->tgl_berakhir_paspor ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Nomor KITAS/KITAP</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nomor_kitas_atau_kitap ?? '-' }}</td>
                        </tr>
                        <tr><th colspan="3" class="bg-primary text-white">Data Orang Tua</th></tr>
                        <tr>
                            <td width="120px">NIK Ayah</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nik_ayah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Nama Ayah</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nama_ayah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">NIK Ibu</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nik_ibu ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Nama Ibu</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nama_ibu ?? '-' }}</td>
                        </tr>
                        <tr><th colspan="3" class="bg-primary text-white">Alamat</th></tr>
                        <tr>
                            <td width="120px">Dusun</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->detailDusun->dusun->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">RT/RW</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->detailDusun->rt ?? '-' }}/{{ $penduduk->detailDusun->rw ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Nomor Telepon</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nomor_telepon ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Alamat Email</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->alamat_email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Alamat Sebelumnya</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->alamat_sebelumnya ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Alamat Sekarang</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->alamat_sekarang ?? '-' }}</td>
                        </tr>
                        <tr><th colspan="3" class="bg-primary text-white">Status Perkawinan</th></tr>
                        <tr>
                            <td width="120px">Status Perkawinan</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->statusPerkawinan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Nomor Akta Perkawinan</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nomor_akta_perkawinan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Tanggal Perkawinan</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->tanggal_perkawinan ? tgl(date('Y-m-d',strtotime($penduduk->tanggal_perkawinan))) : '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Nomor Akta Perceraian</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->nomor_akta_perceraian ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Tanggal Perceraian</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->tanggal_perceraian ? tgl(date('Y-m-d',strtotime($penduduk->tanggal_perceraian))) : '-' }}</td>
                        </tr>
                        <tr><th colspan="3" class="bg-primary text-white">Data Kesehatan</th></tr>
                        <tr>
                            <td width="120px">Golongan Darah</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->darah->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Jenis Cacat</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->jenisCacat->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Sakit Menahun</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->sakitMenahun->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Akseptor KB</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->akseptorKb->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="120px">Asuransi</td>
                            <td width="5px">:</td>
                            <td>{{ $penduduk->asuransi->nama ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Penduduk?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus penduduk akan menghapus semua data yang dimilikinya</p>
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
