<?php

namespace App\Imports;

use App\DetailDusun;
use App\Dusun;
use App\Penduduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class PendudukOpenSIDImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        unset($rows[0]);
        set_time_limit(0);

        foreach ($rows as $key => $row) {
            $baris = $key+1;
            Validator::make($row->toArray(), [
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'required',
                'required',
                'required',
                'required',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'required',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
                'nullable',
            ],[
                '5.required'  => 'nomor kk (kolom F baris ke-'. $baris .') wajib diisi.',
                '6.required'  => 'nomor nik (kolom G baris ke-'. $baris .') wajib diisi.',
                '4.required'  => 'nama (kolom E baris ke-'. $baris .') wajib diisi.',
                '7.required'  => 'jenis kelamin (kolom H baris ke-'. $baris .') wajib diisi.',
                '16.required' => 'kewarganegaraan (kolom Q baris ke-'. $baris .') wajib diisi.',
            ])->validate();

            preg_match_all('/\d+/', $row[5], $matches);
            $kk = implode('',$matches[0]);

            preg_match_all('/\d+/', $row[6], $matches);
            $nik = implode('',$matches[0]);

            $data = [
                'alamat_sebelumnya'                 => $row[0],
                'detail_dusun_id'                   => DetailDusun::where('dusun_id', Dusun::where('nama',$row[1])->first()->id ?? null)->where('rt',$row[3])->where('rw',$row[2])->first()->id ?? null,
                'nama'                              => $row[4],
                'kk'                                => $kk,
                'nik'                               => $nik,
                'jenis_kelamin'                     => $row[7],
                'tempat_lahir'                      => $row[8],
                'tanggal_lahir'                     => $row[9],
                'agama_id'                          => $row[10],
                'pendidikan_id'                     => $row[12] ? $row[12] : $row[11],
                'pekerjaan_id'                      => $row[13],
                'status_perkawinan_id'              => $row[14],
                'status_hubungan_dalam_keluarga_id' => $row[15],
                'kewarganegaraan'                   => $row[16],
                'nama_ayah'                         => $row[17],
                'nama_ibu'                          => $row[18],
                'darah_id'                          => $row[19],
                'nomor_akta_kelahiran'              => $row[20],
                'nomor_paspor'                      => $row[21],
                'tgl_berakhir_paspor'               => $row[22],
                'nomor_kitas_atau_kitap'            => $row[23],
                'nik_ayah'                          => $row[24],
                'nik_ibu'                           => $row[25],
                'nomor_akta_perkawinan'             => $row[26],
                'tanggal_perkawinan'                => $row[27],
                'nomor_akta_perceraian'             => $row[28],
                'tanggal_perceraian'                => $row[29],
                'jenis_cacat_id'                    => $row[30],
                'akseptor_kb_id'                    => $row[31],
                'status_kehamilan'                  => $row[32],
                'ktp_elektronik'                    => $row[33],
                'status_rekam_id'                   => $row[34],
                'alamat_sekarang'                   => $row[35],
                'nomor_urut_dalam_kk'               => 1
            ];

            $penduduk = Penduduk::where('nik', $nik)->first();

            if ($penduduk) {
                $penduduk->update($data);
            } else {
                Penduduk::create($data);
            }
        }
    }
}
