<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $surat->nama }}</title>
    <link rel="icon" href="{{ url(Storage::url($desa->logo)) }}" type="image/png">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .table, td, th {
            border: 1px solid white;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div style="margin-top: 1cm; margin-bottom:0.5cm; margin-left: 1cm; margin-right: 1cm;">
        <div style="height:100px;width:100%; margin-bottom: 1rem">
            <div style="height:90px;width:70px;float:left" class="">
                <img style="width: 100%" src="{{ $logo }}" alt="">
            </div>
            <div class="lh-20px" style="text-align: center">
                <span style="font-size: 14pt; font-weight: bold">PEMERINTAHAN KABUPATEN {{ Str::upper($desa->nama_kabupaten) }}</span><br>
                <span style="font-size: 14pt; font-weight: bold">KECAMATAN {{ Str::upper($desa->nama_kecamatan) }}</span><br>
                <span style="font-size: 14pt; font-weight: bold">DESA {{ Str::upper($desa->nama_desa) }}</span><br>
                <div style="font-size: 11pt; font-style: italic">
                    {{ $desa->alamat }}
                </div>
            </div>
            <hr style="border-top: 5px double #000000;">
        </div>

        @if ($surat->perihal == 1)
            @php
                $perihal = array();
                foreach ($surat->isiSurat->where('jenis_isi', 4) as $isiSurat) {
                    array_push($perihal, $isiSurat->isi);
                }
            @endphp
            <div style="width: 60%; float: left;">
                <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="60px">Nomor</td>
                            <td>: {{ $surat->kode_surat }} / {{ $nomor }} / {{ $kode_desa }} / {{ date('Y') }}</td>
                        </tr>
                        <tr>
                            <td width="60px">Sifat</td>
                            <td>: {{ $perihal[0] }}</td>
                        </tr>
                        <tr>
                            <td width="60px">Lampiran</td>
                            <td>: {{ $perihal[1] }}</td>
                        </tr>
                        <tr>
                            <td width="60px">Perihal</td>
                            <td>: {{ $perihal[2] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="margin-left: 60%; width: 40%; text-align: center; float: right;">
                <p style="margin-bottom: 34px">{{ $desa->nama_desa }}, {{ $tanggal }}<br>Kepada {{ $perihal[3] }}</p>
                <p>Di - {{ $perihal[4] }}</p>
            </div>
        @else
            <div style="text-align: center; margin-bottom: 1rem">
                <b style="text-decoration: underline;">{{ Str::upper($surat->nama) }}</b><br>
                Nomor : {{ $surat->kode_surat }} / {{ $nomor }} / {{ $kode_desa }} / {{ date('Y') }}
            </div>
        @endif

        @php
            $data_kades = true;
            $tabel = true;
            $i = 0;
        @endphp

        @foreach ($surat->isiSurat->where('jenis_isi','!=', 4) as $key => $isiSurat)
            @php
                $paragraf1 = str_replace('[nama_desa]', $desa->nama_desa, $isiSurat->isi);
                $paragraf2 = str_replace('[nama_kecamatan]', $desa->nama_kecamatan, $paragraf1);
                $paragraf = str_replace('[nama_kabupaten]', $desa->nama_kabupaten, $paragraf2);
                $pattern = "/\{[0-9A-Za-z\s\(\)]+\}/";
                preg_match_all($pattern, $paragraf, $matches);
                $hasil = $paragraf;

                foreach ($matches[0] as $k => $value) {
                    $hasil = str_replace($value, $isian[$i], $hasil);
                    $i++;
                }

                try {
                    if ($surat->isiSurat->where('jenis_isi','!=', 4)[$key + 1]->jenis_isi == 3 || $data_kades == true && $surat->data_kades == 1) {
                        if ($isiSurat->jenis_isi == 1) {
                            echo '<div style="text-align: justify">'. str_repeat('&nbsp;', 12) . $hasil .'</div>';
                        } elseif ($isiSurat->jenis_isi == 2) {
                            echo '<div style="text-align: justify">'. $hasil .'</div>';
                        } elseif ($isiSurat->jenis_isi == 5) {
                            echo '<div style="font-weight: bold; text-align: center; text-decoration: underline;">'. $hasil .'</div>';
                        }
                    } else {
                        if ($isiSurat->jenis_isi == 1) {
                            echo '<p style="text-align: justify">'. str_repeat('&nbsp;', 12) . $hasil .'</p>';
                        } elseif ($isiSurat->jenis_isi == 2) {
                            echo '<p style="text-align: justify">'. $hasil .'</p>';
                        } elseif ($isiSurat->jenis_isi == 5) {
                            echo '<p style="font-weight: bold; text-align: center; text-decoration: underline;">'. $hasil .'</p>';
                        }
                    }
                } catch (\Throwable $th) {
                    if ($isiSurat->jenis_isi == 1) {
                        echo '<p style="text-align: justify">'. str_repeat('&nbsp;', 12) . $hasil .'</p>';
                    } elseif ($isiSurat->jenis_isi == 2) {
                        echo '<p style="text-align: justify">'. $hasil .'</p>';
                    } elseif ($isiSurat->jenis_isi == 5) {
                        echo '<p style="font-weight: bold; text-align: center; text-decoration: underline;">'. $hasil .'</p>';
                    }
                }
            @endphp

            @if ($data_kades && $surat->data_kades == 1)
                <table class="table" style="margin-bottom: 1rem; margin-left: 3rem">
                    <tbody>
                        <tr>
                            <td width="160px" valign="top">Nama</td>
                            <td width="10px" valign="top">:</td>
                            <td style="text-align: justify" valign="top">{{ $desa->ttd ? $desa->ttd->nama : $desa->nama_kepala_desa }}</td>
                        </tr>
                        <tr>
                            <td width="160px" valign="top">Jabatan</td>
                            <td width="10px" valign="top">:</td>
                            <td style="text-align: justify" valign="top">{{ $desa->ttd ? $desa->ttd->jabatan : "Kepala Desa" }}</td>
                        </tr>
                        <tr>
                            <td width="160px" valign="top">Alamat</td>
                            <td width="10px" valign="top">:</td>
                            <td style="text-align: justify" valign="top">{{ $desa->ttd ? $desa->ttd->alamat : $desa->alamat_kepala_desa }}</td>
                        </tr>
                    </tbody>
                </table>

                @php
                    $data_kades = false;
                @endphp
            @endif

            @if ($isiSurat->jenis_isi == 3)
                @if ($tabel)
                    <table class="table" style="margin-bottom: 1rem; margin-left: 3rem">
                        <tbody>
                    @php
                        $tabel = false;
                    @endphp
                @endif

                <tr>
                    <td width="160px" valign="top">{{ $isiSurat->isi }}</td>
                    <td width="10px" valign="top">:</td>
                    <td style="text-align: justify" valign="top">{{ $isian[$i] }}</td>
                </tr>

                @php
                    $i++;
                    try {
                        if ($surat->isiSurat[$key + 1]->jenis_isi != 3) {
                            echo "</tbody>";
                            echo "</table>";
                            $tabel = true;
                        }
                    } catch (\Throwable $th) {
                        echo "</tbody>";
                        echo "</table>";
                        $tabel = true;
                    }
                @endphp
            @endif
        @endforeach

        @if ($surat->tanda_tangan_bersangkutan == 1)
            <div style="width: 50%; float: left; text-align: center">
                <br>
                <p style="margin-bottom: 100px; margin-top:0px">
                    Yang Bersangkutan
                </p>
                <p style="" class="bold underline">
                    {{ $isian[count($isian) - 1] }}
                </p>
            </div>
        @endif
        <div style="margin-left: 50%; width: 50%; float: right; text-align: center">
            <p style="margin-bottom: 100px; margin-top:0px">
                {{ $desa->nama_desa }}, {{ $tanggal }}  <br>
                {{ $desa->ttd ? $desa->ttd->jabatan : "Kepala Desa" }} {{ $desa->nama_desa }}
            </p>
            <p style="" class="bold underline">
                {{ $desa->ttd ? $desa->ttd->nama : $desa->nama_kepala_desa }}
            </p>
        </div>
    </div>
</body>

</html>
