<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKelahiran extends Model
{
    protected $table = "jenis_kelahiran";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
