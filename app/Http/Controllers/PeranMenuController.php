<?php

namespace App\Http\Controllers;

use App\PeranMenu;
use Illuminate\Http\Request;

class PeranMenuController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peran_menu = PeranMenu::create($request->all());
        return back()->with('success', 'Menu ' . $peran_menu->menu->nama . ' berhasil diaktifkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PeranMenu  $peran_menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeranMenu $peran_menu)
    {
        $peran_menu->delete();
        return back()->with('success', 'Menu ' . $peran_menu->menu->nama . ' berhasil dinonaktifkan');
    }
}
