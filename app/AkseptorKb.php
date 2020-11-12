<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkseptorKb extends Model
{
    protected $table = "akseptor_kb";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
