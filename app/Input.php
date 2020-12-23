<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = "input";
    protected $guarded = [];

    public function analisis()
    {
        return $this->belongsTo('App\Analisis');
    }

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }

    public function indikator()
    {
        return $this->belongsTo('App\Indikator');
    }

    public function parameter()
    {
        return $this->belongsTo('App\Parameter');
    }

    public function periode()
    {
        return $this->belongsTo('App\Periode');
    }
}
