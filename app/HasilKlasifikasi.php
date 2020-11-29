<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilKlasifikasi extends Model
{
    protected $table = "hasil_klasifikasi";
    protected $guarded = [];

    public function periode()
    {
        return $this->belongsTo('App\Periode');
    }

    public function analisis()
    {
        return $this->belongsTo('App\Analisis');
    }

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }
}
