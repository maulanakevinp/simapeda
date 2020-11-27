<?php

namespace App\Http\Controllers;

use App\Analisis;
use App\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Analisis $analisis)
    {
        $klasifikasi = Klasifikasi::latest()->paginate(10);

        if ($request->cari) {
            $klasifikasi = Klasifikasi::where('nama','like',"%{$request->cari}%")->paginate(10);
        }

        $klasifikasi->appends($request->only('cari'));
        return view('analisis.klasifikasi.index', compact('klasifikasi','analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Analisis $analisis)
    {
        return view('analisis.klasifikasi.create', compact('analisis'));
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
            'minimal'           => ['required','numeric','max:'.$request->maximal],
            'maximal'           => ['required','numeric','min:'.$request->minimal],
        ]);

        $data['analisis_id'] = $analisis->id;

        Klasifikasi::create($data);
        return redirect()->route('klasifikasi.index', $analisis)->with('success','Klasifikasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Klasifikasi $klasifikasi)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Analisis $analisis, Klasifikasi $klasifikasi)
    {
        return view('analisis.klasifikasi.edit', compact('klasifikasi','analisis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klasifikasi $klasifikasi)
    {
        $data = $request->validate([
            'nama'              => ['required','string','max:191'],
            'minimal'           => ['required','numeric','max:'.$request->maximal],
            'maximal'           => ['required','numeric','min:'.$request->minimal],
        ]);

        $klasifikasi->update($data);
        return back()->with('success','Klasifikasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analisis $analisis, Klasifikasi $klasifikasi)
    {
        $klasifikasi->delete();
        return back()->with('success','Klasifikasi berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        Klasifikasi::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Klasifikasi berhasil dihapus'
        ]);
    }

    public function laporan(Analisis $analisis)
    {
        return view('analisis.klasifikasi.laporan', compact('analisis'));
    }
}
