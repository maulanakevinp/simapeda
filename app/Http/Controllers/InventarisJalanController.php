<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Desa;
use App\InventarisJalan;
use App\PemerintahanDesa;
use Illuminate\Http\Request;

class InventarisJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jalan = InventarisJalan::where('mutasi',0)->latest()->paginate(10);

        if ($request->cari) {
            $jalan = InventarisJalan::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',0)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisJalan::where('mutasi',0)->get() as $item) {
            $total += $item->harga;
        }

        $tahun = InventarisJalan::where('mutasi',0)->latest()->get()->groupBy('tahun_pengadaan');
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        $jalan->appends($request->only('cari'));
        return view('inventaris.jalan.index', compact('jalan','total','tahun','pemerintahan_desa'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutasi(Request $request)
    {
        $jalan = InventarisJalan::where('mutasi',1)->latest()->paginate(10);

        if ($request->cari) {
            $jalan = InventarisJalan::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',1)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisJalan::where('mutasi',1)->get() as $item) {
            $total += $item->harga;
        }

        $jalan->appends($request->only('cari'));
        return view('inventaris.jalan.mutasi.index', compact('jalan','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::where('golongan',4)->get();
        $desa = Desa::find(1);
        return view('inventaris.jalan.create', compact('barang','desa'));
    }

    private function validator()
    {
        return [
            'nama_barang'                   => ['required','string','max:128'],
            'kode_barang'                   => ['required','string','max:64'],
            'nomor_register'                => ['required','string','max:64'],
            'kondisi_bangunan'              => ['required','string','max:64'],
            'kontruksi'                     => ['required'],
            'panjang'                       => ['required','numeric','min:0'],
            'lebar'                         => ['required','numeric','min:0'],
            'luas'                          => ['required','numeric','min:0'],
            'letak_atau_lokasi'             => ['required'],
            'tahun_pengadaan'               => ['required','digits:4'],
            'nomor_kepemilikan'             => ['required','string','max:128'],
            'tanggal_dokumen_kepemilikan'   => ['required','date'],
            'status_tanah'                  => ['required','string','max:128'],
            'nomor_kode_tanah'              => ['required','string','max:128'],
            'penggunaan_barang'             => ['required','digits:2'],
            'asal_usul'                     => ['required','string','max:64'],
            'harga'                         => ['required','numeric','min:0'],
            'keterangan'                    => ['required'],
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
        InventarisJalan::create($data);
        return response()->json([
            'message'   => 'Inventaris jalan, irigasi, dan jaringan berhasil ditambahkan',
            'redirect'  => route('jalan.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventarisJalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisJalan $jalan)
    {
        $desa = Desa::find(1);
        return view('inventaris.jalan.show', compact('jalan','desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisJalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisJalan $jalan)
    {
        $barang = Barang::where('golongan',4)->get();
        $desa = Desa::find(1);
        return view('inventaris.jalan.edit', compact('jalan','barang','desa'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisJalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function mutasi_edit(InventarisJalan $jalan)
    {
        return view('inventaris.jalan.mutasi.edit', compact('jalan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisJalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarisJalan $jalan)
    {
        $data = $request->validate($this->validator());
        $data['mutasi'] = 0;
        $jalan->update($data);
        return response()->json([
            'message'   => 'Inventaris jalan, irigasi, dan jaringan berhasil diperbarui',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisJalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function mutasi_update(Request $request, InventarisJalan $jalan)
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

        $jalan->update($data);

        return response()->json([
            'message'   => 'Mutasi inventaris jalan, irigasi, dan jaringan berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisJalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisJalan $jalan)
    {
        $jalan->delete();
        return back()->with('success','Inventaris jalan, irigasi, dan jaringan berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisJalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        InventarisJalan::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Inventaris jalan, irigasi, dan jaringan berhasil dihapus'
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
            $jalan = InventarisJalan::where('mutasi',0)->where('tahun_pengadaan', $tahun)->latest()->get();

        } else {
            $jalan = InventarisJalan::where('mutasi',0)->latest()->get();
        }

        foreach ($jalan as $item) {
            $total += $item->harga;
        }

        return view('inventaris.jalan.print', compact('desa','ditandatangani','jalan','tahun','total'));
    }
}
