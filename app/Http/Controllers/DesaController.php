<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::find(1);
        return view('desa.index', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(),[
                'logo'   => ['required', 'image', 'max:2048']
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error'     => true,
                    'message'   => $validator->errors()->all()
                ]);
            }

            if ($desa->logo != 'logo.png') {
                File::delete(storage_path('app/'.$desa->logo));
            }

            $desa->logo = $request->file('logo')->store('public/logo');
            $desa->save();

            return response()->json([
                'error'     => false,
                'data'      => ['logo'   => $desa->logo]
            ]);
        } else {
            $data = $request->validate([
                'nama_desa'             => ['required', 'max:64', 'string'],
                'kode_desa'             => ['required', 'digits:10'],
                'nama_kecamatan'        => ['required', 'max:64', 'string'],
                'kode_kecamatan'        => ['required', 'digits:6'],
                'nama_kabupaten'        => ['required', 'max:64', 'string'],
                'kode_kabupaten'        => ['required', 'digits:4'],
                'nama_provinsi'         => ['required', 'max:64', 'string'],
                'kode_provinsi'         => ['required', 'digits:2'],
                'kodepos'               => ['required', 'max:8', 'string'],
                'alamat'                => ['required', 'string'],
                'nama_kepala_desa'      => ['required', 'max:64', 'string'],
                'alamat_kepala_desa'    => ['required', 'string'],
                'email'                 => ['nullable', 'max:64', 'string'],
                'telepon'               => ['nullable', 'max:16', 'string'],
                'website'               => ['nullable', 'max:32', 'string'],
                'link_facebook'         => ['nullable', 'url'],
                'link_instagram'        => ['nullable', 'url'],
                'link_twitter'          => ['nullable', 'url'],
                'link_youtube'          => ['nullable', 'url'],
                'link_maps'             => ['nullable'],
            ]);

            $desa->update($data);
            return redirect()->back()->with('success','Profil desa berhasil di perbarui');
        }
    }

    public function pengaturan_surat(Request $request)
    {
        $desa = Desa::find(1);
        $desa->pemerintahan_desa_id = $request->ditandatangani;
        $desa->save();
        return redirect()->back()->with('success','Pengaturan surat berhasil di perbarui');
    }
}
