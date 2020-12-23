<?php

namespace App\Http\Controllers;

use App\Desa;
use App\PemerintahanDesa;
use App\Perdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PerdesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perdes = Perdes::latest()->paginate(10);

        if ($request->cari) {
            $perdes = Perdes::where('judul_dokumen','like',"%{$request->cari}%")
                            ->orWhere('uraian_singkat','like',"%{$request->cari}%")
                            ->latest()->paginate(10);
        }

        $perdes->appends($request->only('cari'));
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        return view('produk-hukum.perdes.index', compact('perdes','pemerintahan_desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk-hukum.perdes.create');
    }

    private function validator($berkas = null)
    {
        $data = [
            'judul_dokumen'                             => ['required','string','max:128'],
            'dokumen'                                   => ['nullable','file','max:2048'],
            'uraian_singkat'                            => ['required'],
            'jenis_peraturan'                           => ['required','string','max:128'],
            'tanggal_ditetapkan'                        => ['required','date'],
            'nomor_ditetapkan'                          => ['required','string','max:128'],
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
        $data['dokumen'] = $request->dokumen->store('public/perdes');
        Perdes::create($data);

        return redirect()->route('perdes.index')->with('success','Perdes berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function show(Perdes $perdes)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perdes = Perdes::find($id);
        return view('produk-hukum.perdes.edit', compact('perdes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->validator(1));
        $perdes = Perdes::find($id);

        if ($request->dokumen) {
            if ($perdes->dokumen) {
                File::delete(storage_path('app/' . $perdes->dokumen));
            }
            $data['dokumen'] = $request->dokumen->store('public/perdes');
        }

        $perdes->update($data);

        return back()->with('success','Perdes berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perdes = Perdes::find($id);
        if ($perdes->dokumen) {
            File::delete(storage_path('app/' . $perdes->dokumen));
        }
        $perdes->delete();
        return back()->with('success','Perdes berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perdes  $perdes
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $perdes = Perdes::find($id);
            if ($perdes->dokumen) {
                File::delete(storage_path('app/' . $perdes->dokumen));
            }
            $perdes->delete();
        }

        return response()->json([
            'message'   => 'Perdes berhasil dihapus'
        ]);
    }

    public function download(Perdes $perdes)
    {
        return response()->download(storage_path('app/'.$perdes->dokumen),$perdes->judul_dokumen.'.'.substr(strrchr(storage_path('app/'.$perdes->dokumen),'.'),1));
    }

    public function aktifkan(Perdes $perdes)
    {
        $perdes->aktif = 1;
        $perdes->save();
        return back()->with('success','Perdes berhasil diaktifkan');
    }

    public function nonaktifkan(Perdes $perdes)
    {
        $perdes->aktif = 0;
        $perdes->save();
        return back()->with('success','Perdes berhasil dinonaktifkan');
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
            $perdes = Perdes::whereYear('tanggal_ditetapkan', $request->tahun)->latest()->get();
        } else {
            $perdes = Perdes::latest()->get();
        }

        return view('produk-hukum.perdes.print', compact('perdes','desa','ditandatangani','diketahui'));
    }
}
