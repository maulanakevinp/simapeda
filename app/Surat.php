<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    public function isiSurat()
    {
        return $this->hasMany('App\IsiSurat', 'surat_id');
    }
}
