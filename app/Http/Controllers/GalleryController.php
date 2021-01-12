<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Gallery;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::find(1);
        return view('gallery.index', compact('desa'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gallery()
    {
        $desa = Desa::find(1);
        return view('gallery.gallery', compact('desa'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informasi()
    {
        $gallery = Gallery::where('slider', 1)->latest()->get();
        return view('gallery.informasi', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar'    => ['required', 'image', 'max:2048'],
            'caption'   => ['nullable', 'string']
        ]);

        Gallery::create([
            'gallery'   => $request->gambar->store('public/gallery'),
            'caption'   => $request->caption,
            'slider'    => $request->slider
        ]);

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'channel_id'    => ['nullable', 'string' ,'max:64'],
        ]);

        $desa = Desa::find(1);
        $desa->update($data);
        $api_key = config('api.key');

        if ($api_key != "KOSONG") {
            Gallery::where('video_id','!=',null)->delete();
            $apiUrl = "https://www.googleapis.com/youtube/v3/search?";
            $part = "part=snippet";
            $channelId = "&channelId=$desa->channel_id";
            $key = "&key=$api_key";
            $maxResults = "&maxResults=50";
            $nextPageToken = "&pageToken=";
            $reload = true;
            $message = null;

            do {
                $youtube = Http::get("{$apiUrl}{$part}{$channelId}{$key}{$maxResults}{$nextPageToken}");
                $youtubeList = $youtube->json();
                if (array_key_exists('items',$youtubeList)) {
                    if (array_key_exists('nextPageToken',$youtubeList)) {
                        $nextPageToken = "&pageToken={$youtubeList['nextPageToken']}";
                    } else {
                        $reload = false;
                    }

                    foreach ($youtubeList['items'] as $key => $value) {
                        if (array_key_exists('videoId',$value['id'])) {
                            Gallery::create([
                                'gallery'       => $value['snippet']['thumbnails']['high']['url'],
                                'video_id'      => $value['id']['videoId'],
                                'caption'       => $value['snippet']['title'],
                                'created_at'    => date('Y-m-d H:i:s',strtotime($value['snippet']['publishedAt'])),
                                'updated_at'    => date('Y-m-d H:i:s',strtotime($value['snippet']['publishedAt'])),
                            ]);
                        }
                    }
                } else {
                    $reload = false;
                }

                if (array_key_exists('error',$youtubeList)) {
                    if ($youtubeList['error']['status'] == 'PERMISSION_DENIED') {
                        $message = null;
                    } else {
                        $message = $youtubeList['error']['message'];
                    }
                }

            } while ($reload);

            if ($message) return back()->with('api_error', $message);
            return back()->with('success', 'Video berhasil diperbarui');
        } else {
            return back()->with('error', 'Harap memasukkan API KEY pada .env');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        File::delete(storage_path('app/'.$gallery->gallery));
        $gallery->delete();
        return back()->with('success', 'Gambar berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            $image = Gallery::findOrFail($id);
            File::delete(storage_path('app/'.$image->image));
            $image->delete();
        }

        return response()->json([
            'success' => true
        ]);
    }
}
