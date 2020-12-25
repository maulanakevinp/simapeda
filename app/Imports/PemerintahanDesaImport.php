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
        $heading = [
            'NO',
            'NAMA',
            'NIK',
            'NIP',
            'NIPD',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'JENIS KELAMIN',
            'AGAMA',
            'PENDIDIKAN TERAKHIR',
            'STATUS PEGAWAI DESA',
            'NOMOR KEPUTUSAN PENGANGKATAN',
            'TANGGAL KEPUTUSAN PENGANGKATAN',
            'NOMOR KEPUTUSAN PEMBERHENTIAN',
            'TANGGAL KEPUTUSAN PEMBERHENTIAN',
            'PANGKAT / GOLONGAN',
            'JABATAN',
            'MASA JABATAN',
            'ALAMAT',
        ];

        if ($heading != $collection[0]->toArray()) {
            return back()->with('error', 'Data tidak sesuai');
        }

        unset($collection[0]);
        set_time_limit(0);

        foreach ($collection as $key => $item) {
            $baris = $key + 1;
            Validator::make($item->toArray(), [
                ['required','numeric'],
                ['required','string','max:128'],
                ['required','digits:16'],
                ['nullable','string','max:32'],
                ['nullable','string','max:32'],
                ['required','string','max:32'],
                ['required','date','before:'.now()],
                ['required'],
                ['required'],
                ['required'],
                ['required'],
                ['nullable','string','max:32'],
                ['nullable','date'],
                ['nullable','string','max:32'],
                ['nullable','date'],
                ['nullable','string','max:64'],
                ['required','string','max:32'],
                ['nullable','string','max:64'],
                ['nullable'],
            ],[
                '0.required'      => 'nomor (kolom A baris ke-'.$baris.') wajib diisi.',
                '0.numeric'       => 'nomor (kolom A baris ke-'.$baris.') harus berupa angka.',
                '1.required'      => 'nama (kolom B baris ke-'.$baris.') wajib diisi.',
                '1.max:128'       => 'nama (kolom B baris ke-'.$baris.') maksimum 128 karakter.',
                '2.required'      => 'nik (kolom C baris ke-'.$baris.') wajib diisi.',
                '2.digits:16'     => 'nik (kolom C baris ke-'.$baris.') harus 16 digit',
                '3.max:32'        => 'nip (kolom D baris ke-'.$baris.') maksimum 32 karakter.',
                '4.max:32'        => 'nipd (kolom E baris ke-'.$baris.') maksimum 32 karakter.',
                '5.required'      => 'tempat lahir (kolom F baris ke-'.$baris.') wajib diisi.',
                '5.max:32'        => 'tempat lahir (kolom F baris ke-'.$baris.') maksimum 32 karakter.',
                '6.required'      => 'tanggal lahir (kolom G baris ke-'.$baris.') wajib diisi.',
                '6.date'          => 'tanggal lahir (kolom G baris ke-'.$baris.') harus berupa tanggal.',
                '6.before:'.now() => 'tanggal lahir (kolom G baris ke-'.$baris.') harus sebelum hari ini.',
                '7.required'      => 'jenis kelamin (kolom H baris ke-'.$baris.') wajib diisi.',
                '8.required'      => 'agama (kolom I baris ke-'.$baris.') wajib diisi.',
                '9.required'      => 'pendidikan (kolom J baris ke-'.$baris.') wajib diisi.',
                '10.required'     => 'status pegawai desa (kolom K baris ke-'.$baris.') wajib diisi.',
                '11.max:32'       => 'nomor sk pengangkatan (kolom L baris ke-'.$baris.') maksimum 32 karakter.',
                '12.date'         => 'tanggal sk pengangkatan (kolom M baris ke-'.$baris.') harus berupa tanggal.',
                '13.max:32'       => 'nomor sk pemberhentian (kolom N baris ke-'.$baris.') maksimum 32 karakter.',
                '14.date'         => 'nomor sk pemberhentian (kolom O baris ke-'.$baris.') harus berupa tanggal.',
                '15.max:64'       => 'pangkat atau golongan (kolom P baris ke-'.$baris.') maksimum 64 karakter.',
                '16.required'     => 'jabatan (kolom Q baris ke-'.$baris.') wajib diisi.',
                '16.max:32'       => 'jabatan (kolom Q baris ke-'.$baris.') maksimum 32 karakter.',
                '17.max:64'       => 'alamat (kolom R baris ke-'.$baris.') maksimum 64 karakter.',
            ])->validate();

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

        return back()->with('success', 'Data pemerintahan desa berhasil diimport');
    }
}
