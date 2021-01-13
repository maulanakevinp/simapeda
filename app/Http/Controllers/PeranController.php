<?php

namespace App\Http\Controllers;

use App\Peran;
use Illuminate\Http\Request;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peran.index', ['peran' => Peran::where('id', '!=', 1)->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required','string','max:16']
        ]);

        $peran = Peran::create($data);
        return redirect()->route('peran.edit',$peran)->with('success','Peran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function show(Peran $peran)
    {
        if ($peran->id == 1) {
            return back();
        }
        return view('peran.show', compact('peran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function edit(Peran $peran)
    {
        if ($peran->id == 1) {
            return back();
        }
        return view('peran.edit', compact('peran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peran $peran)
    {
        if ($peran->id == 1) {
            return back();
        }

        $data = $request->validate([
            'nama' => ['required','string','max:16']
        ]);

        $peran->update($data);
        return redirect()->back()->with('success','Peran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peran  $peran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peran $peran)
    {
        if ($peran->id == 1) {
            return back();
        }

        $peran->delete();
        return redirect()->route('peran.index')->with('success','Peran berhasil dihapus');
    }
}
