<?php

namespace App\Http\Controllers;

use App\Grup;
use Illuminate\Http\Request;

class GrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grup = Grup::paginate(10);

        if ($request->cari) {
            $grup = Grup::where('nama','like',"%{$request->cari}%")
                            ->orWhere('keterangan','like',"%{$request->cari}%")
                            ->paginate(10);
        }

        $grup->appends($request->only('cari'));
        return view('grup.index', compact('grup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grup.create');
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
            'sasaran'       => ['required','numeric'],
            'nama'          => ['required','string','max:128'],
            'keterangan'    => ['nullable'],
        ]);

        if ($request->berkas) {
            $data['berkas'] = $request->berkas->storeAs('public/grup', $request->berkas->getClientOriginalName());
        }

        Grup::create($data);
        return redirect()->route('grup.index')->with('success','Grup berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grup  $grup
     * @return \Illuminate\Http\Response
     */
    public function show(Grup $grup)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grup  $grup
     * @return \Illuminate\Http\Response
     */
    public function edit(Grup $grup)
    {
        return view('grup.edit', compact('grup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grup  $grup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grup $grup)
    {
        $data = $request->validate([
            'sasaran'       => ['required','numeric'],
            'nama'          => ['required','string','max:128'],
            'keterangan'    => ['nullable'],
        ]);

        $grup->update($data);
        return back()->with('success','Grup berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grup  $grup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grup $grup)
    {
        $grup->delete();
        return back()->with('success','Grup berhasil dihapus');
    }
}
