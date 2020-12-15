<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $guarded = [];

    public function galleries()
    {
        return $this->hasMany('App\ArtikelGallery');
    }
}
