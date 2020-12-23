<?php

namespace App\Http\Controllers;

use App\Analisis;
use App\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Analisis $analisis)
    {
        $periode = Periode::where('analisis_id', $analisis->id)->latest()->paginate(10);

        if ($request->cari) {
            $periode = Periode::where('nama','like',"%{$request->cari}%")->where('analisis_id', $analisis->id)->latest()->paginate(10);
        }

        $periode->appends($request->only('cari'));
        return view('analisis.periode.index', compact('periode','analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Analisis $analisis)
    {
        return view('analisis.periode.create', compact('analisis'));
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
            'tahap_pendataan'   => ['required','numeric'],
            'tahun'             => ['required','numeric'],
            'keterangan'        => ['required'],
            'status'            => ['required','numeric'],
        ]);

        $data['analisis_id'] = $analisis->id;

        Periode::create($data);
        return redirect()->route('periode.index', $analisis)->with('success','Periode berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Analisis $analisis, Periode $periode)
    {
        return view('analisis.periode.edit', compact('periode','analisis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
        $data = $request->validate([
            'nama'              => ['required','string','max:191'],
            'tahap_pendataan'   => ['required','numeric'],
            'tahun'             => ['required','numeric'],
            'keterangan'        => ['required'],
            'status'            => ['required','numeric'],
        ]);

        $periode->update($data);
        return back()->with('success','Periode berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analisis $analisis, Periode $periode)
    {
        $periode->delete();
        return back()->with('success','Periode berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        Periode::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Periode berhasil dihapus'
        ]);
    }
}
