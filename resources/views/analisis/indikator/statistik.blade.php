@extends('layouts.app')

@section('title', 'Stastistik Jawaban')

@section('styles')
<script src="{{ asset('js/plugins/highcarts/highstock.js')}}"></script>
<script src="{{ asset('js/plugins/highcarts/exporting.js')}}"></script>
<script src="{{ asset('js/plugins/highcarts/accessibility.js')}}"></script>
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
                                <h2 class="mb-0">Stastistik Jawaban</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('indikator.laporan', $analisis) }}" class="btn btn-success" title="Kembali" data-toggle="tooltip"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    <div class="card-header font-weight-bold">Stastistik Jawaban ({{ $indikator->pertanyaan }})</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" width="10px">No</th>
                        <th class="text-center">Jawaban</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($indikator->tipe == 1)
                        @foreach ($indikator->parameter as $item)
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle">{{ $item->jawaban }}</td>
                                <td style="vertical-align: middle">{{ count($item->input) }}</td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($indikator->input->groupBy('jawaban') as $item)
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle">{{ $item[0]->jawaban }}</td>
                                <td style="vertical-align: middle">{{ count($item) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-3" id="chart"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        let column = {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statstik'
            },
            xAxis: {
                type: 'category'
            },
            legend: {
                enabled: false
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b> {point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },

            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },

            series: [{
                name:"",
                colorByPoint: true,
                data:[]
            }]
        };
        $.getJSON("{{ route('indikator.chart', $indikator) }}", function (response) {
            let chart = Highcharts.chart('chart', column);
            chart.series[0].setData(response);
        })
    });
</script>
@endpush
