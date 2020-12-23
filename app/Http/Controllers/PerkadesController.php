<?php

namespace App\Http\Controllers;

use App\Desa;
use App\PemerintahanDesa;
use App\Perkades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PerkadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perkades = Perkades::latest()->paginate(10);

        if ($request->cari) {
            $perkades = Perkades::where('judul_dokumen','like',"%{$request->cari}%")
                            ->orWhere('uraian_singkat','like',"%{$request->cari}%")
                            ->latest()->paginate(10);
        }

        $perkades->appends($request->only('cari'));
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        return view('produk-hukum.perkades.index', compact('perkades','pemerintahan_desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk-hukum.perkades.create');
    }

    private function validator($berkas = null)
    {
        $data = [
            'judul_dokumen'                             => ['required','string','max:128'],
            'dokumen'                                   => ['nullable','file','max:2048'],
            'uraian_singkat'                            => ['required'],
            'jenis_peraturan'                           => ['required','string','max:128'],
            'tanggal_keputusan_kades'                   => ['required','date'],
            'nomor_keputusan_kades'                     => ['required','string','max:128'],
            'tanggal_kesepakatan'                       => ['required','date'],
            'tanggal_dilaporkan'                        => ['required','date'],
            'nomor_dilaporkan'                          => ['required','string','max:128'],
            'tanggal_diundangkan_dalam_lembaran_desa'   => ['required','date'],
            'nomor_diundangkan_dalam_lembaran_desa'     => ['required','string','max:128'],
            'tanggal_diundangkan_dalam_berita_desa'     => ['required','date'],
            'nomor_diundangkan_dalam_berita_desa'       => ['required','string','max:128'],
            'keterangan'                                => ['required'],
        ];

        if ($berkas) {
            $data['dokumen']    = ['required','file','max:2048'];
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
        $data['dokumen'] = $request->dokumen->store('public/perkades');
        Perkades::create($data);

        return redirect()->route('perkades.index')->with('success','Perkades berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perkades  $perkades
     * @return \Illuminate\Http\Response
     */
    public function show(Perkades $perkades)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perkades  $perkades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perkades = Perkades::find($id);
        return view('produk-hukum.perkades.edit', compact('perkades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perkades  $perkades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->validator(1));
        $perkades = Perkades::find($id);

        if ($request->dokumen) {
            if ($perkades->dokumen) {
                File::delete(storage_path('app/' . $perkades->dokumen));
            }
            $data['dokumen'] = $request->dokumen->store('public/perkades');
        }

        $perkades->update($data);

        return back()->with('success','Perkades berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perkades  $perkades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perkades = Perkades::find($id);
        if ($perkades->dokumen) {
            File::delete(storage_path('app/' . $perkades->dokumen));
        }
        $perkades->delete();
        return back()->with('success','Perkades berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perkades  $perkades
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $perkades = Perkades::find($id);
            if ($perkades->dokumen) {
                File::delete(storage_path('app/' . $perkades->dokumen));
            }
            $perkades->delete();
        }

        return response()->json([
            'message'   => 'Perkades berhasil dihapus'
        ]);
    }

    public function download(Perkades $perkades)
    {
        return response()->download(storage_path('app/'.$perkades->dokumen),$perkades->judul_dokumen.'.'.substr(strrchr(storage_path('app/'.$perkades->dokumen),'.'),1));
    }

    public function aktifkan(Perkades $perkades)
    {
        $perkades->aktif = 1;
        $perkades->save();
        return back()->with('success','Perkades berhasil diaktifkan');
    }

    public function nonaktifkan(Perkades $perkades)
    {
        $perkades->aktif = 0;
        $perkades->save();
        return back()->with('success','Perkades berhasil dinonaktifkan');
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
            $perkades = Perkades::whereYear('tanggal_keputusan_kades', $request->tahun)->latest()->get();
        } else {
            $perkades = Perkades::latest()->get();
        }

        return view('produk-hukum.perkades.print', compact('perkades','desa','ditandatangani','diketahui'));
    }
}
