<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemerintahanDesa extends Model
{
    protected $table = "pemerintahan_desa";
    protected $guarded = [];

    public function agama()
    {
        return $this->belongsTo('App\Agama');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Pendidikan');
    }

    public function staff()
    {
        return $this->hasMany('App\PemerintahanDesa', 'atasan');
    }
}
