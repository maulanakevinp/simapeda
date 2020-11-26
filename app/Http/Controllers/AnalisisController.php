<?php

namespace App\Http\Controllers;

use App\Analisis;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $analisis = Analisis::latest()->paginate(10);

        if ($request->cari) {
            $analisis = Analisis::where('nama','like',"%{$request->cari}%")->paginate(10);
        }

        $analisis->appends($request->only('cari'));
        return view('analisis.index', compact('analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analisis.create');
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
            'nama'              => ['required','string','max:191'],
            'subjek'            => ['required','numeric'],
            'status_analisis'   => ['required','numeric'],
            'bilangan_pembagi'  => ['nullable','numeric'],
            'deskripsi'         => ['required']
        ]);

        Analisis::create($data);
        return redirect()->route('analisis.index')->with('success','Analisis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analisis = Analisis::findOrFail($id);
        return view('analisis.show', compact('analisis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analisis = Analisis::findOrFail($id);
        return view('analisis.edit', compact('analisis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analisis  $analisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analisis $analisi)
    {
        $data = $request->validate([
            'nama'              => ['required','string','max:191'],
            'subjek'            => ['required','numeric'],
            'status_analisis'   => ['required','numeric'],
            'bilangan_pembagi'  => ['nullable','numeric'],
            'deskripsi'         => ['required']
        ]);

        $analisi->update($data);
        return back()->with('success','Analisis berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analisis  $analisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analisis $analisi)
    {
        $analisi->delete();
        return back()->with('success','Analisis berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analisis  $analisi
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        Analisis::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Analisis berhasil dihapus'
        ]);
    }
}
