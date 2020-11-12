<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRekam extends Model
{
    protected $table = "status_rekam";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
