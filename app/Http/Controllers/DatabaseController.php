<?php

namespace App\Http\Controllers;

use App\Desa;
use Illuminate\Http\Request;
use Spatie\DbDumper\Databases\MySql as spatie;

class DatabaseController extends Controller
{
    public function index()
    {
        return view('database.index');
    }

    public function backup()
    {
        $file_name = 'database_backup_desa_' . Desa::find(1)->nama_desa . '_on_' . date('y-m-d-H_i_s') . '.sql';

        spatie::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->includeTables([
                'anggaran_realisasi',
                'artikel',
                'artikel_galleries',
                'surat',
                'isi_surat',
                'cetak_surat',
                'detail_cetak',
                'desa',
                'dusun',
                'detail_dusun',
                'pemerintahan_desa',
                'surat_masuk',
                'disposisi',
                'galleries',
                'penduduk',
                'analisis',
                'periode',
                'hasil_klasifikasi',
                'kategori',
                'indikator',
                'parameter',
                'klasifikasi',
                'input',
                'inventaris_asset',
                'inventaris_gedung',
                'inventaris_jalan',
                'inventaris_kontruksi',
                'inventaris_peralatan',
                'inventaris_tanah',
                'perdes',
                'perkades',
                'sk_kades',
                'surat_keluar',
            ])
            ->dumpToFile($file_name);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }

    public function restore(Request $request)
    {
        $request->validate([
            'sql'  => ['required']
        ]);

        $conn = mysqli_connect(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));

        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($request->sql);
        // Loop through each line
        foreach ($lines as $key => $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                $conn->query($templine);
                // Reset temp variable to empty
                $templine = '';
            }
        }

        mysqli_close($conn);

        return back()->with('success', 'File sql berhasil di restore');
    }
}
