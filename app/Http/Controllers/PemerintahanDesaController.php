<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Desa;
use App\Exports\PemerintahanDesaExport;
use App\Imports\PemerintahanDesaImport;
use App\PemerintahanDesa;
use App\Pendidikan;
use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PemerintahanDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pemerintahan_desa = PemerintahanDesa::latest()->paginate(10);

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $pemerintahan_desa = PemerintahanDesa::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $pemerintahan_desa = PemerintahanDesa::where('jenis_kelamin',2)->latest()->paginate(10);
            } else {
                $pemerintahan_desa = PemerintahanDesa::where(function ($pemerintahan_desa) use ($request) {
                    $pemerintahan_desa->where('nik', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('kk', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('nama', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('nip', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('nipd', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('tempat_lahir', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('tanggal_lahir', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('pangkat_atau_golongan', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('nomor_sk_pengangkatan', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('tanggal_sk_pengangkatan', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('nomor_sk_pemberhentian', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('tanggal_sk_pemberhentian', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('masa_jabatan', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhere('jabatan', 'like', "%$request->cari%");
                    $pemerintahan_desa->orWhereHas('pendidikan', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                    $pemerintahan_desa->orWhereHas('agama', function ($status) use ($request) {
                        $status->where('nama', 'like', "%$request->cari%");
                    });
                })->latest()->paginate(10);
            }
        }

        $pemerintahan_desa->appends(request()->input())->links();
        return view('pemerintahan-desa.index', compact('pemerintahan_desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::all();
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        return view('pemerintahan-desa.create', compact('penduduk','pendidikan','agama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'                      => ['required','string','max:128'],
            'foto'                      => ['nullable','image','max:2048'],
            'nik'                       => ['required','digits:16','unique:pemerintahan_desa,nik'],
            'nip'                       => ['nullable','string','max:32','unique:pemerintahan_desa,nip'],
            'nipd'                      => ['nullable','string','max:32','unique:pemerintahan_desa,nipd'],
            'tempat_lahir'              => ['required','string','max:32'],
            'tanggal_lahir'             => ['required','date','before:'.now()],
            'jenis_kelamin'             => ['required','numeric'],
            'agama_id'                  => ['required','numeric'],
            'pendidikan_id'             => ['required','numeric'],
            'status_pegawai_desa'       => ['required','numeric'],
            'nomor_sk_pengangkatan'     => ['nullable','string','32'],
            'tanggal_sk_pengangkatan'   => ['nullable','date'],
            'nomor_sk_pemberhentian'    => ['nullable','string','32'],
            'tanggal_sk_pemberhentian'  => ['nullable','date'],
            'pangkat_atau_golongan'     => ['nullable','string','max:64'],
            'jabatan'                   => ['required','string','max:32'],
            'masa_jabatan'              => ['nullable','string','max:64'],
        ]);

        if ($request->foto) {
            $data['foto'] = $request->foto->store('public/gallery');
        }

        if ($request->gambar) {
            $data['foto'] = $request->gambar;
        }

        PemerintahanDesa::create($data);
        return redirect()->route('pemerintahan-desa.index')->with('success', 'Aparat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PemerintahanDesa  $pemerintahan_desa
     * @return \Illuminate\Http\Response
     */
    public function show(PemerintahanDesa $pemerintahan_desa)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PemerintahanDesa  $pemerintahan_desa
     * @return \Illuminate\Http\Response
     */
    public function edit(PemerintahanDesa $pemerintahan_desa)
    {
        $penduduk = Penduduk::all();
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        return view('pemerintahan-desa.edit', compact('pemerintahan_desa','penduduk','pendidikan','agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PemerintahanDesa  $pemerintahan_desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemerintahanDesa $pemerintahan_desa)
    {
        $data = $request->validate([
            'nama'                      => ['required','string','max:128'],
            'foto'                      => ['nullable','image','max:2048'],
            'nik'                       => ['required','digits:16',Rule::unique('pemerintahan_desa','nik')->ignore($pemerintahan_desa)],
            'nip'                       => ['nullable','string','max:32',Rule::unique('pemerintahan_desa','nip')->ignore($pemerintahan_desa)],
            'nipd'                      => ['nullable','string','max:32',Rule::unique('pemerintahan_desa','nipd')->ignore($pemerintahan_desa)],
            'tempat_lahir'              => ['required','string','max:32'],
            'tanggal_lahir'             => ['required','date','before:'.now()],
            'jenis_kelamin'             => ['required','numeric'],
            'agama_id'                  => ['required','numeric'],
            'pendidikan_id'             => ['required','numeric'],
            'status_pegawai_desa'       => ['required','numeric'],
            'nomor_sk_pengangkatan'     => ['nullable','string','32'],
            'tanggal_sk_pengangkatan'   => ['nullable','date'],
            'nomor_sk_pemberhentian'    => ['nullable','string','32'],
            'tanggal_sk_pemberhentian'  => ['nullable','date'],
            'pangkat_atau_golongan'     => ['nullable','string','max:64'],
            'jabatan'                   => ['required','string','max:32'],
            'masa_jabatan'              => ['nullable','string','max:64'],
        ]);

        if ($request->foto) {
            if ($pemerintahan_desa->foto) {
                File::delete(storage_path('app/' . $pemerintahan_desa->foto));
            }
            $data['foto'] = $request->foto->store('public/gallery');
        }

        if ($request->gambar) {
            if ($pemerintahan_desa->foto) {
                File::delete(storage_path('app/' . $pemerintahan_desa->foto));
            }
            $data['foto'] = $request->gambar;
        }

        $pemerintahan_desa->update($data);
        return redirect()->route('pemerintahan-desa.index')->with('success', 'Aparat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PemerintahanDesa  $pemerintahan_desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemerintahanDesa $pemerintahan_desa)
    {
        if ($pemerintahan_desa->foto) {
            File::delete(storage_path('app/' . $pemerintahan_desa->foto));
        }
        $pemerintahan_desa->delete();
        return redirect()->back()->with('success','Pemerintahan Desa berhasil dihapus');
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $value) {
            $pemerintahan_desa = PemerintahanDesa::find($value);
            if ($pemerintahan_desa->foto) {
                File::delete(storage_path('app/' . $pemerintahan_desa->foto));
            }
            $pemerintahan_desa->delete();
        }

        return response()->json([
            'message' => 'Pemerintahan Desa berhasil dihapus'
        ]);
    }

    public function export()
    {
        return Excel::download(new PemerintahanDesaExport, 'pemerintahan-desa.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'xlsx' => ['required','file','max:2048']
        ],[
            'xlsx.required' => 'File wajib diisi'
        ]);

        Excel::import(new PemerintahanDesaImport, $request->file('xlsx'));
        return redirect()->back()->with('success', 'File xlsx berhasil di import');
    }

    public function printAll()
    {
        $desa = Desa::find(1);
        $pemerintahan_desa = PemerintahanDesa::latest()->get();
        return view('pemerintahan-desa.print', compact('pemerintahan_desa','desa'));
    }
}
