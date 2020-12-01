<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = "surat_masuk";
    protected $guarded = [];

    public function kode_surat()
    {
        return $this->hasMany('App\KodeSurat');
    }
}
