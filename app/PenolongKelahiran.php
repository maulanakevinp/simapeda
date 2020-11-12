<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenolongKelahiran extends Model
{
    protected $table = "penolong_kelahiran";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
