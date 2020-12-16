<?php

namespace App\Http\Controllers;

use App\Desa;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Spatie\DbDumper\Databases\MySql as spatie;
use ZipArchive;

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

        $this->download($file_name);
    }

    public function restore(Request $request)
    {
        $request->validate([
            'sql'  => ['required','file']
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

    public function folder_backup()
    {
        $zip = new ZipArchive;
        $fileName = 'folder_backup_desa_' . Desa::find(1)->nama_desa . '_on_' . date('y-m-d-H_i_s') . '.zip';
        $rootPath = realpath('storage');
        $zip = new ZipArchive();
        $zip->open(public_path($fileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY);

        foreach ($files as $name => $file)
        {
            if (basename($file) == '.gitignore' || basename($file) == 'logo.png' || basename($file) == 'noavatar.png' || basename($file) == 'noimage.jpg' || basename($file) == 'upload.jpg' || basename($file) == 'loading.gif' || basename($file) == 'Panduan Simapeda.mp4') {
                continue;
            }

            if (!$file->isDir())
            {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();
        $this->download($fileName);
    }

    public function folder_restore(Request $request)
    {
        $request->validate([
            'zip'  => ['required','file','mimes:zip']
        ]);

        $zip = new ZipArchive;
        $res = $zip->open($request->zip);
        if ($res === TRUE) {
            $zip->extractTo(storage_path('/app/public'));
            $zip->close();
            return back()->with('success','Folder Backup berhasil direstore');
        } else {
            return back()->with('error','Folder Backup gagal direstore');
        }
    }

    private function download($fileName)
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($fileName));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));
        ob_clean();
        flush();
        readfile($fileName);
        unlink($fileName);
    }
}
