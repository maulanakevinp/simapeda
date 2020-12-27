<?php

namespace App\Http\Controllers;

use App\PeranMenu;
use App\PeranMenuSubmenu;
use Illuminate\Http\Request;

class PeranMenuSubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PeranMenu $peran_menu)
    {
        return view('peran.peran-menu-submenu.index', compact('peran_menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peran_menu_submenu = PeranMenuSubmenu::create($request->all());
        return back()->with('success', 'Submenu ' . $peran_menu_submenu->submenu->nama . ' berhasil diaktifkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PeranMenu  $peran_menu_submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeranMenuSubmenu $peran_menu_submenu)
    {
        $peran_menu_submenu->delete();
        return back()->with('success', 'Submenu ' . $peran_menu_submenu->submenu->nama . ' berhasil dinonaktifkan');
    }
}
