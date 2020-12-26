<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Grup;
use App\GrupPenduduk;
use App\Penduduk;
use App\Rules\GrupRule;
use Illuminate\Http\Request;

class GrupPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Grup $grup)
    {
        $grup_penduduk = GrupPenduduk::where('grup_id', $grup->id)->paginate(10);

        if ($request->cari) {
            $grup_penduduk = GrupPenduduk::where('grup_id', $grup->id)
            ->whereHas('penduduk', function ($penduduk) use ($request) {
                $penduduk->where('nama','like',"%$request->cari%");
                $penduduk->orWhere('nik','like',"%$request->cari%");
                $penduduk->orWhere('kk','like',"%$request->cari%");
                $penduduk->orWhere('tempat_lahir','like',"%$request->cari%");
                $penduduk->orWhere('alamat','like',"%$request->cari%");
            })->orWhere('keterangan','like',"%$request->cari%")
            ->paginate(10);
        }

        return view('grup-penduduk.index', compact('grup','grup_penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Grup $grup)
    {
        return view('grup-penduduk.create', compact('grup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'grup_id'       => ['required','numeric'],
            'penduduk_id'   => ['required','numeric', new GrupRule($request->grup_id, $request->penduduk_id)],
            'keterangan'    => ['nullable'],
        ]);

        $grup_penduduk = GrupPenduduk::create($data);
        return redirect()->route('grup-penduduk.index', $grup_penduduk->grup_id)->with('success','Grup Penduduk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GrupPenduduk  $grup_penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupPenduduk $grup_penduduk)
    {
        $grup = $grup_penduduk->grup;
        return view('grup-penduduk.edit', compact('grup_penduduk','grup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\  $request
     * @param  \App\GrupPenduduk  $grup_penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupPenduduk $grup_penduduk)
    {
        $data = $request->validate([
            'grup_id'       => ['required','numeric'],
            'penduduk_id'   => ['required','numeric'],
            'keterangan'    => ['nullable'],
        ]);

        $grup_penduduk->update($data);
        return redirect()->route('grup-penduduk.index', $grup_penduduk->grup_id)->with('success','Grup Penduduk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GrupPenduduk  $grup_penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupPenduduk $grup_penduduk)
    {
        $grup_penduduk->delete();
        return back()->with('success','Grup Penduduk berhasil dihapus');
    }

    public function print(Grup $grup)
    {
        $desa = Desa::find(1);
        return view("grup-penduduk.print", compact('grup','desa'));
    }

    public function cari_penduduk(Penduduk $penduduk)
    {
        return response()->json([
            'nik'                   => $penduduk->nik,
            'nama'                  => $penduduk->nama,
            'alamat'                => $penduduk->alamat_sekarang ? $penduduk->alamat_sekarang : $penduduk->alamat_sebelumnya,
            'tempat_tanggal_lahir'  => $penduduk->tempat_lahir . ', ' . tgl($penduduk->tanggal_lahir),
            'jenis_kelamin'         => $penduduk->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan',
        ]);
    }
}
