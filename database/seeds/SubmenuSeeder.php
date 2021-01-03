<?php

use App\Submenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Submenu::truncate();
        Submenu::create([
            'menu_id'   => 1,
            'nama'      => 'Identitas Desa',
            'url'       => 'identitas-desa',
            'icon'      => 'fas fa-id-card',
            'warna'     => '#11cdef',
        ]);

        Submenu::create([
            'menu_id'   => 1,
            'nama'      => 'Wilayah Administratif',
            'url'       => 'dusun',
            'icon'      => 'fas fa-map',
            'warna'     => '#ffd600',
        ]);

        Submenu::create([
            'menu_id'   => 1,
            'nama'      => 'Pemerintahan Desa',
            'url'       => 'pemerintahan-desa',
            'icon'      => 'fa fa-sitemap',
            'warna'     => '#2dce89',
        ]);

        Submenu::create([
            'menu_id'   => 2,
            'nama'      => 'Penduduk',
            'url'       => 'penduduk',
            'icon'      => 'fas fa-user',
            'warna'     => '#11cdef',
        ]);

        Submenu::create([
            'menu_id'   => 2,
            'nama'      => 'Keluarga',
            'url'       => 'keluarga-penduduk',
            'icon'      => 'fas fa-users',
            'warna'     => '#2bffc6',
        ]);

        Submenu::create([
            'menu_id'   => 2,
            'nama'      => 'Calon Pemilih',
            'url'       => 'calon-pemilih',
            'icon'      => 'fas fa-podcast',
            'warna'     => '#2dce89',
        ]);

        Submenu::create([
            'menu_id'   => 2,
            'nama'      => 'Grup',
            'url'       => 'grup',
            'icon'      => 'fas fa-users',
            'warna'     => '#5e72e4',
        ]);

        Submenu::create([
            'menu_id'   => 2,
            'nama'      => 'Analisis',
            'url'       => 'analisis',
            'icon'      => 'fas fa-file-alt',
            'warna'     => '#11cdef',
        ]);

        Submenu::create([
            'menu_id'   => 2,
            'nama'      => 'Bantuan',
            'url'       => 'bantuan',
            'icon'      => 'fas fa-heart',
            'warna'     => '#f5365c',
        ]);

        Submenu::create([
            'menu_id'   => 3,
            'nama'      => 'Kelola Surat',
            'url'       => 'surat',
            'icon'      => 'fas fa-file-alt',
            'warna'     => '#2bffc6',
        ]);

        Submenu::create([
            'menu_id'   => 3,
            'nama'      => 'Kelola Surat Masuk',
            'url'       => 'surat-masuk',
            'icon'      => 'fas fa-file-import',
            'warna'     => '#5e72e4',
        ]);

        Submenu::create([
            'menu_id'   => 3,
            'nama'      => 'Kelola Surat Keluar',
            'url'       => 'surat-keluar',
            'icon'      => 'fas fa-file-export',
            'warna'     => '#2dce89',
        ]);

        Submenu::create([
            'menu_id'   => 3,
            'nama'      => 'Pengaturan Surat',
            'url'       => 'pengaturan-surat',
            'icon'      => 'fas fa-cog',
            'warna'     => '#f5365c',
        ]);

        Submenu::create([
            'menu_id'   => 3,
            'nama'      => 'Kelola Produk Hukum',
            'url'       => 'produk-hukum',
            'icon'      => 'fa fa-book-reader',
            'warna'     => '#11cdef',
        ]);

        Submenu::create([
            'menu_id'   => 3,
            'nama'      => 'Kelola Inventaris',
            'url'       => 'inventaris',
            'icon'      => 'fa fa-cubes',
            'warna'     => '#fb6340',
        ]);

        Submenu::create([
            'menu_id'   => 4,
            'nama'      => 'Kelola APBDes',
            'url'       => 'anggaran-realisasi',
            'icon'      => 'fa fa-cubes',
            'warna'     => '#2dce89',
        ]);

        Submenu::create([
            'menu_id'   => 4,
            'nama'      => 'Kelola Artikel',
            'url'       => 'artikel',
            'icon'      => 'fas fa-newspaper',
            'warna'     => '#2bffc6',
        ]);

        Submenu::create([
            'menu_id'   => 4,
            'nama'      => 'Kelola Gallery',
            'url'       => 'kelola-gallery',
            'icon'      => 'fas fa-images',
            'warna'     => '#fb6340',
        ]);

        Submenu::create([
            'menu_id'   => 4,
            'nama'      => 'Kelola Informasi',
            'url'       => 'informasi',
            'icon'      => 'fas fa-images',
            'warna'     => '#8965e0',
        ]);

        Submenu::create([
            'menu_id'   => 4,
            'nama'      => 'Kelola Peran',
            'url'       => 'peran',
            'icon'      => 'fas fa-universal-access',
            'warna'     => '#2bffc6',
        ]);

        Submenu::create([
            'menu_id'   => 4,
            'nama'      => 'Kelola User',
            'url'       => 'user',
            'icon'      => 'fas fa-users',
            'warna'     => '#11cdef',
        ]);

        Submenu::create([
            'menu_id'   => 4,
            'nama'      => 'Kelola Database',
            'url'       => 'database',
            'icon'      => 'fas fa-database',
            'warna'     => '#ffd600',
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
