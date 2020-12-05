<?php

use App\Desa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Desa::truncate();
        Desa::create([
            'nama_desa'         => 'Arjasa',
            'kode_desa'         => '3509222003',
            'nama_kecamatan'    => 'Arjasa',
            'kode_kecamatan'    => '350922',
            'nama_kabupaten'    => 'Jember',
            'kode_kabupaten'    => '3509',
            'nama_provinsi'     => 'Jawa Timur',
            'kode_provinsi'     => '35',
            'kodepos'           => '68191',
            'alamat'            => 'Jl. Rengganis Nomor 01 Arjasa 68191',
            'nama_kepala_desa'  => "WASI'A",
            'alamat_kepala_desa'=> "Dusun Gumitir Desa Arjasa  Kecamatan  Arjasa Kabupaten Jember",
            'logo'              => "logo.png",
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
