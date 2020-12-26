<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupPenduduk extends Model
{
    protected $table = "grup_penduduk";
    protected $guarded = [];

    public function grup()
    {
        return $this->belongsTo('App\Grup');
    }

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }
}
