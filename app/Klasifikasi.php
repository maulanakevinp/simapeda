<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = "klasifikasi";
    protected $guarded = [];

    public function analisis()
    {
        return $this->belongsTo('App\Analisis');
    }
}
