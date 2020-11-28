@extends('layouts.app')

@section('title', 'Input Data Sensus/Survei')

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
                                <h2 class="mb-0">Input Data Sensus/Survei</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('input.index', [$analisis, 'periode' => request()->segment(6) ?? (App\Periode::latest()->first() ?? '0')]) }}" class="btn btn-success" title="Kembali" data-toggle="tooltip"><i class="fas fa-arrow-left"></i> Kembali</a>
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
@include('analisis.detail')
<div class="card shadow">
    <div class="card-header">Input Data Sensus/Survei</div>
    <div class="card-body">
        <div class="table-responsive mb-3">
            <table class="table table-sm table-hover table-striped">
                <tr>
                    <td width="50px">Nomor Identitas</td>
                    <td width="1px">:</td>
                    <td>
                        @if ($analisis->subjek == 1)
                            {{ $penduduk->kk }}
                        @else
                            {{ $penduduk[0]->kk }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td width="50px">Nama Subjek</td>
                    <td width="1px">:</td>
                    <td>
                        @if ($analisis->subjek == 1)
                            {{ $penduduk->nama }}
                        @else
                            {{ $penduduk[0]->nama }}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        @if ($analisis->subjek == 2)
            <div class="table-responsive mb-3">
                <table class="table table-sm table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penduduk as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ tgl(date('Y-m-d',strtotime($item->tanggal_lahir))) }}</td>
                                <td class="text-center">{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <form autocomplete="off" action="{{ route('input.store', $analisis) }}" method="post">
            @csrf
            <input type="hidden" name="analisis_id" value="{{ $analisis->id }}">
            <input type="hidden" name="periode_id" value="{{ request()->segment(6) }}">
            <input type="hidden" name="penduduk_id" value="{{ request()->segment(4) }}">
            @foreach ($indikator as $key => $kategori)
                <h4 class="bg-info px-3 py-1 text-white">{{ App\Kategori::find($key)->nama }}</h4>
                <div class="pl-3">
                    @foreach ($kategori as $item)
                        <div class="form-group row">
                            <input type="hidden" name="indikator_id[]" value="{{ $item->id }}">
                            <input class="parameter_id" type="hidden" name="parameter_id[]" value="">
                            <label class="form-control-label col-form-label col-md-3">{{ $item->nomor }}. {{ $item->pertanyaan }}</label>
                            <div class="col-md-9">
                                @if ($item->tipe == 1)
                                    <select name="jawaban[]" class="form-control parameter">
                                        <option value="">Pilih {{ $item->pertanyaan }}</option>
                                        @foreach ($item->parameter as $parameter)
                                            <option value="{{ $parameter->id }}" {{ App\Input::where('penduduk_id', request()->segment(4))->where('indikator_id', $item->id)->where('periode_id', request()->segment(6))->where('parameter_id', $parameter->id)->first() ? 'selected' : '' }}>{{ $parameter->jawaban }}</option>
                                        @endforeach
                                    </select>
                                @elseif ($item->tipe == 2)
                                    <input type="text" name="jawaban[]" class="form-control" placeholder="Masukkan {{ $item->pertanyaan }}" value="{{ App\Input::where('penduduk_id', request()->segment(4))->where('indikator_id', $item->id)->where('periode_id', request()->segment(6))->first()->jawaban ?? '' }}">
                                @elseif ($item->tipe == 3)
                                    <input type="number" name="jawaban[]" class="form-control" placeholder="Masukkan {{ $item->pertanyaan }}" value="{{ App\Input::where('penduduk_id', request()->segment(4))->where('indikator_id', $item->id)->where('periode_id', request()->segment(6))->first()->jawaban ?? '' }}">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(".parameter").change(function (){
            $(this).parent().parent().find('.parameter_id').val($(this).val());
        });

        for (const iterator of document.querySelectorAll('.parameter_id')) {
            try { iterator.value = iterator.parentElement.querySelector('.parameter').value; } catch (error) {}
        }

        $('form').on('submit', function(event) {
            event.preventDefault();
            const url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(data){
                    $("#simpan").attr('disabled','disabled');
                    $("#simpan").html(`<img height="20px" src="${baseURL}/storage/loading.gif" alt=""> Loading ...`);
                },
                success: function(response){
                    $("#simpan").html('SIMPAN');
                    $("#simpan").removeAttr('disabled');
                    alertSuccess(response.message);
                    setTimeout(() => {
                        $(".notifikasi").html('');
                    }, 3000);
                    if (response.redirect) {
                        location.href = response.redirect;
                    }
                },
                error: function (response) {
                    console.clear();
                    $("#simpan").html('SIMPAN');
                    $("#simpan").removeAttr('disabled');
                    alertFail('jawaban wajib diisi');
                }
            });
        });
    });
</script>
@endpush
