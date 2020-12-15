<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtikelGallery extends Model
{
    protected $table = 'artikel_galleries';
    protected $guarded = [];

    public function artikel()
    {
        return $this->belongsTo('App\Artikel');
    }
}
