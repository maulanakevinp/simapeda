<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = "parameter";
    protected $guarded = [];

    public function indikator()
    {
        return $this->belongsTo('App\Indikator');
    }

    public function input()
    {
        return $this->hasMany('App\Input');
    }
}
