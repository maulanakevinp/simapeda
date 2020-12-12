<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    protected $guarded = [];

    public function ttd()
    {
        return $this->belongsTo('App\PemerintahanDesa','pemerintahan_desa_id');
    }
}
