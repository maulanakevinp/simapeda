<?php

namespace App\Http\Controllers;

use App\Analisis;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Analisis $analisis)
    {
        $kategori = Kategori::where('analisis_id', $analisis->id)->latest()->paginate(10);

        if ($request->cari) {
            $kategori = Kategori::where('nama','like',"%{$request->cari}%")->where('analisis_id', $analisis->id)->latest()->paginate(10);
        }

        $kategori->appends($request->only('cari'));
        return view('analisis.kategori.index', compact('kategori','analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Analisis $analisis)
    {
        return view('analisis.kategori.create', compact('analisis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Analisis $analisis)
    {
        $data = $request->validate([
            'nama'              => ['required','string','max:191'],
        ]);

        $data['analisis_id'] = $analisis->id;

        Kategori::create($data);
        return redirect()->route('kategori.index', $analisis)->with('success','Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Analisis $analisis, Kategori $kategori)
    {
        return view('analisis.kategori.edit', compact('kategori','analisis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analisis $analisis, Kategori $kategori)
    {
        $data = $request->validate([
            'nama'              => ['required','string','max:191'],
        ]);

        $kategori->update($data);
        return back()->with('success','Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analisis $analisis, Kategori $kategori)
    {
        $kategori->delete();
        return back()->with('success','Kategori berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        Kategori::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Kategori berhasil dihapus'
        ]);
    }
}
