<?php

namespace App\Http\Controllers;

use App\Desa;
use App\KodeSurat;
use App\PemerintahanDesa;
use App\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surat_keluar = SuratKeluar::orderBy('nomor_urut')->paginate(10);

        if ($request->cari) {
            $surat_keluar = SuratKeluar::where('tujuan','like',"%{$request->cari}%")
                            ->orWhere('isi_singkat_atau_perihal','like',"%{$request->cari}%")
                            ->orWhere('nomor_urut','like',"%{$request->cari}%")
                            ->orderBy('nomor_urut')->paginate(10);
        }

        $surat_keluar->appends($request->only('cari'));
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        return view('surat-keluar.index', compact('surat_keluar','pemerintahan_desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode_surat = KodeSurat::all();
        $desa = Desa::find(1);
        return view('surat-keluar.create', compact('kode_surat','desa'));
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
            'nomor_urut'                => ['required','numeric','unique:surat_keluar,nomor_urut'],
            'nomor_surat'               => ['required','numeric'],
            'kode_surat_id'             => ['required','numeric'],
            'tanggal_surat'             => ['required','date'],
            'tujuan'                    => ['required','string','max:128'],
            'isi_singkat_atau_perihal'  => ['required'],
            'berkas'                    => ['required','file','max:2048'],
        ],[
            'kode_surat_id.required'    => 'kode surat wajib diisi.'
        ]);

        if ($request->berkas) {
            $data['berkas'] = $request->berkas->storeAs('public/surat-keluar', $request->berkas->getClientOriginalName());
        }

        SuratKeluar::create($data);
        $desa = Desa::find(1);
        $desa->penomoran_surat == 1 ? $desa->nomor_surat_keluar += 1 : $desa->nomor_surat += 1;
        $desa->save();

        return redirect()->route('surat-keluar.index')->with('success','Surat keluar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratKeluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $surat_keluar)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratKeluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKeluar $surat_keluar)
    {
        $kode_surat = KodeSurat::all();
        return view('surat-keluar.edit', compact('kode_surat', 'surat_keluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratKeluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKeluar $surat_keluar)
    {
        $data = $request->validate([
            'nomor_urut'                => ['required','numeric',Rule::unique('surat_keluar','nomor_urut')->ignore($surat_keluar)],
            'nomor_surat'               => ['required','numeric'],
            'kode_surat_id'             => ['required','numeric'],
            'tanggal_surat'             => ['required','date'],
            'tujuan'                    => ['required','string','max:128'],
            'isi_singkat_atau_perihal'  => ['required'],
            'berkas'                    => ['nullable','file','max:2048'],
        ],[
            'kode_surat_id.required'    => 'kode surat wajib diisi.'
        ]);

        if ($request->berkas) {
            if ($surat_keluar->berkas) {
                File::delete(storage_path('app/' . $surat_keluar->berkas));
            }
            $data['berkas'] = $request->berkas->storeAs('public/surat-keluar', $request->berkas->getClientOriginalName());
        }

        $surat_keluar->update($data);
        return back()->with('success','Surat keluar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratKeluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratKeluar $surat_keluar)
    {
        $surat_keluar->delete();
        return back()->with('success','Surat keluar berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratKeluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        SuratKeluar::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Surat keluar berhasil dihapus'
        ]);
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

        $tahun = $request->tahun;
        if ($tahun) {
            $surat_keluar = SuratKeluar::whereYear('tanggal_penerimaan', $tahun)->latest()->get();
        } else {
            $surat_keluar = SuratKeluar::latest()->get();
        }

        return view('surat-keluar.print', compact('surat_keluar','tahun','desa','ditandatangani','diketahui'));
    }
}
