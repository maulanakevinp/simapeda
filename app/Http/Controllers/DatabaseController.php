<?php

namespace App\Http\Controllers;

use App\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function index()
    {
        return view('database.index');
    }

    public function backup()
    {
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $tables             = array(
            'anggaran_realisasi',
            'artikel',
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
            'surat_kelaur',
        );

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $output = '';

        foreach ($tables as $table) {
            $output .= "\nDROP TABLE IF EXISTS ".$table.";\n";
        }

        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }

            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }

        $file_name = 'database_backup_desa_'. Desa::find(1)->nama_desa .'_on_' . date('y-m-d-H_i_s') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

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
                DB::statement($templine);
                // Reset temp variable to empty
                $templine = '';
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
