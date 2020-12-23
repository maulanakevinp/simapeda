<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Desa;
use App\InventarisAsset;
use App\PemerintahanDesa;
use Illuminate\Http\Request;

class InventarisAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $asset = InventarisAsset::where('mutasi',0)->latest()->paginate(10);

        if ($request->cari) {
            $asset = InventarisAsset::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',0)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisAsset::where('mutasi',0)->get() as $item) {
            $total += $item->harga;
        }

        $tahun = InventarisAsset::where('mutasi',0)->latest()->get()->groupBy('tahun_pengadaan');
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        $asset->appends($request->only('cari'));
        return view('inventaris.asset.index', compact('asset','total','tahun','pemerintahan_desa'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutasi(Request $request)
    {
        $asset = InventarisAsset::where('mutasi',1)->latest()->paginate(10);

        if ($request->cari) {
            $asset = InventarisAsset::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',1)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisAsset::where('mutasi',1)->get() as $item) {
            $total += $item->harga;
        }

        $asset->appends($request->only('cari'));
        return view('inventaris.asset.mutasi.index', compact('asset','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::where('golongan',5)->get();
        $desa = Desa::find(1);
        return view('inventaris.asset.create', compact('barang','desa'));
    }

    private function validator($jenis_asset)
    {
        $validator = [
            'nama_barang'               => ['required','string','max:128'],
            'kode_barang'               => ['required','string','max:64'],
            'nomor_register'            => ['required','string','max:64'],
            'jenis_asset'               => ['required','string','max:64'],
            'jumlah'                    => ['required','numeric','min:1'],
            'tahun_pengadaan'           => ['required','digits:4'],
            'penggunaan_barang'         => ['required','digits:2'],
            'asal_usul'                 => ['required','string','max:64'],
            'harga'                     => ['required','numeric','min:0'],
            'keterangan'                => ['required'],
        ];

        switch ($jenis_asset) {
            case 'Buku':
                $validator['judul_dan_pencipta_buku']   = ['required','string','max:128'];
                $validator['spesifikasi_buku']          = ['required','string','max:128'];
                break;

            case 'Barang Kesenian':
                $validator['asal_daerah_kesenian']      = ['required','string','max:128'];
                $validator['pencipta_kesenian']         = ['required','string','max:128'];
                $validator['bahan_kesenian']            = ['required','string','max:128'];
                break;

            case 'Hewan Ternak':
                $validator['jenis_hewan_ternak']        = ['required','string','max:128'];
                $validator['ukuran_hewan_ternak']       = ['required','numeric','min:1'];
                break;

            case 'Tumbuhan':
                $validator['jenis_tumbuhan']            = ['required','string','max:128'];
                $validator['ukuran_tumbuhan']           = ['required','numeric','min:1'];
                break;
        }

        return $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validator($request->jenis_asset));
        $data['mutasi'] = 0;
        InventarisAsset::create($data);
        return response()->json([
            'message'   => 'Inventaris asset tetap lainnya berhasil ditambahkan',
            'redirect'  => route('asset.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventarisAsset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisAsset $asset)
    {
        $desa = Desa::find(1);
        return view('inventaris.asset.show', compact('asset','desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisAsset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisAsset $asset)
    {
        $barang = Barang::where('golongan',5)->get();
        $desa = Desa::find(1);
        return view('inventaris.asset.edit', compact('asset','barang','desa'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisAsset  $asset
     * @return \Illuminate\Http\Response
     */
    public function mutasi_edit(InventarisAsset $asset)
    {
        return view('inventaris.asset.mutasi.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisAsset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarisAsset $asset)
    {
        $data = $request->validate($this->validator($request->jenis_asset));
        $data['mutasi'] = 0;

        switch ($request->jenis_asset) {
            case 'Buku':
                $data['asal_daerah_kesenian']      = null;
                $data['pencipta_kesenian']         = null;
                $data['bahan_kesenian']            = null;
                $data['jenis_hewan_ternak']        = null;
                $data['ukuran_hewan_ternak']       = null;
                $data['jenis_tumbuhan']            = null;
                $data['ukuran_tumbuhan']           = null;
                break;

            case 'Barang Kesenian':
                $data['judul_dan_pencipta_buku']   = null;
                $data['spesifikasi_buku']          = null;
                $data['jenis_hewan_ternak']        = null;
                $data['ukuran_hewan_ternak']       = null;
                $data['jenis_tumbuhan']            = null;
                $data['ukuran_tumbuhan']           = null;
                break;

            case 'Hewan Ternak':
                $data['judul_dan_pencipta_buku']   = null;
                $data['spesifikasi_buku']          = null;
                $data['asal_daerah_kesenian']      = null;
                $data['pencipta_kesenian']         = null;
                $data['bahan_kesenian']            = null;
                $data['jenis_tumbuhan']            = null;
                $data['ukuran_tumbuhan']           = null;
                break;

            case 'Tumbuhan':
                $data['judul_dan_pencipta_buku']   = null;
                $data['spesifikasi_buku']          = null;
                $data['asal_daerah_kesenian']      = null;
                $data['pencipta_kesenian']         = null;
                $data['bahan_kesenian']            = null;
                $data['jenis_hewan_ternak']        = null;
                $data['ukuran_hewan_ternak']       = null;
                break;
        }

        $asset->update($data);
        return response()->json([
            'message'   => 'Inventaris asset tetap lainnya berhasil diperbarui',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisAsset  $asset
     * @return \Illuminate\Http\Response
     */
    public function mutasi_update(Request $request, InventarisAsset $asset)
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

        $asset->update($data);

        return response()->json([
            'message'   => 'Mutasi inventaris asset tetap lainnya berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisAsset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisAsset $asset)
    {
        $asset->delete();
        return back()->with('success','Inventaris asset tetap lainnya berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisAsset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        InventarisAsset::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Inventaris asset tetap lainnya berhasil dihapus'
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
            $asset = InventarisAsset::where('mutasi',0)->where('tahun_pengadaan', $tahun)->latest()->get();

        } else {
            $asset = InventarisAsset::where('mutasi',0)->latest()->get();
        }

        foreach ($asset as $item) {
            $total += $item->harga;
        }

        return view('inventaris.asset.print', compact('desa','ditandatangani','asset','tahun','total'));
    }
}
