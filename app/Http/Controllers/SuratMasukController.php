<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Disposisi;
use App\KodeSurat;
use App\PemerintahanDesa;
use App\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surat_masuk = SuratMasuk::orderBy('nomor_urut')->paginate(10);

        if ($request->cari) {
            $surat_masuk = SuratMasuk::where('pengirim','like',"%{$request->cari}%")
                            ->orWhere('isi_singkat_atau_perihal','like',"%{$request->cari}%")
                            ->orWhere('nomor_urut','like',"%{$request->cari}%")
                            ->orWhere('nomor_surat','like',"%{$request->cari}%")
                            ->orderBy('nomor_urut')->paginate(10);
        }

        $surat_masuk->appends($request->only('cari'));
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        return view('surat-masuk.index', compact('surat_masuk','pemerintahan_desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode_surat = KodeSurat::all();
        $pemerintahan_desa = PemerintahanDesa::all();
        $desa = Desa::find(1);
        return view('surat-masuk.create', compact('kode_surat', 'pemerintahan_desa', 'desa'));
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
            'nomor_urut'                => ['required','numeric','unique:surat_masuk,nomor_urut'],
            'tanggal_penerimaan'        => ['required','date'],
            'nomor_surat'               => ['required','numeric'],
            'kode_surat_id'             => ['required','numeric'],
            'tanggal_surat'             => ['required','date'],
            'pengirim'                  => ['required','string','max:128'],
            'isi_singkat_atau_perihal'  => ['required'],
            'isi_disposisi'             => ['required'],
            'berkas'                    => ['required','file','max:2048'],
        ],[
            'kode_surat_id.required'    => 'kode surat wajib diisi.'
        ]);

        if ($request->berkas) {
            $data['berkas'] = $request->berkas->storeAs('public/surat-masuk', $request->berkas->getClientOriginalName());
        }

        $surat_masuk = SuratMasuk::create($data);
        $desa = Desa::find(1);
        $desa->penomoran_surat == 1 ? $desa->nomor_surat_masuk += 1 : $desa->nomor_surat += 1;
        $desa->save();

        if ($request->pemerintahan_desa_id) {
            foreach ($request->pemerintahan_desa_id as $item) {
                Disposisi::create([
                    'surat_masuk_id'        => $surat_masuk->id,
                    'pemerintahan_desa_id'  => $item,
                ]);
            }
        }

        return redirect()->route('surat-masuk.index')->with('success','Surat masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratMasuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $surat_masuk)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratMasuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $surat_masuk)
    {
        $kode_surat = KodeSurat::all();
        $pemerintahan_desa = PemerintahanDesa::all();
        return view('surat-masuk.edit', compact('kode_surat', 'pemerintahan_desa', 'surat_masuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratMasuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratMasuk $surat_masuk)
    {
        $data = $request->validate([
            'nomor_urut'                => ['required','numeric',Rule::unique('surat_masuk','nomor_urut')->ignore($surat_masuk)],
            'tanggal_penerimaan'        => ['required','date'],
            'nomor_surat'               => ['required','numeric'],
            'kode_surat_id'             => ['nullables','numeric'],
            'tanggal_surat'             => ['required','date'],
            'pengirim'                  => ['required','string','max:128'],
            'isi_singkat_atau_perihal'  => ['required'],
            'isi_disposisi'             => ['required'],
            'berkas'                    => ['nullable','file','max:2048'],
        ],[
            'kode_surat_id.required'    => 'kode surat wajib diisi.'
        ]);


        if ($request->berkas) {
            if ($surat_masuk->berkas) {
                File::delete(storage_path('app/' . $surat_masuk->berkas));
            }
            $data['berkas'] = $request->berkas->storeAs('public/surat-masuk', $request->berkas->getClientOriginalName());
        }

        $surat_masuk->update($data);

        Disposisi::where('surat_masuk_id', $surat_masuk->id)->delete();
        foreach ($request->pemerintahan_desa_id as $item) {
            Disposisi::create([
                'surat_masuk_id'        => $surat_masuk->id,
                'pemerintahan_desa_id'  => $item,
            ]);
        }

        return back()->with('success','Surat masuk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratMasuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratMasuk $surat_masuk)
    {
        if ($surat_masuk->berkas) {
            File::delete(storage_path('app/' . $surat_masuk->berkas));
        }
        $surat_masuk->delete();
        return back()->with('success','Surat masuk berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratMasuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        SuratMasuk::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Surat masuk berhasil dihapus'
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
            $surat_masuk = SuratMasuk::whereYear('tanggal_penerimaan', $tahun)->latest()->get();
        } else {
            $surat_masuk = SuratMasuk::latest()->get();
        }

        return view('surat-masuk.print', compact('surat_masuk','tahun','desa','ditandatangani','diketahui'));
    }
}
