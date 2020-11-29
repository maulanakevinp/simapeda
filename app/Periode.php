<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = "periode";
    protected $guarded = [];

    public function analisis()
    {
        return $this->belongsTo('App\Analisis');
    }

    public function input()
    {
        return $this->hasMany('App\Input');
    }
}
