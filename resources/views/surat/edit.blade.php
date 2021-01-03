@extends('layouts.app')

@section('title', 'Edit Surat')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
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
                                <h2 class="mb-0">Edit Surat</h2>
                                <p class="mb-0 text-sm">Kelola Surat</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('surat.index') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    <div class="col">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Edit Surat</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('surat.update', $surat) }}" method="post">
                    @csrf @method('patch')
                    <h6 class="heading-small text-muted">Detail Surat</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Kode Surat</label>
                            <select name="kode_surat" id="kode_surat" class="form-control">
                                <option value="">Pilih Kode Surat</option>
                                @foreach (App\KodeSurat::all() as $key => $item)
                                    <option value="{{ $item->kode }}" {{ $surat->kode_surat == $item->kode ? 'selected' : '' }}>{{ $item->kode }} - {{ $item->nama }} {{ $item->uraian != '-' ? '- '. $item->uraian : ''}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Nama Surat</label>
                            <input class="form-control form-control-alternative" name="nama" placeholder="Masukkan Nama Surat" value="{{ $surat->nama }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Deskripsi</label>
                            <textarea class="form-control form-control-alternative" name="deskripsi" placeholder="Masukkan Deskripsi">{{ $surat->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Persyaratan</label>
                            <textarea class="form-control form-control-alternative" name="persyaratan" placeholder="Masukkan persyaratan untuk membuat surat yang ditujukan untuk warga">{{ $surat->persyaratan }}</textarea>
                        </div>
                    </div>
                    <h6 class="heading-small text-muted">Isian</h6>
                    <div class="pl-lg-4" id="isian">
                        @if ($surat->perihal == 1)
                            @php
                                $perihal = array();
                                foreach ($surat->isiSurat->where('jenis_isi',4) as $isiSurat) {
                                    array_push($perihal, $isiSurat->isi);
                                }
                            @endphp
                            <div id="isian_perihal">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Sifat</label>
                                            <input class="form-control form-control-alternative" name="isi[]" value="<?php try { echo $perihal[0]; } catch (\Throwable $th){}  ?>">
                                            <input type="hidden" name="jenis_isi[]" value="4">
                                            <input type="hidden" name="tampilkan[]" value="0">
                                            <input type="hidden" name="isian[]" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Lampiran</label>
                                            <input class="form-control form-control-alternative" name="isi[]" value="<?php try { echo $perihal[1]; } catch (\Throwable $th){}  ?>">
                                            <input type="hidden" name="jenis_isi[]" value="4">
                                            <input type="hidden" name="tampilkan[]" value="0">
                                            <input type="hidden" name="isian[]" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Perihal</label>
                                            <input class="form-control form-control-alternative" name="isi[]" value="<?php try { echo $perihal[2]; } catch (\Throwable $th){}  ?>">
                                            <input type="hidden" name="jenis_isi[]" value="4">
                                            <input type="hidden" name="tampilkan[]" value="0">
                                            <input type="hidden" name="isian[]" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Kepada</label>
                                            <input class="form-control form-control-alternative" name="isi[]" value="<?php try { echo $perihal[3]; } catch (\Throwable $th){}  ?>">
                                            <input type="hidden" name="jenis_isi[]" value="4">
                                            <input type="hidden" name="tampilkan[]" value="0">
                                            <input type="hidden" name="isian[]" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Di</label>
                                            <input class="form-control form-control-alternative" name="isi[]" value="<?php try { echo $perihal[4]; } catch (\Throwable $th){}  ?>">
                                            <input type="hidden" name="jenis_isi[]" value="4">
                                            <input type="hidden" name="tampilkan[]" value="0">
                                            <input type="hidden" name="isian[]" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach (App\IsiSurat::where('surat_id', $surat->id)->where('jenis_isi', '!=', 4)->orderBy('urutan')->get() as $key => $isiSurat)
                            <div class="card shadow mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <textarea class="form-control" name="isi[]" placeholder="{{ $isiSurat->jenis_isi == 1 ? 'Paragraf' : ($isiSurat->jenis_isi == 2 ? 'Kalimat' : ($isiSurat->jenis_isi == 3 ? 'Isian' : 'Subjudul')) }} ...">{{ $isiSurat->isi }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <select name="isian[]" class="form-control" style="{{ $isiSurat->jenis_isi != 3 ? 'display: none;' : '' }}">
                                                    <option value="">Pilih Isian</option>
                                                    @foreach ($isian as $key => $item)
                                                        <option value="{{ $item }}" {{ $isiSurat->isian == $item ? 'selected' : '' }}>{{ str_replace('_',' ',$item) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            @include('surat.side', ['bantuan' => $isiSurat->jenis_isi == 1 ? url('img/bantuan-paragraf.png') : ($isiSurat->jenis_isi == 2 ? url('img/bantuan-kalimat.png') : url('img/bantuan-subjudul.png'))])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <h6 class="heading-small text-muted">Alat</h6>
                    <div class="pl-lg-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_surat_ini" name="tampilkan_surat_ini" {{ $surat->tampilkan ? 'checked="true"' : '' }} value="1">
                            <input type="hidden" name="tampilkan_surat" id="tampilkan_surat" value="{{ $surat->tampilkan }}">
                            <label class="custom-control-label" for="tampilkan_surat_ini">Tampilkan surat ini untuk warga yang ingin mencetak surat keterangan ini</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_perihal" name="tampilkan_perihal" {{ $surat->perihal ? 'checked="true"' : '' }} value="1">
                            <input type="hidden" name="perihal" id="perihal" value="{{ $surat->perihal }}">
                            <label class="custom-control-label" for="tampilkan_perihal">Perihal</label> <a href="{{ url('img/bantuan-perihal.png') }}" data-fancybox data-caption="Akan menampilkan surat seperti ini"><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_data_kades" name="tampilkan_data_kades" {{ $surat->data_kades ? 'checked="true"' : '' }} value="1">
                            <input type="hidden" name="data_kades" id="data_kades" value="{{ $surat->data_kades }}">
                            <label class="custom-control-label" for="tampilkan_data_kades">Data Kades</label> <a href="{{ url('img/bantuan-data-kades.png') }}" data-fancybox data-caption="Akan menampilkan data kepala desa"><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="tampilkan_tanda_tangan_bersangkutan" name="tampilkan_tanda_tangan_bersangkutan" {{ $surat->tanda_tangan_bersangkutan ? 'checked="true"' : '' }} value="1">
                            <input type="hidden" name="tanda_tangan_bersangkutan" id="tanda_tangan_bersangkutan" value="{{ $surat->tanda_tangan_bersangkutan }}">
                            <label class="custom-control-label" for="tampilkan_tanda_tangan_bersangkutan">Tanda tangan bersangkutan</label> <a href="{{ url('img/bantuan-tanda-tangan-bersangkutan.png') }}" data-fancybox data-caption="Akan menampilkan tanda tangan yang bersangkutan"><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/surat.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#kode_surat').select2({
            placeholder: "Pilih Kode Surat",
            allowClear: true
        });
    });
</script>
@endpush
