<?php
if (! function_exists('tgl')) {
    function tgl($tanggal)
    {
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}
if (! function_exists('bulan')) {
    function bulan($bulan)
    {
        $data = array (
            '01'    =>  'Januari',
            '02'    =>  'Februari',
            '03'    =>  'Maret',
            '04'    =>  'April',
            '05'    =>  'Mei',
            '06'    =>  'Juni',
            '07'    =>  'Juli',
            '08'    =>  'Agustus',
            '09'    =>  'September',
            '10'    =>  'Oktober',
            '11'    =>  'November',
            '12'    =>  'Desember'
        );
        return $data[$bulan];
    }
}
