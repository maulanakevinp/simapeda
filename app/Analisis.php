<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    protected $table = "analisis";
    protected $guarded = [];

    public function kategori()
    {
        return $this->hasMany('App\Kategori');
    }

    public function klasifikasi()
    {
        return $this->hasMany('App\Klasifikasi');
    }

    public function indikator()
    {
        return $this->hasMany('App\Indikator');
    }

    public function periode()
    {
        return $this->hasMany('App\Periode');
    }

    public function input()
    {
        return $this->hasMany('App\Input');
    }
}
