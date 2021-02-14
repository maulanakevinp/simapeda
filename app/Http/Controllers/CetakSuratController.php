<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Surat;
use Barryvdh\DomPDF\Facade as PDF;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\CetakSurat;
use App\DetailCetak;
use App\Penduduk;
use Illuminate\Http\Request;

class CetakSuratController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id, $slug)
    {
        $surat = Surat::find($id);
        $desa = Desa::find(1);
        if ($slug != Str::slug($surat->nama)) {
            return abort(404, 'Halaman Tidak Ditemukan');
        }

        return view('cetak-surat.create', compact('surat','desa'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'isian.*'               => ['required'],
            'nomor_induk_penduduk'  => ['required']
        ],[
            '*.required' => ['data wajib diisi.']
        ]);

        $penduduk = Penduduk::where('nik', $request->nomor_induk_penduduk)->first();

        if (!$penduduk) {
            return back()->with('error','Mohon maaf anda tidak dapat membuat surat dikarenakan NIK anda tidak terdeteksi sebagai data penduduk. Silahkan ke Kantor Desa untuk konfirmasi');
        }

        $desa = Desa::find(1);
        $surat = Surat::find($id);

        if ($surat->tampilkan == 1) {
            $cetakSurat = CetakSurat::create([
                'nomor'     => $desa->penomoran_surat == 1 ? $desa->nomor_layanan_surat : $desa->nomor_surat,
                'surat_id'  => $id,
                'nik'       => $penduduk->nik,
            ]);

            $desa->penomoran_surat == 1 ? $desa->nomor_layanan_surat += 1 : $desa->nomor_surat += 1;
            $desa->save();

            $i = 1;
            foreach ($request->isian as $isian) {
                DetailCetak::create([
                    'urutan'            => $i,
                    'cetak_surat_id'    => $cetakSurat->id,
                    'isian'             => $isian
                ]);
                $i++;
            }

            $surat->save();
            return redirect('cetak-surat/' . $cetakSurat->id .'?q=' . $cetakSurat->nik);
        } else {
            $image = (string) Image::make(public_path(Storage::url($desa->logo)))->encode('jpg');
            $logo = (string) Image::make($image)->encode('data-url');
            $tanggal = tgl(date('Y-m-d'));
            $kode_desa = substr($desa->kode_desa,0,2) . '.' . substr($desa->kode_desa,2,2) . '.' . substr($desa->kode_desa,4,2) . '.' . substr($desa->kode_desa,6,4);
            $nomor = $desa->penomoran_surat == 1 ? $desa->nomor_layanan_surat : $desa->nomor_surat;
            $isian = [];
            foreach ($request->isian as $item) {
                $isian[] = $item;
            }
            $pdf = PDF::loadView('cetak-surat.show', compact('surat', 'kode_desa', 'desa', 'isian', 'logo', 'tanggal', 'nomor'))->setPaper(array(0,0,609.449,935.433));
            return $pdf->stream($surat->nama . '.pdf');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CetakSurat  $cetakSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(CetakSurat $cetakSurat)
    {
        return view('cetak-surat.edit', compact('cetakSurat'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CetakSurat  $cetakSurat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CetakSurat $cetakSurat)
    {
        if ($request->q != $cetakSurat->nik) {
            return abort(404);
        }
        $desa = Desa::find(1);
        $surat = Surat::find($cetakSurat->surat_id);
        $image = (string) Image::make(public_path(Storage::url($desa->logo)))->encode('jpg');
        $logo = (string) Image::make($image)->encode('data-url');
        $tanggal = tgl(date('Y-m-d', strtotime($cetakSurat->created_at)));
        $kode_desa = substr($desa->kode_desa,0,2) . '.' . substr($desa->kode_desa,2,2) . '.' . substr($desa->kode_desa,4,2) . '.' . substr($desa->kode_desa,6,4);
        $nomor = $cetakSurat->nomor;
        $isian = [];
        foreach ($cetakSurat->detailCetak as $item) {
            $isian[] = $item->isian;
        }
        $pdf = PDF::loadView('cetak-surat.show', compact('surat', 'kode_desa', 'desa', 'isian', 'logo', 'tanggal', 'nomor'))->setPaper(array(0,0,609.449,935.433));
        return $pdf->stream($surat->nama . '.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CetakSurat  $cetakSurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CetakSurat $cetakSurat)
    {
        $request->validate([
            'nomor'     => ['nullable'],
            'isian.*'   => ['required']
        ]);

        $cetakSurat->update(['nomor' => $request->nomor]);

        DetailCetak::where('cetak_surat_id', $cetakSurat->id)->delete();

        foreach ($request->isian as $isian) {
            DetailCetak::create([
                'cetak_surat_id'    => $cetakSurat->id,
                'isian'             => $isian
            ]);
        }

        return back()->with('success','Detail cetak surat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CetakSurat  $cetakSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(CetakSurat $cetakSurat)
    {
        $cetakSurat->delete();
        return back()->with('success','Detail surat berhasil dihapus');
    }
}
