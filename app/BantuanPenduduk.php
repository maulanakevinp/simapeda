<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BantuanPenduduk extends Model
{
    protected $table = "bantuan_penduduk";
    protected $guarded = [];

    public function bantuan()
    {
        return $this->belongsTo('App\Bantuan');
    }

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }
}
