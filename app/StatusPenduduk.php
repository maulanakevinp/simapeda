<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPenduduk extends Model
{
    protected $table = "status_penduduk";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
