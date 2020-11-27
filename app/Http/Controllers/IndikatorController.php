<?php

namespace App\Http\Controllers;

use App\Analisis;
use App\Indikator;
use App\Parameter;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Analisis $analisis)
    {
        $indikator = Indikator::latest()->paginate(10);

        if ($request->cari) {
            $indikator = Indikator::where('nama','like',"%{$request->cari}%")->paginate(10);
        }

        $indikator->appends($request->only('cari'));
        return view('analisis.indikator.index', compact('indikator','analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Analisis $analisis)
    {
        return view('analisis.indikator.create', compact('analisis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Analisis $analisis)
    {
        $validate = [
            'kategori_id'       => ['required','string','max:191'],
            'nomor'             => ['required','numeric'],
            'pertanyaan'        => ['required'],
            'tipe'              => ['required','numeric'],
            'bobot'             => ['nullable','numeric'],
        ];

        if ($request->tipe == 3) {
            $validate['minimal']  = ['required','numeric','max:'.$request->maksimal];
            $validate['maksimal'] = ['required','numeric','min:'.$request->minimal];
        } elseif($request->tipe == 1) {
            $validate['jawaban.*']  = ['required'];
            $validate['nilai.*']    = ['required','numeric'];
        }

        $data = $request->validate($validate,[
            'kategori_id.required'  => 'kategori wajib diisi.'
        ]);

        unset($data['jawaban']);
        unset($data['nilai']);

        $data['analisis_id'] = $analisis->id;

        $indikator = Indikator::create($data);

        for ($i=1; $i < count($request->jawaban); $i++) {
            Parameter::create([
                'indikator_id'  => $indikator->id,
                'jawaban'       => $request->jawaban[$i],
                'nilai'         => $request->nilai[$i],
            ]);
        }

        return response()->json([
            'message'   => 'Indikator berhasil ditambahkan',
            'redirect'  => strval(route('indikator.index', $analisis))
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function show(Indikator $indikator)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function edit(Analisis $analisis, Indikator $indikator)
    {
        return view('analisis.indikator.edit', compact('indikator','analisis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analisis $analisis, Indikator $indikator)
    {
        $validate = [
            'kategori_id'       => ['required','string','max:191'],
            'nomor'             => ['required','numeric'],
            'pertanyaan'        => ['required'],
            'tipe'              => ['required','numeric'],
            'bobot'             => ['nullable','numeric'],
        ];

        if ($request->tipe == 3) {
            $validate['minimal']  = ['required','numeric','max:'.$request->maksimal];
            $validate['maksimal'] = ['required','numeric','min:'.$request->minimal];
        } elseif($request->tipe == 1) {
            $validate['jawaban.*']  = ['required'];
            $validate['nilai.*']    = ['required','numeric'];
            Parameter::where('indikator_id', $indikator->id)->delete();
        }

        $data = $request->validate($validate,[
            'kategori_id.required'  => 'kategori wajib diisi.'
        ]);

        unset($data['jawaban']);
        unset($data['nilai']);

        $data['analisis_id'] = $analisis->id;

        $indikator->update($data);

        for ($i=1; $i < count($request->jawaban); $i++) {
            Parameter::create([
                'indikator_id'  => $indikator->id,
                'jawaban'       => $request->jawaban[$i],
                'nilai'         => $request->nilai[$i],
            ]);
        }

        return response()->json([
            'message'   => 'Indikator berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analisis $analisis, Indikator $indikator)
    {
        $indikator->delete();
        return back()->with('success','Indikator berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        Indikator::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Indikator berhasil dihapus'
        ]);
    }

    public function laporan(Analisis $analisis)
    {
        return view('analisis.indikator.laporan', compact('analisis'));
    }
}
