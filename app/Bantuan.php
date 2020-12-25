<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    protected $table = "bantuan";
    protected $guarded = [];

    public function bantuan_penduduk()
    {
        return $this->hasMany('App\BantuanPenduduk');
    }
}
