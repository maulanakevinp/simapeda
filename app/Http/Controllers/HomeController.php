<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Desa;
use App\Gallery;
use App\Penduduk;
use App\Perdes;
use App\Perkades;
use App\SkKades;
use App\Surat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $desa = Desa::find(1);
        $artikel = Artikel::latest()->paginate(10);
        foreach ($artikel as $item) {
            preg_match_all("/<\s*img[^>]*>/", $item->konten, $img);
            foreach($img[0] as $image){
                $item->konten = str_replace($image,'',$item->konten);
            }
            preg_match_all("/<\s*p[^>]*>(.*?)<\s*\/\s*p\s*>/", $item->konten, $konten);
            $item->konten = '';
            foreach($konten[1] as $isi) {
                $item->konten .= $isi . ' ';
            }
        }

        $slide = Artikel::where('slide', 1)->latest()->get();
        foreach ($slide as $item) {
            preg_match_all("/<\s*img[^>]*>/", $item->konten, $img);
            foreach($img[0] as $image){
                $item->konten = str_replace($image,'',$item->konten);
            }
            preg_match_all("/<\s*a[^>]*>(.*?)<\s*\/\s*a\s*>/", $item->konten, $a);
            foreach($a[0] as $tag_a){
                $item->konten = str_replace($tag_a,'',$item->konten);
            }
            preg_match_all("/<\s*p[^>]*>(.*?)<\s*\/\s*p\s*>/", $item->konten, $konten);
            $item->konten = '';
            foreach($konten[1] as $isi) {
                $item->konten .= $isi . ' ';
            }
        }

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

        return view('index', compact('desa', 'slide','galleries','artikel'));
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

    public function produk_hukum(Request $request)
    {
        if ($request->kategori == 'sk-kades') {
            $produk_hukum   = SkKades::select('id','judul_dokumen','nomor_keputusan_kades','tanggal_keputusan_kades','uraian_singkat')->where('aktif',1)->paginate(10);
        } elseif ($request->kategori == 'perdes') {
            $produk_hukum   = Perdes::select('id','judul_dokumen','nomor_ditetapkan','tanggal_ditetapkan','uraian_singkat')->where('aktif',1)->paginate(10);
        } elseif ($request->kategori == 'perkades') {
            $produk_hukum   = Perkades::select('id','judul_dokumen','nomor_keputusan_kades','tanggal_keputusan_kades','uraian_singkat')->where('aktif',1)->paginate(10);
        } else {
            return redirect('produk/hukum?kategori=sk-kades');
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
