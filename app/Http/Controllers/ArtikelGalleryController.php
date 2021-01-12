<?php

namespace App\Http\Controllers;

use App\ArtikelGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelGalleryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'artikel_id'=> ['required'],
            'gambar'    => ['required','image','max:2048'],
            'caption'   => ['nullable'],
        ]);

        $data['gambar'] = $request->gambar->store('public/artikel');
        ArtikelGallery::create($data);

        return redirect('artikel/'.$request->artikel_id.'/edit#gallery')->with('success', 'Gambar berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArtikelGallery  $artikel_gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArtikelGallery $artikel_gallery)
    {
        $data = $request->validate([
            'gambar'    => ['nullable','image','max:2048'],
            'caption'   => ['nullable'],
        ]);

        if ($request->gambar) {
            File::delete(storage_path('app/' . $artikel_gallery->gambar));
            $data['gambar'] = $request->gambar->store('public/artikel');
        }

        $artikel_gallery->update($data);

        return response()->json([
            'message'   => 'Gambar berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArtikelGallery  $artikel_gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtikelGallery $artikel_gallery)
    {
        File::delete(storage_path('app/' . $artikel_gallery->gambar));
        $id = $artikel_gallery->artikel_id;
        $artikel_gallery->delete();

        return response()->json([
            'message'   => 'Gambar berhasil diperbarui',
            'redirect'  => url('artikel/'.$id.'/edit#gallery')
        ]);
    }
}
