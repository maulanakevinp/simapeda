<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Desa;
use App\InventarisGedung;
use App\PemerintahanDesa;
use Illuminate\Http\Request;

class InventarisGedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gedung = InventarisGedung::where('mutasi',0)->latest()->paginate(10);

        if ($request->cari) {
            $gedung = InventarisGedung::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',0)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisGedung::where('mutasi',0)->get() as $item) {
            $total += $item->harga;
        }

        $tahun = InventarisGedung::where('mutasi',0)->latest()->get()->groupBy('tahun_pengadaan');
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        $gedung->appends($request->only('cari'));
        return view('inventaris.gedung.index', compact('gedung','total','tahun','pemerintahan_desa'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutasi(Request $request)
    {
        $gedung = InventarisGedung::where('mutasi',1)->latest()->paginate(10);

        if ($request->cari) {
            $gedung = InventarisGedung::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',1)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisGedung::where('mutasi',1)->get() as $item) {
            $total += $item->harga;
        }

        $gedung->appends($request->only('cari'));
        return view('inventaris.gedung.mutasi.index', compact('gedung','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::where('golongan',3)->get();
        $desa = Desa::find(1);
        return view('inventaris.gedung.create', compact('barang','desa'));
    }

    private function validator()
    {
        return [
            'nama_barang'               => ['required','string','max:128'],
            'kode_barang'               => ['required','string','max:64'],
            'nomor_register'            => ['required','string','max:64'],
            'kondisi_bangunan'          => ['required','string','max:64'],
            'bangunan_bertingkat'       => ['required','numeric','min:1'],
            'kontruksi_beton'           => ['required','numeric'],
            'luas_bangunan'             => ['required','numeric','min:1'],
            'letak_atau_lokasi'         => ['required'],
            'tahun_pengadaan'           => ['required','digits:4'],
            'nomor_bangunan'            => ['required','string','max:128'],
            'tanggal_dokumen_bangunan'  => ['required','date'],
            'status_tanah'              => ['required','string','max:128'],
            'luas_tanah'                => ['required','numeric','min:1'],
            'nomor_kode_tanah'          => ['required','string','max:128'],
            'penggunaan_barang'         => ['required','digits:2'],
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
        InventarisGedung::create($data);
        return response()->json([
            'message'   => 'Inventaris gedung dan bangunan berhasil ditambahkan',
            'redirect'  => route('gedung.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventarisGedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisGedung $gedung)
    {
        $desa = Desa::find(1);
        return view('inventaris.gedung.show', compact('gedung','desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisGedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisGedung $gedung)
    {
        $barang = Barang::where('golongan',3)->get();
        $desa = Desa::find(1);
        return view('inventaris.gedung.edit', compact('gedung','barang','desa'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisGedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function mutasi_edit(InventarisGedung $gedung)
    {
        return view('inventaris.gedung.mutasi.edit', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisGedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarisGedung $gedung)
    {
        $data = $request->validate($this->validator());
        $data['mutasi'] = 0;
        $gedung->update($data);
        return response()->json([
            'message'   => 'Inventaris gedung dan bangunan berhasil diperbarui',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisGedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function mutasi_update(Request $request, InventarisGedung $gedung)
    {
        $validator = [
            'jenis_mutasi'      => ['required','string','max:64'],
            'tahun_mutasi'      => ['required','date'],
            'mutasi'            => ['required','numeric'],
            'keterangan_mutasi' => ['required'],
        ];

        if ($request->jenis_mutasi == 'Masih Baik Disumbangkan' || $request->jenis_mutasi == 'Barang Rusak Disumbangkan') {
            $validator['disumbangkan'] = ['required','string','max:128'];
        }

        if ($request->jenis_mutasi == 'Masih Baik Dijual' || $request->jenis_mutasi == 'Barang Rusak Dijual') {
            $validator['harga_jual'] = ['required','numeric','min:1'];
        }

        $data = $request->validate($validator);

        $gedung->update($data);

        return response()->json([
            'message'   => 'Mutasi inventaris gedung dan bangunan berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisGedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisGedung $gedung)
    {
        $gedung->delete();
        return back()->with('success','Inventaris gedung dan bangunan berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisGedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        InventarisGedung::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Inventaris gedung dan bangunan berhasil dihapus'
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
            $gedung = InventarisGedung::where('mutasi',0)->where('tahun_pengadaan', $tahun)->latest()->get();

        } else {
            $gedung = InventarisGedung::where('mutasi',0)->latest()->get();
        }

        foreach ($gedung as $item) {
            $total += $item->harga;
        }

        return view('inventaris.gedung.print', compact('desa','ditandatangani','gedung','tahun','total'));
    }
}
