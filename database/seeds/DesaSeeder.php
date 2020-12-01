<?php

use App\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::truncate();
        Desa::create([
            'nama_desa'         => 'Arjasa',
            'nama_kecamatan'    => 'Arjasa',
            'nama_kabupaten'    => 'Jember',
            'nama_provinsi'     => 'Jawa Timur',
            'kodepos'           => '68191',
            'alamat'            => 'Jl. Rengganis Nomor 01 Arjasa 68191',
            'nama_kepala_desa'  => "WASI'A",
            'alamat_kepala_desa'=> "Dusun Gumitir Desa Arjasa  Kecamatan  Arjasa Kabupaten Jember",
            'logo'              => "logo.png",
        ]);
    }
}
