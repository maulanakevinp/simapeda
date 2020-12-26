<?php

namespace App\Http\Controllers;

use App\Bantuan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bantuan = Bantuan::paginate(10);

        if ($request->cari) {
            $bantuan = Bantuan::where('nama_program','like',"%{$request->cari}%")
                            ->orWhere('keterangan','like',"%{$request->cari}%")
                            ->paginate(10);
        }

        $bantuan->appends($request->only('cari'));
        return view('bantuan.index', compact('bantuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bantuan.create');
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
            'sasaran_program'           => ['required','numeric'],
            'nama_program'              => ['required','string','max:128'],
            'keterangan'                => ['required'],
            'asal_dana'                 => ['required','string','max:64'],
            'tanggal_mulai'             => ['required','date','before:tanggal_berakhir'],
            'tanggal_berakhir'          => ['required','date','after:tanggal_mulai'],
            'status'                    => ['required'],
        ]);

        if ($request->berkas) {
            $data['berkas'] = $request->berkas->storeAs('public/bantuan', $request->berkas->getClientOriginalName());
        }

        Bantuan::create($data);
        return redirect()->route('bantuan.index')->with('success','Bantuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function show(Bantuan $bantuan)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bantuan $bantuan)
    {
        return view('bantuan.edit', compact('bantuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bantuan $bantuan)
    {
        $data = $request->validate([
            'sasaran_program'           => ['required','numeric'],
            'nama_program'              => ['required','string','max:128'],
            'keterangan'                => ['required'],
            'asal_dana'                 => ['required','string','max:64'],
            'tanggal_mulai'             => ['required','date','before:tanggal_berakhir'],
            'tanggal_berakhir'          => ['required','date','after:tanggal_mulai'],
            'status'                    => ['required'],
        ]);

        $bantuan->update($data);
        return back()->with('success','Bantuan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bantuan $bantuan)
    {
        $bantuan->delete();
        return back()->with('success','Bantuan berhasil dihapus');
    }
}
