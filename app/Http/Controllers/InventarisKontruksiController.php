<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Desa;
use App\InventarisKontruksi;
use App\PemerintahanDesa;
use Illuminate\Http\Request;

class InventarisKontruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kontruksi = InventarisKontruksi::where('mutasi',0)->latest()->paginate(10);

        if ($request->cari) {
            $kontruksi = InventarisKontruksi::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',0)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisKontruksi::where('mutasi',0)->get() as $item) {
            $total += $item->harga;
        }

        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        $kontruksi->appends($request->only('cari'));
        return view('inventaris.kontruksi.index', compact('kontruksi','total','pemerintahan_desa'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutasi(Request $request)
    {
        $kontruksi = InventarisKontruksi::where('mutasi',1)->latest()->paginate(10);

        if ($request->cari) {
            $kontruksi = InventarisKontruksi::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',1)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisKontruksi::where('mutasi',1)->get() as $item) {
            $total += $item->harga;
        }

        $kontruksi->appends($request->only('cari'));
        return view('inventaris.kontruksi.mutasi.index', compact('kontruksi','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::where('golongan',6)->get();
        $desa = Desa::find(1);
        return view('inventaris.kontruksi.create', compact('barang','desa'));
    }

    private function validator()
    {
        return [
            'nama_barang'               => ['required','string','max:128'],
            'fisik_bangunan'            => ['required','string','max:64'],
            'bangunan_bertingkat'       => ['required','numeric','min:1'],
            'kontruksi_beton'           => ['required','numeric'],
            'luas'                      => ['required','numeric','min:1'],
            'letak_atau_lokasi'         => ['required'],
            'nomor_bangunan'            => ['required','string','max:128'],
            'tanggal_dokumen_bangunan'  => ['required','date'],
            'tanggal_mulai'             => ['required','date'],
            'status_tanah'              => ['required','string','max:128'],
            'nomor_kode_tanah'          => ['required','string','max:128'],
            'asal_usul'                 => ['required','string','max:64'],
            'harga'                     => ['required','numeric','min:0'],
            'keterangan'                => ['required'],
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validator());
        $data['mutasi'] = 0;
        InventarisKontruksi::create($data);
        return response()->json([
            'message'   => 'Inventaris kontruksi dalam pengerjaan berhasil ditambahkan',
            'redirect'  => route('kontruksi.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventarisKontruksi  $kontruksi
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisKontruksi $kontruksi)
    {
        $desa = Desa::find(1);
        return view('inventaris.kontruksi.show', compact('kontruksi','desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisKontruksi  $kontruksi
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisKontruksi $kontruksi)
    {
        $barang = Barang::where('golongan',6)->get();
        $desa = Desa::find(1);
        return view('inventaris.kontruksi.edit', compact('kontruksi','barang','desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisKontruksi  $kontruksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarisKontruksi $kontruksi)
    {
        $data = $request->validate($this->validator());
        $data['mutasi'] = 0;
        $kontruksi->update($data);
        return response()->json([
            'message'   => 'Inventaris kontruksi dalam pengerjaan berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisKontruksi  $kontruksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisKontruksi $kontruksi)
    {
        $kontruksi->delete();
        return back()->with('success','Inventaris kontruksi dalam pengerjaan berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisKontruksi  $kontruksi
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        InventarisKontruksi::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Inventaris kontruksi dalam pengerjaan berhasil dihapus'
        ]);
    }

    public function print(Request $request)
    {
        $request->validate([
            'tahun'             => ['nullable'],
            'ditandatangani'    => ['required']
        ]);

        $desa = Desa::find(1);
        $ditandatangani = PemerintahanDesa::find($request->ditandatangani);
        $tahun = $request->tahun;
        $total = 0;

        if ($tahun) {
            $kontruksi = InventarisKontruksi::where('mutasi',0)->whereYear('tanggal_mulai', $tahun)->latest()->get();
        } else {
            $kontruksi = InventarisKontruksi::where('mutasi',0)->latest()->get();
        }

        foreach ($kontruksi as $item) {
            $total += $item->harga;
        }

        return view('inventaris.kontruksi.print', compact('desa','ditandatangani','kontruksi','tahun','total'));
    }
}
