<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>@yield('title') - Desa {{ $desa->nama }}</title>
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{ url(Storage::url($desa->logo)) }}" type="image/png">
    <style type="text/css" media="print">
        body{
            background-color: white;
            font-family: 'Times New Roman', Times, serif;
        }
        @media print{
            @page {
                margin: 0.5cm;
                size: 330mm 215mm;
            }
        }
        .table th {
            background-color: rgb(225, 225, 225) !important;
            border: 1px solid black !important;
        }
        .table td {
            border: 1px solid black !important;
        }
        .table th, .table td {
            padding: 4px;
            font-size: 0.7rem;
        }
    </style>
</head>

<body onload="window.print()" oncontextmenu="return false;">
    <div style="height:100px;width:100%" class="mb-5">
        <div style="height:90px;width:90px;float:left" class="">
            <img class="mw-100" src="{{ url(Storage::url($desa->logo)) }}" alt="">
        </div>
        <div class="text-center lh-20px">
            <span style="font-size: 14pt" class="font-weight-bold">PEMERINTAHAN KABUPATEN {{ Str::upper($desa->nama_kabupaten) }}</span><br>
            <span style="font-size: 14pt" class="font-weight-bold">KECAMATAN {{ Str::upper($desa->nama_kecamatan) }}</span><br>
            <span style="font-size: 14pt" class="font-weight-bold">DESA {{ Str::upper($desa->nama_desa) }}</span><br>
            <div style="font-size: 11pt; font-style: italic">{{ $desa->alamat }}</div>
        </div>
        <hr style="border-top: 5px double #000000;">
    </div>

    @yield('content')

    <script>
        document.onkeydown = function(e) {
            if(event.keyCode == 123) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)) {
                return false;
            }
        }
    </script>
</body>

</html>
