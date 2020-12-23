<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SakitMenahun extends Model
{
    protected $table = "sakit_menahun";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
