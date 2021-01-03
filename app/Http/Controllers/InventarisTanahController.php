<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Desa;
use App\InventarisTanah;
use App\PemerintahanDesa;
use Illuminate\Http\Request;

class InventarisTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanah = InventarisTanah::where('mutasi',0)->latest()->paginate(10);

        if ($request->cari) {
            $tanah = InventarisTanah::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',0)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisTanah::where('mutasi',0)->get() as $item) {
            $total += $item->harga;
        }

        $tahun = InventarisTanah::where('mutasi',0)->latest()->get()->groupBy('tahun_pengadaan');
        $pemerintahan_desa = PemerintahanDesa::orderBy('urutan')->get();
        $tanah->appends($request->only('cari'));
        return view('inventaris.tanah.index', compact('tanah','total','tahun','pemerintahan_desa'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutasi(Request $request)
    {
        $tanah = InventarisTanah::where('mutasi',1)->latest()->paginate(10);

        if ($request->cari) {
            $tanah = InventarisTanah::where('nama_barang','like',"%{$request->cari}%")->where('mutasi',1)->latest()->paginate(10);
        }

        $total = 0;

        foreach (InventarisTanah::where('mutasi',1)->get() as $item) {
            $total += $item->harga;
        }

        $tanah->appends($request->only('cari'));
        return view('inventaris.tanah.mutasi.index', compact('tanah','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::where('golongan',1)->get();
        $desa = Desa::find(1);
        return view('inventaris.tanah.create', compact('barang','desa'));
    }

    private function validator()
    {
        return [
            'nama_barang'           => ['required','string','max:128'],
            'kode_barang'           => ['required','string','max:64'],
            'nomor_register'        => ['required','string','max:64'],
            'luas_tanah'        => ['required','numeric','min:0'],
            'tahun_pengadaan'       => ['required','digits:4'],
            'letak_atau_alamat'     => ['required'],
            'hak_tanah'         => ['required','string','max:32'],
            'penggunaan_barang'     => ['required','digits:2'],
            'tanggal_sertifikat'    => ['required','date'],
            'nomor_sertifikat'      => ['required','string','max:128'],
            'penggunaan'            => ['required','string','max:64'],
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

        InventarisTanah::create($data);

        return response()->json([
            'message'   => 'Inventaris tanah berhasil ditambahkan',
            'redirect'  => route('tanah.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventarisTanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisTanah $tanah)
    {
        $desa = Desa::find(1);
        return view('inventaris.tanah.show', compact('tanah','desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisTanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisTanah $tanah)
    {
        $barang = Barang::where('golongan',1)->get();
        $desa = Desa::find(1);
        return view('inventaris.tanah.edit', compact('tanah','barang','desa'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarisTanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function mutasi_edit(InventarisTanah $tanah)
    {
        return view('inventaris.tanah.mutasi.edit', compact('tanah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisTanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarisTanah $tanah)
    {
        $data = $request->validate($this->validator());

        $data['mutasi'] = 0;

        $tanah->update($data);

        return response()->json([
            'message'   => 'Inventaris tanah berhasil diperbarui',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventarisTanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function mutasi_update(Request $request, InventarisTanah $tanah)
    {
        $validator = [
            'jenis_mutasi'      => ['required','string','max:64'],
            'tahun_mutasi'      => ['required','date','after:'.$tanah->tanggal_sertifikat],
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

        $tanah->update($data);

        return response()->json([
            'message'   => 'Mutasi inventaris tanah berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisTanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisTanah $tanah)
    {
        $tanah->delete();
        return back()->with('success','Inventaris tanah berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarisTanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        InventarisTanah::whereIn('id', $request->id)->delete();
        return response()->json([
            'message'   => 'Inventaris tanah berhasil dihapus'
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
            $tanah = InventarisTanah::where('mutasi',0)->where('tahun_pengadaan', $tahun)->latest()->get();

        } else {
            $tanah = InventarisTanah::where('mutasi',0)->latest()->get();
        }

        foreach ($tanah as $item) {
            $total += $item->harga;
        }

        return view('inventaris.tanah.print', compact('desa','ditandatangani','tanah','tahun','total'));
    }
}
