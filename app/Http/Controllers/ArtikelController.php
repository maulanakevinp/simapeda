<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\ArtikelGallery;
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
        $artikel = Artikel::select('id','gambar','judul','dilihat','slide','created_at')->orderBy('id','desc')->paginate(12);

        if ($request->cari) {
            $artikel = Artikel::select('id','gambar','judul','dilihat','slide','created_at')->where('judul','like',"%{$request->cari}%")
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
            'judul'         => ['required','string','max:191'],
            'konten'        => ['required'],
            'gambar'        => ['nullable','image','max:2048'],
            'menu'          => ['required_with:submenu','max:32'],
            'submenu'       => ['required_with:sub_submenu','max:32'],
            'sub_submenu'   => ['nullable','string','max:32'],
            'galleries.*'   => ['required'],
        ],[
            'galleries.*.required' => 'gambar wajib diisi'
        ]);

        $data['menu'] = $request->menu ? strtoupper($request->menu) : null;
        $data['caption'] = $request->caption_gambar;

        if ($request->gambar) {
            $data['gambar'] = $request->gambar->store('public/artikel');
        }

        unset($data['galleries'],$data['caption_gambar']);
        $artikel = Artikel::create($data);

        if ($request->gallery) {
            foreach ($request->gallery as $key => $item) {
                ArtikelGallery::create([
                    'artikel_id'    => $artikel->id,
                    'gambar'        => $request->gallery[$key]->store('public/artikel'),
                    'caption'       => $request->caption[$key]
                ]);
            }
        }

        return response()->json([
            'message'   => 'Artikel berhasil ditambahkan',
            'redirect'  => strval(route('artikel.index'))
        ]);
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

            foreach ($artikels as $item) {
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

            $artikel->update(['dilihat' => $artikel->dilihat + 1]);
            $before = Artikel::select('id','judul','menu','submenu','sub_submenu')->where('id','<',$artikel->id)->orderBy('id','desc')->first();
            $next = Artikel::select('id','judul','menu','submenu','sub_submenu')->where('id','>',$artikel->id)->first();
            return view('artikel.show',compact('artikel','desa','artikels','before','next'));
        } elseif ($view == false && $views == true) {
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
            'caption'       => ['nullable','string'],
            'judul'         => ['required','string','max:191'],
            'konten'        => ['required'],
            'gambar'        => ['nullable','image','max:2048'],
            'menu'          => ['required_with:submenu','max:32'],
            'submenu'       => ['required_with:sub_submenu','max:32'],
            'sub_submenu'   => ['nullable','string','max:32'],
        ]);

        $data['menu'] = $request->menu ? strtoupper($request->menu) : null;
        if ($request->gambar) {
            if ($artikel->gambar) {
                File::delete(storage_path('app/' . $artikel->gambar));
            }
            $data['gambar'] = $request->gambar->store('public/artikel');
        }

        $artikel->update($data);

        return response()->json([
            'message'   => 'Artikel berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar) {
            File::delete(storage_path('app/' . $artikel->gambar));
        }

        foreach ($artikel->galleries as $item) {
            File::delete(storage_path('app/' . $item->gambar));
            $item->delete();
        }

        $artikel->delete();

        return back()->with('success','Artikel berhasil dihapus');
    }

    public function slide(Artikel $artikel)
    {
        if($artikel->slide == 0) {
            $artikel->slide = 1;
            $artikel->save();
            return back()->with('success','Artikel berhasil dimasukkan ke dalam slide');
        } else {
            $artikel->slide = 0;
            $artikel->save();
            return back()->with('success','Artikel berhasil dikeluarkan dari slide');
        }
    }
}
