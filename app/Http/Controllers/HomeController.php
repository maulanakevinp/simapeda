<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Desa;
use App\Gallery;
use App\PemerintahanDesa;
use App\Penduduk;
use App\Perdes;
use App\Perkades;
use App\SkKades;
use App\Surat;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $surat = Surat::whereTampilkan(1)->latest()->get();
        $desa = Desa::find(1);
        $artikel = Artikel::latest()->paginate(10);
        $gallery = Gallery::where('slider', 1)->latest()->get();
        $pemerintahan_desa = PemerintahanDesa::all();
        $galleries = Gallery::where('slider', null)->inRandomOrder()->limit(7)->get();

        if ($request->cari) {
            $artikel = Artikel::where('judul','like',"%{$request->cari}%")
            ->orWhere('konten','like',"%{$request->cari}%")
            ->orWhere('menu','like',"%{$request->cari}%")
            ->orWhere('submenu','like',"%{$request->cari}%")
            ->orWhere('sub_submenu','like',"%{$request->cari}%")
            ->orderBy('id','desc')->paginate(10);
        }

        $artikel->appends($request->only('cari'));

        return view('index', compact('surat', 'desa', 'gallery','galleries','artikel','pemerintahan_desa'));
    }

    public function dashboard()
    {
        $surat = Surat::all();
        $hari = 0;
        $bulan = 0;
        $tahun = 0;
        $totalCetakSurat = 0;
        $totalPenduduk = new Penduduk();

        foreach ($surat as $value) {
            if (count($value->cetakSurat) != 0) {
                foreach ($value->cetakSurat as $cetakSurat) {
                    if (date('Y-m-d', strtotime($cetakSurat->created_at)) == date('Y-m-d')) {
                        $hari = $hari + 1;
                    }
                    if (date('Y-m', strtotime($cetakSurat->created_at)) == date('Y-m')) {
                        $bulan = $bulan + 1;
                    }
                    if (date('Y', strtotime($cetakSurat->created_at)) == date('Y')) {
                        $tahun = $tahun + 1;
                    }
                    $totalCetakSurat = $totalCetakSurat + 1;
                }
            }
        }

        return view('dashboard', compact('surat','hari','bulan','tahun','totalCetakSurat','totalPenduduk'));
    }

    public function suratHarian(Request $request)
    {
        $date = $request->tanggal ? date('Y-m-d',strtotime($request->tanggal)) : date('Y-m-d');
        $surat = Surat::all();
        $data = array();
        foreach ($surat as $value) {
            if (count($value->cetakSurat) == 0) {
                $nilai = 0;
            } else {
                $nilai = 0;
                foreach ($value->cetakSurat as $cetakSurat) {
                    if (date('Y-m-d', strtotime($cetakSurat->created_at)) == $date) {
                        $nilai = $nilai + 1;
                    }
                }
            }

            array_push($data, [$value->nama,$nilai]);
        }

        return response()->json($data);
    }

    public function suratBulanan(Request $request)
    {
        $date = $request->bulan ? date('Y-m',strtotime($request->bulan)) : date('Y-m');
        $surat = Surat::all();
        $data = array();
        foreach ($surat as $value) {
            if (count($value->cetakSurat) == 0) {
                $nilai = 0;
            } else {
                $nilai = 0;
                foreach ($value->cetakSurat as $cetakSurat) {
                    if (date('Y-m', strtotime($cetakSurat->created_at)) == $date) {
                        $nilai = $nilai + 1;
                    }
                }
            }

            array_push($data, [$value->nama,$nilai]);
        }

        return response()->json($data);
    }

    public function suratTahunan(Request $request)
    {
        $date = $request->tahun ? $request->tahun : date('Y');
        $surat = Surat::all();
        $data = array();
        foreach ($surat as $value) {
            if (count($value->cetakSurat) == 0) {
                $nilai = 0;
            } else {
                $nilai = 0;
                foreach ($value->cetakSurat as $cetakSurat) {
                    if (date('Y', strtotime($cetakSurat->created_at)) == $date) {
                        $nilai = $nilai + 1;
                    }
                }
            }

            array_push($data, [$value->nama,$nilai]);
        }

        return response()->json($data);
    }

    public function panduan()
    {
        $desa = Desa::find(1);
        return view('panduan', compact('desa'));
    }

    public function produk_hukum(Request $request)
    {
        if ($request->kategori == 'sk-kades') {
            $produk_hukum   = SkKades::where('aktif',1)->paginate(10);
        } elseif ($request->kategori == 'perdes') {
            $produk_hukum   = Perdes::where('aktif',1)->paginate(10);
        } elseif ($request->kategori == 'perkades') {
            $produk_hukum   = Perkades::where('aktif',1)->paginate(10);
        } else {
            return redirect('produk-hukum?kategori=sk-kades');
        }

        $desa = Desa::find(1);

        return view('produk-hukum.index', compact('produk_hukum','desa'));
    }

    public function load_gallery()
    {
        $galleries = Gallery::where('slider', null)->latest()->paginate(9);
        return response()->json($galleries);
    }
}
