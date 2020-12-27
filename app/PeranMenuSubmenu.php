<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeranMenuSubmenu extends Model
{
    protected $table = "peran_menu_submenu";
    protected $guarded = [];

    public function peran_menu()
    {
        return $this->belongsTo('App\PeranMenu');
    }

    public function submenu()
    {
        return $this->belongsTo('App\Submenu');
    }
}
