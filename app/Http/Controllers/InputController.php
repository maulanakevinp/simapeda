<?php

namespace App\Http\Controllers;

use App\Analisis;
use App\Indikator;
use App\Input;
use App\Penduduk;
use App\Periode;
use Illuminate\Http\Request;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Analisis $analisis, Periode $periode)
    {
        if ($analisis->subjek == 1) {
            $penduduk = Penduduk::latest()->paginate(10);
        } else {
            $penduduk = Penduduk::whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->latest()->paginate(10);
        }

        $periode = Periode::latest()->get();

        return view('analisis.input.index', compact('analisis','penduduk','periode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id'   => ['required','numeric'],
            'periode_id'    => ['required','numeric'],
            'jawaban.*'     => ['required'],
        ]);

        foreach ($request->jawaban as $key => $jawaban) {
            $input = Input::where('penduduk_id', $request->penduduk_id)->where('periode_id', $request->periode_id)->where('indikator_id',$request->indikator_id[$key])->first();
            if ($input) {
                $input->delete();
            }
            Input::create([
                'penduduk_id'   => $request->penduduk_id,
                'indikator_id'  => $request->indikator_id[$key],
                'parameter_id'  => $request->parameter_id[$key],
                'periode_id'    => $request->periode_id,
                'jawaban'       => $jawaban,
            ]);
        }

        return response()->json([
            'message'   => 'Input data sensus/survei berhasil diperbarui',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penduduk $penduduk
     * @param  \App\Analisis $analisis
     * @param  \App\Periode $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Analisis $analisis, Penduduk $penduduk, Periode $periode)
    {
        if ($analisis->subjek == 2) {
            $penduduk = Penduduk::where('kk', $penduduk->kk)->orderBy('nomor_urut_dalam_kk')->get();
        }

        $indikator = Indikator::where('analisis_id', $analisis->id)->get()->groupBy('kategori_id');
        return view('analisis.input.edit', compact('penduduk','analisis','indikator'));
    }
}
