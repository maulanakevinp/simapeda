<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = "input";
    protected $guarded = [];

    public function analisis()
    {
        return $this->belongsTo('App\Analisis');
    }
}
