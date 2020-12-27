<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeranMenu extends Model
{
    protected $table = "peran_menu";
    protected $guarded = [];

    public function peran()
    {
        return $this->belongsTo('App\Peran');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function peran_menu_submenu()
    {
        return $this->hasMany('App\PeranMenuSubmenu');
    }
}
