<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = "grup";
    protected $guarded = [];

    public function grup_penduduk()
    {
        return $this->hasMany('App\GrupPenduduk');
    }
}
