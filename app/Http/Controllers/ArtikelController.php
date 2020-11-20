<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Desa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artikel = Artikel::orderBy('id','desc')->paginate(12);

        if ($request->cari) {
            $artikel = Artikel::where('judul','like',"%{$request->cari}%")
            ->orWhere('konten','like',"%{$request->cari}%")
            ->orWhere('menu','like',"%{$request->cari}%")
            ->orWhere('submenu','like',"%{$request->cari}%")
            ->orWhere('sub_submenu','like',"%{$request->cari}%")
            ->orderBy('id','desc')->paginate(12);
        }

        $artikel->appends($request->only('cari'));
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
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
            'judul'     => ['required','string','max:191'],
            'konten'    => ['required'],
            'gambar'    => ['nullable','image','max:2048'],
            'menu'          => ['nullable','string','max:32'],
            'submenu'       => ['nullable','string','max:32'],
            'sub_submenu'   => ['nullable','string','max:32'],
        ]);

        if ($request->gambar) {
            $data['gambar'] = $request->gambar->store('public/gallery');
        }

        Artikel::create($data);

        return redirect()->route('artikel.index')->with('success','Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $view = false;
        $views = false;
        $artikel = '';
        $desa = Desa::find(1);
        foreach (Artikel::all() as $item) {
            if ($request->segment(1) == Str::slug($item->menu)) {
                if (!$request->segment(2)) {
                    $views = true;
                    $artikel = Artikel::where('menu', $item->menu)->paginate(12);
                    break;
                } elseif ($request->segment(2) == Str::slug($item->submenu)) {
                    if (!$request->segment(3)) {
                        $views = true;
                        $artikel = Artikel::where('menu', $item->menu)->where('submenu', $item->submenu)->paginate(12);
                        break;
                    } elseif ($request->segment(3) == Str::slug($item->sub_submenu)) {
                        if (!$request->segment(4)) {
                            $views = true;
                            $artikel = Artikel::where('menu', $item->menu)->where('submenu', $item->submenu)->where('sub_submenu', $item->sub_submenu)->paginate(12);
                            break;
                        } elseif ($request->segment(4) == $item->id) {
                            if ($request->segment(5) == Str::slug($item->judul)) {
                                $artikel = $item; $view = true; $views = false; break;
                            }
                        }
                    } elseif ($request->segment(3) == $item->id) {
                        if ($request->segment(4) == Str::slug($item->judul)) {
                            $artikel = $item; $view = true; $views = false; break;
                        }
                    }
                } elseif ($request->segment(2) == $item->id) {
                    if ($request->segment(3) == Str::slug($item->judul)) {
                        $artikel = $item; $view = true; $views = false; break;
                    }
                }
            } elseif($request->segment(1) == $item->id) {
                if ($request->segment(2) == Str::slug($item->judul)) {
                    $artikel = $item; $view = true; $views = false; break;
                }
            }
        }

        if ($view == true && $views == false) {
            $artikels = Artikel::where('id','!=', $artikel->id)->inRandomOrder()->limit(3)->get();
            $artikel->update(['dilihat' => $artikel->dilihat + 1]);
            return view('artikel.show',compact('artikel','desa','artikels'));
        } elseif ($view == false && $views == true) {
            return view('artikel.artikel', compact('desa','artikel'));
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $data = $request->validate([
            'judul'         => ['required','string','max:191'],
            'konten'        => ['required'],
            'gambar'        => ['nullable','image','max:2048'],
            'menu'          => ['nullable','string','max:32'],
            'submenu'       => ['nullable','string','max:32'],
            'sub_submenu'   => ['nullable','string','max:32'],
        ]);

        if ($request->gambar) {
            if ($artikel->gambar) {
                File::delete(storage_path('app/' . $artikel->gambar));
            }
            $data['gambar'] = $request->gambar->store('public/gallery');
        }

        $artikel->update($data);

        return back()->with('success','Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return back()->with('success','Artikel berhasil dihapus');
    }
}