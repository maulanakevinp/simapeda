<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PendudukRequest extends FormRequest
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
            'foto'                              => ['nullable','image','max:2048'],
            'nama'                              => ['required','string','max:64'],
            'ktp_elektronik'                    => ['nullable','numeric'],
            'status_rekam_id'                   => ['nullable','numeric'],
            'kk'                                => ['required','digits:16'],
            'status_hubungan_dalam_keluarga_id' => ['required','numeric'],
            'jenis_kelamin'                     => ['required','numeric'],
            'agama_id'                          => ['required','numeric'],
            'status_penduduk_id'                => ['nullable','numeric'],
            'nomor_akta_kelahiran'              => ['nullable','string','max:32'],
            'tempat_lahir'                      => ['required','string','max:32'],
            'tanggal_lahir'                     => ['required','date','before:now'],
            'waktu_kelahiran'                   => ['nullable','date_format:H:i:s'],
            'tempat_dilahirkan_id'              => ['nullable','numeric'],
            'jenis_kelahiran_id'                => ['nullable','numeric'],
            'anak_ke'                           => ['nullable','numeric','min:1'],
            'penolong_kelahiran_id'             => ['nullable','numeric'],
            'berat_lahir'                       => ['nullable','numeric','min:1'],
            'panjang_lahir'                     => ['nullable','numeric','min:1'],
            'pendidikan_id'                     => ['nullable','numeric'],
            'pendidikan_sedang_ditempuh_id'     => ['nullable','numeric'],
            'pekerjaan_id'                      => ['nullable','numeric'],
            'kewarganegaraan'                   => ['required','numeric'],
            'nomor_paspor'                      => ['nullable','string','max:32'],
            'tgl_berakhir_paspor'               => ['nullable','date'],
            'nomor_kitas_atau_kitap'            => ['nullable','string','max:32'],
            'nik_ayah'                          => ['nullable','digits:16'],
            'nama_ayah'                         => ['nullable','string','max:64'],
            'nik_ibu'                           => ['nullable','digits:16'],
            'nama_ibu'                          => ['nullable','string','max:64'],
            'nomor_telepon'                     => ['nullable','digits_between:5,16'],
            'alamat_email'                      => ['nullable','string','max:191'],
            'alamat_sebelumnya'                 => ['nullable','string','max:191'],
            'alamat_sekarang'                   => ['nullable','string','max:191'],
            'status_perkawinan_id'              => ['required','numeric'],
            'nomor_akta_perkawinan'             => ['nullable','string','max:32'],
            'tanggal_perkawinan'                => ['nullable','date'],
            'nomor_akta_perceraian'             => ['nullable','string','max:32'],
            'tanggal_perceraian'                => ['nullable','date'],
            'darah_id'                          => ['nullable','numeric'],
            'jenis_cacat_id'                    => ['nullable','numeric'],
            'sakit_menahun_id'                  => ['nullable','numeric'],
            'akseptor_kb_id'                    => ['nullable','numeric'],
            'asuransi_id'                       => ['nullable','numeric'],
        ];

        if ($this->dusun) {
            $rules['detail_dusun_id'] = ['required'];
        }

        if (request()->isMethod('post')) {
            $rules['nik'] = ['required','digits:16','unique:penduduk,nik'];
        } elseif (request()->isMethod('patch')) {
            $penduduk = $this->penduduk->id;
            $rules['nik'] = ['required','digits:16',"unique:penduduk,nik,$penduduk"];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'agama_id.required' => 'agama wajib diisi.',
            'detail_dusun_id.required' => 'RT/RW wajib diisi.',
            'status_perkawinan_id.required' => 'status perkawinan wajib diisi.',
            'status_hubungan_dalam_keluarga_id.required' => 'status hubungan dalam keluarga wajib diisi.',
        ];
    }
}
