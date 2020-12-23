
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropBeritaPemerintahanDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (DB::table('berita')->get() as $item) {
            DB::table('artikel')->insert([
                'judul'     => $item->judul,
                'gambar'    => $item->gambar,
                'konten'    => $item->konten,
                'menu'      => 'Berita',
                'dilihat'   => $item->dilihat,
                'created_at'=> $item->created_at,
                'updated_at'=> $item->updated_at
            ]);
        }

        Schema::dropIfExists('berita');

        foreach (DB::table('pemerintahan_desa')->get() as $item) {
            DB::table('artikel')->insert([
                'judul'     => $item->judul,
                'gambar'    => $item->gambar,
                'konten'    => $item->konten,
                'menu'      => 'Pemerintahan Desa',
                'dilihat'   => $item->dilihat,
                'created_at'=> $item->created_at,
                'updated_at'=> $item->updated_at
            ]);
        }

        Schema::dropIfExists('pemerintahan_desa');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar')->nullable();
            $table->longText('konten');
            $table->bigInteger('dilihat')->default(0);
            $table->timestamps();
        });

        Schema::create('pemerintahan_desa', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar')->nullable();
            $table->longText('konten');
            $table->bigInteger('dilihat')->default(0);
            $table->timestamps();
        });

        foreach (DB::table('artikel')->get() as $item) {
            if ($item->menu == "Berita") {
                DB::table('berita')->insert([
                    'judul'     => $item->judul,
                    'gambar'    => $item->gambar,
                    'konten'    => $item->konten,
                    'dilihat'   => $item->dilihat,
                    'created_at'=> $item->created_at,
                    'updated_at'=> $item->updated_at
                ]);
            } elseif ($item->menu == "Pemerintahan Desa") {
                DB::table('pemerintahan_desa')->insert([
                    'judul'     => $item->judul,
                    'gambar'    => $item->gambar,
                    'konten'    => $item->konten,
                    'dilihat'   => $item->dilihat,
                    'created_at'=> $item->created_at,
                    'updated_at'=> $item->updated_at
                ]);
            }
        }

    }
}
