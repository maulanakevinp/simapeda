<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = "disposisi";
    protected $guarded = [];

    public function surat_masuk()
    {
        return $this->belongsTo('App\SuratMasuk');
    }

    public function pemerintahan_desa()
    {
        return $this->belongsTo('App\PemerintahanDesa');
    }
}
