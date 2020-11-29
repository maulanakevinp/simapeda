<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = "indikator";
    protected $guarded = [];

    public function analisis()
    {
        return $this->belongsTo('App\Analisis');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

    public function parameter()
    {
        return $this->hasMany('App\Parameter');
    }

    public function input()
    {
        return $this->hasMany('App\Input');
    }
}
