<?php

use App\Gallery;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EditTableGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('video_id', 64)->nullable()->after('gallery');
        });

        foreach (DB::table('videos')->get() as $item) {
            Gallery::create([
                'gallery'       => $item->gambar,
                'video_id'      => $item->video_id,
                'caption'       => $item->caption,
                'created_at'    => $item->published_at,
                'updated_at'    => $item->published_at
            ]);
        }

        Schema::dropIfExists('videos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->text('gambar');
            $table->string('video_id',128);
            $table->text('caption');
            $table->timestamp('published_at');
            $table->timestamps();
        });

        foreach (Gallery::where('video_id','!=',null)->get() as $item) {
            DB::table('videos')->insert([
                'gambar'        => $item->gallery,
                'video_id'      => $item->video_id,
                'caption'       => $item->caption,
                'published_at'  => $item->created_at,
                'created_at'    => $item->created_at,
                'updated_at'    => $item->updated_at
            ]);
            $item->delete();
        }

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('video_id');
        });
    }
}
