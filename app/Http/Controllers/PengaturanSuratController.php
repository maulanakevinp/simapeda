<?php

namespace App\Http\Controllers;

use App\Desa;
use Illuminate\Http\Request;

class PengaturanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::find(1);
        return view('surat.pengaturan', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'penomoran_surat'       => ['required','numeric'],
            'nomor_layanan_surat'   => ['required_if:penomoran_surat,1','numeric','min:0'],
            'nomor_surat_masuk'     => ['required_if:penomoran_surat,1','numeric','min:0'],
            'nomor_surat_keluar'    => ['required_if:penomoran_surat,1','numeric','min:0'],
            'nomor_surat'           => ['required_if:penomoran_surat,2','numeric','min:0'],
        ],[
            'nomor_layanan_surat.required_if'   => ':attribute wajib diisi ketika :other adalah Nomor berurutan untuk masing-masing surat masuk dan surat keluar; dan untuk semua surat layanan',
            'nomor_surat_masuk.required_if'     => ':attribute wajib diisi ketika :other adalah Nomor berurutan untuk masing-masing surat masuk dan surat keluar; dan untuk semua surat layanan',
            'nomor_surat_keluar.required_if'    => ':attribute wajib diisi ketika :other adalah Nomor berurutan untuk masing-masing surat masuk dan surat keluar; dan untuk semua surat layanan',
            'nomor_surat.required_if'           => ':attribute wajib diisi ketika :other adalah Nomor berurutan untuk seluruh surat masuk, surat keluar dan surat layanan',
        ]);

        $desa = Desa::find(1);
        $desa->update($data);
        return back()->with('success', 'Pengaturan surat berhasil diperbarui');
    }
}
