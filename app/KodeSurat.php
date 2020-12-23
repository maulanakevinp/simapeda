<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeSurat extends Model
{
    protected $table = "kode_surat";
    protected $guarded = [];

    public function surat_masuk()
    {
        return $this->hasMany('App\SuratMasuk');
    }

    public function surat_keluar()
    {
        return $this->hasMany('App\SuratKeluar');
    }
}
