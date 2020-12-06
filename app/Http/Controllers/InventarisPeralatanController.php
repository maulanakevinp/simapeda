<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Desa;
use App\InventarisPeralatan;
use App\PemerintahanDesa;
use Illuminate\Http\Request;

class InventarisPeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peralatan = InventarisPeralatan::where('mutasi',0)->latest()->paginate(10);

        if ($request->cari) {
            $peralatan = InventarisPeralatan::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',0)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisPeralatan::where('mutasi',0)->get() as $item) {
            $total += $item->harga;
        }

        $tahun = InventarisPeralatan::where('mutasi',0)->latest()->get()->groupBy('tahun_pembelian');
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        $peralatan->appends($request->only('cari'));
        return view('inventaris.peralatan.index', compact('peralatan','total','tahun','pemerintahan_desa'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutasi(Request $request)
    {
        $peralatan = InventarisPeralatan::where('mutasi',1)->latest()->paginate(10);

        if ($request->cari) {
            $peralatan = InventarisPeralatan::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',1)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisPeralatan::where('mutasi',1)->get() as $item) {
            $total += $item->harga;
        }

        $peralatan->appends($request->only('cari'));
        return view('inventaris.peralatan.mutasi.index', compact('peralatan','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::where('golongan',2)->get();
        $desa = Desa::find(1);
        return view('inventaris.peralatan.create', compact('barang','desa'));
    }

    private function validator()
    {
        return [
            'nama_barang'           => ['required','string','max:128'],
            'kode_barang'           => ['required','string','max:64'],
            'nomor_register'        => ['required','string','max:64'],
            'merk_atau_type'        => ['required','string','max:128'],
            'ukuran_atau_cc'        => ['required'],
            'bahan'                 => ['required'],
            'tahun_pembelian'       => ['required','digits:4'],
            'nomor_pabrik'          => ['required','string','max:128'],
            'nomor_rangka'          => ['required','string','max:128'],
            'nomor_mesin'           => ['required','string','max:128'],
            'nomor_polisi'          => ['required','string','max:128'],
            'bpkb'                  => ['required','string','max:128'],
            'penggunaan_barang'     => ['required','digits:2'],
            'asal_usul'             => ['required','string','max:64'],
            'harga'                 => ['required','numeric','min:0'],
            'keterangan'            => ['required'],
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
        InventarisPeralatan::create($data);
        return response()->json([
            'message'   => 'Inventaris peralatan dan mesin berhasil ditambahkan',
            'redirect'  => route('peralatan.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventarisPeralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisPeralatan $peralatan)
    {
        $desa = Desa::find(1);
        return view('inventaris.peralatan.show', compact('peralatan','desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisPeralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisPeralatan $peralatan)
    {
        $barang = Barang::where('golongan',2)->get();
        $desa = Desa::find(1);
        return view('inventaris.peralatan.edit', compact('peralatan','barang','desa'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisPeralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function mutasi_edit(InventarisPeralatan $peralatan)
    {
        return view('inventaris.peralatan.mutasi.edit', compact('peralatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisPeralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarisPeralatan $peralatan)
    {
        $data = $request->validate($this->validator());
        $data['mutasi'] = 0;
        $peralatan->update($data);
        return response()->json([
            'message'   => 'Inventaris peralatan dan mesin berhasil diperbarui',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisPeralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function mutasi_update(Request $request, InventarisPeralatan $peralatan)
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

        $peralatan->update($data);

        return response()->json([
            'message'   => 'Mutasi inventaris peralatan dan mesin berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisPeralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisPeralatan $peralatan)
    {
        $peralatan->delete();
        return back()->with('success','Inventaris peralatan dan mesin berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisPeralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        InventarisPeralatan::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Inventaris peralatan dan mesin berhasil dihapus'
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
            $peralatan = InventarisPeralatan::where('mutasi',0)->where('tahun_pembelian', $tahun)->latest()->get();

        } else {
            $peralatan = InventarisPeralatan::where('mutasi',0)->latest()->get();
        }

        foreach ($peralatan as $item) {
            $total += $item->harga;
        }

        return view('inventaris.peralatan.print', compact('desa','ditandatangani','peralatan','tahun','total'));
    }
}
