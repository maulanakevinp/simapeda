<?php

namespace App\Http\Controllers;

use App\Bantuan;
use App\BantuanPenduduk;
use App\Desa;
use App\Http\Requests\BantuanPendudukRequest;
use App\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BantuanPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Bantuan $bantuan)
    {
        $bantuan_penduduk = BantuanPenduduk::where('bantuan_id', $bantuan->id)->paginate(10);

        if ($request->cari) {
            $bantuan_penduduk = BantuanPenduduk::where('bantuan_id', $bantuan->id)
            ->whereHas('penduduk', function ($penduduk) use ($request) {
                $penduduk->where('nama','like',"%$request->cari%");
                $penduduk->orWhere('nik','like',"%$request->cari%");
                $penduduk->orWhere('kk','like',"%$request->cari%");
            })->orWhere('nomor_kartu_peserta','like',"%$request->cari%")
            ->orWhere('nik','like',"%$request->cari%")
            ->orWhere('tempat_lahir','like',"%$request->cari%")
            ->orWhere('alamat','like',"%$request->cari%")
            ->paginate(10);
        }

        return view('bantuan-penduduk.index', compact('bantuan','bantuan_penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bantuan $bantuan)
    {
        return view('bantuan-penduduk.create', compact('bantuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\BantuanPendudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BantuanPendudukRequest $request)
    {
        $data = $request->validated();

        if ($request->gambar_kartu_peserta) {
            $data['gambar_kartu_peserta'] = $request->gambar_kartu_peserta->store('public/gambar-kartu-peserta');
        }

        $bantuan_penduduk = BantuanPenduduk::create($data);
        return redirect()->route('bantuan-penduduk.index', $bantuan_penduduk->bantuan_id)->with('success','Bantuan Penduduk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BantuanPenduduk  $bantuan_penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(BantuanPenduduk $bantuan_penduduk)
    {
        $bantuan = $bantuan_penduduk->bantuan;
        return view('bantuan-penduduk.edit', compact('bantuan_penduduk','bantuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\BantuanPendudukRequest  $request
     * @param  \App\BantuanPenduduk  $bantuan_penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(BantuanPendudukRequest $request, BantuanPenduduk $bantuan_penduduk)
    {
        $data = $request->validated();

        if ($request->gambar_kartu_peserta) {
            if ($bantuan_penduduk->gambar_kartu_peserta) {
                unlink(storage_path('app/' . $bantuan_penduduk->gambar_kartu_peserta));
            }
            $data['gambar_kartu_peserta'] = $request->gambar_kartu_peserta->store('public/gambar-kartu-peserta');
        }

        $bantuan_penduduk->update($data);
        return redirect()->route('bantuan-penduduk.index', $bantuan_penduduk->bantuan_id)->with('success','Bantuan Penduduk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BantuanPenduduk  $bantuan_penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(BantuanPenduduk $bantuan_penduduk)
    {
        if ($bantuan_penduduk->gambar_kartu_peserta) {
            unlink(storage_path('app/' . $bantuan_penduduk->gambar_kartu_peserta));
        }
        $bantuan_penduduk->delete();
        return back()->with('success','Bantuan Penduduk berhasil dihapus');
    }

    public function print(Bantuan $bantuan)
    {
        $desa = Desa::find(1);
        return view("bantuan-penduduk.print", compact('bantuan','desa'));
    }

    public function cari_penduduk(Penduduk $penduduk)
    {
        $bantuan = null;
        foreach ($penduduk->bantuan_penduduk as $item) {
            $bantuan .= '<button type="button" class="btn btn-sm">'.$item->bantuan->nama_program."</button>";
        }

        return response()->json([
            'nik'                           => $penduduk->nik,
            'nik_penduduk'                  => $penduduk->nik,
            'nama'                          => $penduduk->nama,
            'nama_penduduk'                 => $penduduk->nama,
            'alamat'                        => $penduduk->alamat_sekarang ? $penduduk->alamat_sekarang : $penduduk->alamat_sebelumnya,
            'alamat_penduduk'               => $penduduk->alamat_sekarang ? $penduduk->alamat_sekarang : $penduduk->alamat_sebelumnya,
            'tempat_lahir'                  => $penduduk->tempat_lahir,
            'tanggal_lahir'                 => $penduduk->tanggal_lahir,
            'tempat_tanggal_lahir_penduduk' => $penduduk->tempat_lahir . ', ' . tgl($penduduk->tanggal_lahir),
            'jenis_kelamin_penduduk'        => $penduduk->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan',
            'umur_penduduk'                 => Carbon::parse($penduduk->tanggal_lahir)->diff(Carbon::now())->format('%y tahun'),
            'pendidikan_penduduk'           => $penduduk->pendidikan->nama ?? '-',
            'warga_negara_agama_penduduk'   => $penduduk->kewarganegaraan == 1 ? "WNA" : ($penduduk->kewarganegaraan == 2 ? "WNI" : "Dua Kewarganegaraan") . $penduduk->agama->nama ?? '',
            'bantuan_yang_sedang_diterima'  => $bantuan
        ]);
    }
}
