<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisCacat extends Model
{
    protected $table = "jenis_cacat";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
