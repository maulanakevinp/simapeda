<?php

namespace App\Imports;

use App\Agama;
use App\PemerintahanDesa;
use App\Pendidikan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class PemerintahanDesaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        try {
            unset($collection[0]);

            Validator::make($collection->toArray(), [
                '*.0'   => ['required','numeric'],
                '*.1'   => ['required','string','max:128'],
                '*.2'   => ['required','digits:16'],
                '*.3'   => ['nullable','string','max:32'],
                '*.4'   => ['nullable','string','max:32'],
                '*.5'   => ['required','string','max:32'],
                '*.6'   => ['required','date','before:'.now()],
                '*.7'   => ['required'],
                '*.8'   => ['required'],
                '*.9'   => ['required'],
                '*.10'  => ['required'],
                '*.11'  => ['nullable','string','32'],
                '*.12'  => ['nullable','date'],
                '*.13'  => ['nullable','string','32'],
                '*.14'  => ['nullable','date'],
                '*.15'  => ['nullable','string','max:64'],
                '*.16'  => ['required','string','max:32'],
                '*.17'  => ['nullable','string','max:64'],
                '*.18'  => ['nullable'],
            ],[
                '*.0.required'      => 'nomor (kolom A) wajib diisi.',
                '*.0.numeric'       => 'nomor (kolom A) harus berupa angka.',
                '*.1.required'      => 'nama (kolom B) wajib diisi.',
                '*.1.max:128'       => 'nama (kolom B) maksimum 128 karakter.',
                '*.2.required'      => 'nik (kolom C) wajib diisi.',
                '*.2.digits:16'     => 'nik (kolom C) harus 16 digit',
                '*.3.max:32'        => 'nip (kolom D) maksimum 32 karakter.',
                '*.4.max:32'        => 'nipd (kolom E) maksimum 32 karakter.',
                '*.5.required'      => 'tempat lahir (kolom F) wajib diisi.',
                '*.5.max:32'        => 'tempat lahir (kolom F) maksimum 32 karakter.',
                '*.6.required'      => 'tanggal lahir (kolom G) wajib diisi.',
                '*.6.date'          => 'tanggal lahir (kolom G) harus berupa tanggal.',
                '*.6.before:'.now() => 'tanggal lahir (kolom G) harus sebelum hari ini.',
                '*.7.required'      => 'jenis kelamin (kolom H) wajib diisi.',
                '*.8.required'      => 'agama (kolom I) wajib diisi.',
                '*.9.required'      => 'pendidikan (kolom J) wajib diisi.',
                '*.10.required'     => 'status pegawai desa (kolom K) wajib diisi.',
                '*.11.max:32'       => 'nomor sk pengangkatan (kolom L) maksimum 32 karakter.',
                '*.12.date'         => 'tanggal sk pengangkatan (kolom M) harus berupa tanggal.',
                '*.13.max:32'       => 'nomor sk pemberhentian (kolom N) maksimum 32 karakter.',
                '*.14.date'         => 'nomor sk pemberhentian (kolom O) harus berupa tanggal.',
                '*.15.max:64'       => 'pangkat atau golongan (kolom P) maksimum 64 karakter.',
                '*.16.required'     => 'jabatan (kolom Q) wajib diisi.',
                '*.16.max:32'       => 'jabatan (kolom Q) maksimum 32 karakter.',
                '*.17.max:64'       => 'alamat (kolom R) maksimum 64 karakter.',
            ])->validate();

            foreach ($collection as $key => $item) {
                set_time_limit(0);

                preg_match_all('/\d+/', $item[2], $matches);
                $nik = implode('',$matches[0]);

                preg_match_all('/\d+/', $item[3], $matches);
                $nip = implode('',$matches[0]);

                preg_match_all('/\d+/', $item[4], $matches);
                $nipd = implode('',$matches[0]);

                $data = [
                    'urutan'                    => $item[0],
                    'nama'                      => $item[1],
                    'nik'                       => $nik,
                    'nip'                       => $nip,
                    'nipd'                      => $nipd,
                    'tempat_lahir'              => $item[5],
                    'tanggal_lahir'             => $item[6],
                    'jenis_kelamin'             => $item[7] == 'Laki-laki' ? 1 : 2,
                    'agama_id'                  => Agama::where('nama',$item[8])->first() ? Agama::where('nama',$item[8])->first()->id : 1,
                    'pendidikan_id'             => Pendidikan::where('nama',$item[9])->first() ? Pendidikan::where('nama',$item[9])->first()->id : 1,
                    'status_pegawai_desa'       => $item[10] == 'Aktif' ? 1 : 0,
                    'nomor_sk_pengangkatan'     => $item[11],
                    'tanggal_sk_pengangkatan'   => $item[12],
                    'nomor_sk_pemberhentian'    => $item[13],
                    'tanggal_sk_pemberhentian'  => $item[14],
                    'pangkat_atau_golongan'     => $item[15],
                    'jabatan'                   => $item[16],
                    'masa_jabatan'              => $item[17],
                    'alamat'                    => $item[18],
                ];

                $pemerintahan_desa = PemerintahanDesa::where('nik', $nik)->first();

                if ($pemerintahan_desa) {
                    $pemerintahan_desa->update($data);
                } else {
                    PemerintahanDesa::create($data);
                }
            }
            return back()->with('success', 'File xlsx berhasil di import');
        } catch (\Throwable $th) {
            return back()->with('error',"File xlsx gagal di import");
        }
    }
}
