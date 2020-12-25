<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PemerintahanDesaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nama'                      => ['required','string','max:128'],
            'foto'                      => ['nullable','image','max:2048'],
            'nik'                       => ['required','digits:16',"unique:pemerintahan_desa,nik"],
            'nip'                       => ['nullable','string','max:32',"unique:pemerintahan_desa,nip"],
            'nipd'                      => ['nullable','string','max:32',"unique:pemerintahan_desa,nipd"],
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
            'jabatan'                   => ['required','string','max:128'],
            'atasan'                    => ['nullable','numeric'],
            'masa_jabatan'              => ['nullable','string','max:64'],
            'alamat'                    => ['nullable'],
            'urutan'                    => ['required'],
        ];

        if ($this->dusun) {
            $rules['detail_dusun_id'] = ['required'];
        }

        if (request()->isMethod('patch')) {
            $pemerintahan_desa = $this->pemerintahan_desa->id;
            $rules['nik']   = ['required','digits:16',"unique:pemerintahan_desa,nik,$pemerintahan_desa"];
            $rules['nip']   = ['nullable','digits:16',"unique:pemerintahan_desa,nip,$pemerintahan_desa"];
            $rules['nipd']  = ['nullable','digits:16',"unique:pemerintahan_desa,nipd,$pemerintahan_desa"];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'agama_id.required' => 'agama wajib diisi.',
            'detail_dusun_id.required' => 'RT/RW wajib diisi.',
            'pendidikan_id.required' => 'pendidikan wajib diisi.',
        ];
    }
}
