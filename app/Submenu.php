<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $table = "submenu";
    protected $guarded = [];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function peran_menu_submenu()
    {
        return $this->hasMany('App\PeranMenuSubmenu');
    }
}
