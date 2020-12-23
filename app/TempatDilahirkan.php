<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempatDilahirkan extends Model
{
    protected $table = "tempat_dilahirkan";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
