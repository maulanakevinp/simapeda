<?php

namespace App\Http\Requests;

use App\BantuanPenduduk;
use App\Rules\BantuanRule;
use Illuminate\Foundation\Http\FormRequest;

class BantuanPendudukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = [
            'bantuan_id'            => ['required','numeric'],
            'penduduk_id'           => ['required','numeric'],
            'nomor_kartu_peserta'   => ['required','string','max:64'],
            'gambar_kartu_peserta'  => ['nullable','image','max:2048'],
            'nik'                   => ['required','digits:16'],
            'nama'                  => ['required','string','max:128'],
            'tempat_lahir'          => ['required','string','max:64'],
            'tanggal_lahir'         => ['required','date'],
            'alamat'                => ['required']
        ];

        if (request()->isMethod('post')) {
            $data['penduduk_id']        = ['required','numeric', new BantuanRule($this->bantuan_id, $this->penduduk_id)];
        }

        return $data;
    }
}
