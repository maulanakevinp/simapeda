<?php

namespace App\Http\Controllers;

use App\Desa;
use App\PemerintahanDesa;
use App\SkKades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkKadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sk_kades = SkKades::latest()->paginate(10);

        if ($request->cari) {
            $sk_kades = SkKades::where('judul_dokumen','like',"%{$request->cari}%")
                            ->orWhere('uraian_singkat','like',"%{$request->cari}%")
                            ->latest()->paginate(10);
        }

        $sk_kades->appends($request->only('cari'));
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        return view('produk-hukum.sk-kades.index', compact('sk_kades','pemerintahan_desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk-hukum.sk-kades.create');
    }

    private function validator($berkas = null)
    {
        $data = [
            'judul_dokumen'             => ['required','string','max:128'],
            'dokumen'                   => ['nullable','file','max:2048'],
            'uraian_singkat'            => ['required'],
            'tanggal_keputusan_kades'   => ['required','date'],
            'nomor_keputusan_kades'     => ['required','string','max:128'],
            'tanggal_dilaporkan'        => ['required','date'],
            'nomor_dilaporkan'          => ['required','string','max:128'],
            'keterangan'                => ['required'],
        ];

        if ($berkas) {
            $data['dokumen']            = ['required','file','max:2048'];
        }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validator(1));
        $data['dokumen'] = $request->dokumen->store('public/sk-kades');
        SkKades::create($data);

        return redirect()->route('sk-kades.index')->with('success','SK Kades berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SkKades  $sk_kades
     * @return \Illuminate\Http\Response
     */
    public function show(SkKades $sk_kades)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SkKades  $sk_kades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sk_kades = SkKades::find($id);
        return view('produk-hukum.sk-kades.edit', compact('sk_kades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SkKades  $sk_kades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->validator(1));
        $sk_kades = SkKades::find($id);

        if ($request->dokumen) {
            if ($sk_kades->dokumen) {
                File::delete(storage_path('app/' . $sk_kades->dokumen));
            }
            $data['dokumen'] = $request->dokumen->store('public/sk-kades');
        }

        $sk_kades->update($data);

        return back()->with('success','SK Kades berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SkKades  $sk_kades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sk_kades = SkKades::find($id);
        if ($sk_kades->dokumen) {
            File::delete(storage_path('app/' . $sk_kades->dokumen));
        }
        $sk_kades->delete();
        return back()->with('success','SK Kades berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SkKades  $sk_kades
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $sk_kades = SkKades::find($id);
            if ($sk_kades->dokumen) {
                File::delete(storage_path('app/' . $sk_kades->dokumen));
            }
            $sk_kades->delete();
        }

        return response()->json([
            'message'   => 'SK Kades berhasil dihapus'
        ]);
    }

    public function download(SkKades $sk_kades)
    {
        return response()->download(storage_path('app/'.$sk_kades->dokumen),$sk_kades->judul_dokumen.'.'.substr(strrchr(storage_path('app/'.$sk_kades->dokumen),'.'),1));
    }

    public function aktifkan(SkKades $sk_kades)
    {
        $sk_kades->aktif = 1;
        $sk_kades->save();
        return back()->with('success','SK Kades berhasil diaktifkan');
    }

    public function nonaktifkan(SkKades $sk_kades)
    {
        $sk_kades->aktif = 0;
        $sk_kades->save();
        return back()->with('success','SK Kades berhasil dinonaktifkan');
    }

    public function print(Request $request)
    {
        $request->validate([
            'diketahui'         => ['required','numeric'],
            'ditandatangani'    => ['required','numeric']
        ]);

        $desa = Desa::find(1);
        $diketahui = PemerintahanDesa::find($request->diketahui);
        $ditandatangani = PemerintahanDesa::find($request->ditandatangani);

        if ($request->tahun) {
            $sk_kades = SkKades::whereYear('tanggal_keputusan_kades', $request->tahun)->latest()->get();
        } else {
            $sk_kades = SkKades::latest()->get();
        }

        return view('produk-hukum.sk-kades.print', compact('sk_kades','desa','ditandatangani','diketahui'));
    }
}
