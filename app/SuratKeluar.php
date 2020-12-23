<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = "surat_keluar";
    protected $guarded = [];

    public function kode_surat()
    {
        return $this->hasMany('App\KodeSurat');
    }

}
