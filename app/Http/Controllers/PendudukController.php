<?php

namespace App\Http\Controllers;

use App\Agama;
use App\AkseptorKb;
use App\Asuransi;
use App\Darah;
use App\Desa;
use App\Dusun;
use App\Exports\PendudukExport;
use App\Http\Requests\PendudukRequest;
use App\Imports\PendudukImport;
use App\JenisCacat;
use App\JenisKelahiran;
use App\Pekerjaan;
use App\Pendidikan;
use App\Penduduk;
use App\PenolongKelahiran;
use App\SakitMenahun;
use App\StatusHubunganDalamKeluarga;
use App\StatusPenduduk;
use App\StatusPerkawinan;
use App\StatusRekam;
use App\TempatDilahirkan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $penduduk = Penduduk::latest()->paginate(10);

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $penduduk = Penduduk::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $penduduk = Penduduk::where('jenis_kelamin',2)->latest()->paginate(10);
            } elseif ($request->cari == "WNI") {
                $penduduk = Penduduk::where('kewarganegaraan',1)->latest()->paginate(10);
            } elseif ($request->cari == "WNA") {
                $penduduk = Penduduk::where('kewarganegaraan',2)->latest()->paginate(10);
            } elseif ($request->cari == "Dua Kewarganegaraan") {
                $penduduk = Penduduk::where('kewarganegaraan',3)->latest()->paginate(10);
            } else {
                $penduduk = Penduduk::where(function ($penduduk) use ($request) {
                    $penduduk->where('nik', 'like', "%$request->cari%");
                    $penduduk->orWhere('kk', 'like', "%$request->cari%");
                    $penduduk->orWhere('nama', 'like', "%$request->cari%");
                    $penduduk->orWhere('tempat_lahir', 'like', "%$request->cari%");
                    $penduduk->orWhere('tanggal_lahir', 'like', "%$request->cari%");
                    $penduduk->orWhere('nomor_paspor', 'like', "%$request->cari%");
                    $penduduk->orWhere('nomor_kitas_atau_kitap', 'like', "%$request->cari%");
                    $penduduk->orWhere('nik_ayah', 'like', "%$request->cari%");
                    $penduduk->orWhere('nama_ayah', 'like', "%$request->cari%");
                    $penduduk->orWhere('nik_ibu', 'like', "%$request->cari%");
                    $penduduk->orWhere('nama_ibu', 'like', "%$request->cari%");
                    $penduduk->orWhere('alamat_sekarang', 'like', "%$request->cari%");
                    $penduduk->orWhereHas('statusHubunganDalamKeluarga', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                    $penduduk->orWhereHas('pendidikan', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                    $penduduk->orWhereHas('pekerjaan', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                    $penduduk->orWhereHas('agama', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                    $penduduk->orWhereHas('darah', function ($status) use ($request) {
                        $status->where('golongan', 'like', "%$request->cari%");
                    });
                    $penduduk->orWhereHas('statusPerkawinan', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                })->latest()->paginate(10);
            }
        }

        $penduduk->appends(request()->input())->links();
        return view('penduduk.index', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penduduk.create', [
            'agama'                         => Agama::all(),
            'darah'                         => Darah::all(),
            'dusun'                         => Dusun::all(),
            'pekerjaan'                     => Pekerjaan::all(),
            'pendidikan'                    => Pendidikan::all(),
            'pendidikan'                    => Pendidikan::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
            'status_perkawinan'             => StatusPerkawinan::all(),
            'akseptor_kb'                   => AkseptorKb::all(),
            'asuransi'                      => Asuransi::all(),
            'jenis_cacat'                   => JenisCacat::all(),
            'jenis_kelahiran'               => JenisKelahiran::all(),
            'penolong_kelahiran'            => PenolongKelahiran::all(),
            'sakit_menahun'                 => SakitMenahun::all(),
            'status_penduduk'               => StatusPenduduk::all(),
            'status_rekam'                  => StatusRekam::all(),
            'tempat_dilahirkan'             => TempatDilahirkan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendudukRequest $request)
    {
        $data = $request->validated();
        if ($request->foto) {
            $data['foto'] = $request->foto->store('public/gallery');
        }
        Penduduk::create($data);
        return redirect()->route('penduduk.index')->with('success','Penduduk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        $penduduk = Penduduk::where('nik',$nik)->firstOrFail();
        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function detail(Penduduk $penduduk)
    {
        if ($penduduk) {
            return response()->json([
                'success'   => true,
                'data'      => $penduduk
            ]);
        } else {
            return response()->json([
                'success'   => false
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        return view('penduduk.edit', [
            'agama'                         => Agama::all(),
            'darah'                         => Darah::all(),
            'dusun'                         => Dusun::all(),
            'pekerjaan'                     => Pekerjaan::all(),
            'pendidikan'                    => Pendidikan::all(),
            'pendidikan'                    => Pendidikan::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
            'status_perkawinan'             => StatusPerkawinan::all(),
            'akseptor_kb'                   => AkseptorKb::all(),
            'asuransi'                      => Asuransi::all(),
            'jenis_cacat'                   => JenisCacat::all(),
            'jenis_kelahiran'               => JenisKelahiran::all(),
            'penolong_kelahiran'            => PenolongKelahiran::all(),
            'sakit_menahun'                 => SakitMenahun::all(),
            'status_penduduk'               => StatusPenduduk::all(),
            'status_rekam'                  => StatusRekam::all(),
            'tempat_dilahirkan'             => TempatDilahirkan::all(),
            'penduduk'                      => $penduduk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(PendudukRequest $request, Penduduk $penduduk)
    {
        $data = $request->validated();
        if ($request->foto) {
            if ($penduduk->foto) {
                File::delete(storage_path('app/' . $penduduk->foto));
            }
            $data['foto'] = $request->foto->store('public/gallery');
        }

        $penduduk->update($data);
        return redirect()->back()->with('success','Penduduk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        if ($penduduk->foto) {
            File::delete(storage_path('app/' . $penduduk->foto));
        }
        $penduduk->delete();
        return redirect()->back()->with('success','Penduduk berhasil dihapus');
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $value) {
            $penduduk = Penduduk::find($value);
            if ($penduduk->foto) {
                File::delete(storage_path('app/' . $penduduk->foto));
            }
            $penduduk->delete();
        }

        return response()->json([
            'message' => 'Penduduk berhasil dihapus'
        ]);
    }

    public function export()
    {
        return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'xlsx' => ['required','file','max:2048']
        ],[
            'xlsx.required' => 'File wajib diisi'
        ]);

        Excel::import(new PendudukImport, $request->file('xlsx'));
        return redirect()->back()->with('success', 'File xlsx berhasil di import');
    }

    public function printAll()
    {
        $desa = Desa::find(1);
        $penduduk = Penduduk::latest()->get()->groupBy('kk');
        return view('penduduk.print', compact('penduduk','desa'));
    }

    public function printAllKeluarga()
    {
        $desa = Desa::find(1);
        $penduduk = Penduduk::latest()->whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->get();
        return view('penduduk.keluarga.print-all', compact('penduduk','desa'));
    }

    public function printKeluarga($kk)
    {
        $desa = Desa::find(1);
        $penduduk = Penduduk::where('kk', $kk)->orderBy('nomor_urut_dalam_kk')->get();
        return view('penduduk.keluarga.print', compact('penduduk','desa'));
    }

    public function printCalonPemilih()
    {
        $desa = Desa::find(1);
        $penduduk = Penduduk::latest()->whereYear('tanggal_lahir','<', date('Y') - 17)->get();
        return view('penduduk.calon-pemilih.print', compact('penduduk','desa'));
    }

    public function keluarga(Request $request)
    {
        $penduduk = Penduduk::latest()->whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->paginate(10);

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $penduduk = Penduduk::where('jenis_kelamin',1)->whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $penduduk = Penduduk::where('jenis_kelamin',2)->whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->latest()->paginate(10);
            } else {
                $penduduk = Penduduk::where(function ($penduduk) use ($request) {
                    $penduduk->where('nik', 'like', "%$request->cari%");
                    $penduduk->orWhere('kk', 'like', "%$request->cari%");
                    $penduduk->orWhere('nama', 'like', "%$request->cari%");
                    $penduduk->orWhere('alamat_sekarang', 'like', "%$request->cari%");
                    $penduduk->orWhereHas('detailDusun', function ($detail) use ($request) {
                        $detail->whereHas('dusun', function ($dusun) use ($request) {
                            $dusun->where('nama', 'like', "%$request->cari%");
                        });
                        $detail->orWhere('rt', 'like', "%$request->cari%");
                        $detail->orWhere('rw', 'like', "%$request->cari%");
                    });
                })->whereHas('statusHubunganDalamKeluarga', function ($status) {$status->where('nama','Kepala Keluarga');})->latest()->paginate(10);
            }
        }

        $penduduk->appends(request()->input())->links();
        return view('penduduk.keluarga.index', compact('penduduk'));
    }

    public function detailKeluarga($kk)
    {
        $penduduk = Penduduk::where('kk', $kk)->get();
        return view('penduduk.keluarga.show', compact('penduduk'));
    }

    public function calonPemilih(Request $request)
    {
        $penduduk = Penduduk::latest()->whereYear('tanggal_lahir','<', date('Y') - 17)->paginate(20);

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $penduduk = Penduduk::where('jenis_kelamin',1)->whereYear('tanggal_lahir','<', date('Y') - 17)->latest()->paginate(20);
            } elseif ($request->cari == "Perempuan") {
                $penduduk = Penduduk::where('jenis_kelamin',2)->whereYear('tanggal_lahir','<', date('Y') - 17)->latest()->paginate(20);
            } else {
                $penduduk = Penduduk::where(function ($penduduk) use ($request) {
                    $penduduk->where('nik', 'like', "%$request->cari%");
                    $penduduk->orWhere('kk', 'like', "%$request->cari%");
                    $penduduk->orWhere('nama', 'like', "%$request->cari%");
                    $penduduk->orWhere('alamat_sekarang', 'like', "%$request->cari%");
                    $penduduk->orWhereHas('detailDusun', function ($detail) use ($request) {
                        $detail->whereHas('dusun', function ($dusun) use ($request) {
                            $dusun->where('nama', 'like', "%$request->cari%");
                        });
                        $detail->orWhere('rt', 'like', "%$request->cari%");
                        $detail->orWhere('rw', 'like', "%$request->cari%");
                    });
                    $penduduk->orWhereHas('pendidikan', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                    $penduduk->orWhereHas('pekerjaan', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                })->whereYear('tanggal_lahir','<', date('Y') - 17)->latest()->paginate(20);
            }
        }

        $penduduk->appends(request()->input())->links();
        return view('penduduk.calon-pemilih.index', compact('penduduk'));
    }
}
