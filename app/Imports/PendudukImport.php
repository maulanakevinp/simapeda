<?php

namespace App\Imports;

use App\Agama;
use App\Darah;
use App\DetailDusun;
use App\Dusun;
use App\Pekerjaan;
use App\Pendidikan;
use App\Penduduk;
use App\StatusHubunganDalamKeluarga;
use App\StatusPerkawinan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class PendudukImport implements ToCollection
{
    public function collection(Collection $rows)
    {
            unset($rows[0]);
            set_time_limit(0);

            foreach ($rows as $key => $row) {
                $baris = $key+1;
                Validator::make($row->toArray(), [
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                    ['required'],
                    ['nullable'],
                    ['required'],
                    ['required'],
                    ['required'],
                    ['required'],
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                    ['required'],
                    ['nullable'],
                    ['nullable'],
                    ['nullable'],
                ],[
                    '4.required'  => 'kode keluarga (kolom E baris ke-'. $baris .') wajib diisi.',
                    '6.required'  => 'nomor urut dalam kk (kolom G baris ke-'. $baris .') wajib diisi.',
                    '7.required'  => 'nik (kolom H baris ke-'. $baris .') wajib diisi.',
                    '8.required'  => 'nama (kolom I baris ke-'. $baris .') wajib diisi.',
                    '9.required'  => 'jenis kelamin (kolom J baris ke-'. $baris .') wajib diisi.',
                    '17.required' => 'kewarganegaraan (kolom R baris ke-'. $baris .') wajib diisi.',
                ])->validate();

                preg_match_all('/\d+/', $row[4], $matches);
                $kk = implode('',$matches[0]);

                preg_match_all('/\d+/', $row[7], $matches);
                $nik = implode('',$matches[0]);

                if ($row[17] == 'Warga Negara Indonesia') {
                    $kewarganegaraan = 1;
                } elseif ($row[17] == 'Warga Negara Asing') {
                    $kewarganegaraan = 2;
                } else {
                    $kewarganegaraan = 3;
                }
                $dusun_id = Dusun::where('nama',$row[2])->first() ? Dusun::where('nama',$row[2])->first()->id : null;

                $data = [
                    'detail_dusun_id'                   => DetailDusun::where('dusun_id',$dusun_id)->where('rt',$row[0])->where('rw',$row[1])->first() ? DetailDusun::where('dusun_id',$dusun_id)->where('rt',$row[0])->where('rw',$row[1])->first()->id : null,
                    'alamat_sekarang'                   => $row[3],
                    'kk'                                => $kk,
                    'nomor_urut_dalam_kk'               => $row[6],
                    'nik'                               => $nik,
                    'nama'                              => $row[8],
                    'jenis_kelamin'                     => $row[9] == "LAKI-LAKI" ? 1 : 2,
                    'status_hubungan_dalam_keluarga_id' => StatusHubunganDalamKeluarga::where('nama',$row[10])->first() ? StatusHubunganDalamKeluarga::where('nama',$row[10])->first()->id : null,
                    'tempat_lahir'                      => $row[11],
                    'tanggal_lahir'                     => date('Y-m-d',strtotime($row[12])),
                    'status_perkawinan_id'              => StatusPerkawinan::where('nama',$row[14])->first() ? StatusPerkawinan::where('nama',$row[14])->first()->id : null,
                    'agama_id'                          => Agama::where('nama',$row[15])->first() ? Agama::where('nama',$row[15])->first()->id : null,
                    'darah_id'                          => Darah::where('golongan',$row[16])->first() ? Darah::where('golongan',$row[16])->first()->id : null,
                    'kewarganegaraan'                   => $kewarganegaraan,
                    'etnis_atau_suku'                   => $row[18],
                    'pendidikan_id'                     => Pendidikan::where('nama',$row[19])->first() ? Pendidikan::where('nama',$row[19])->first()->id : null,
                    'pekerjaan_id'                      => Pekerjaan::where('nama',$row[20])->first() ? Pekerjaan::where('nama',$row[20])->first()->id : null,
                ];

                $penduduk = Penduduk::where('nik', $nik)->first();

                if ($penduduk) {
                    $penduduk->update($data);
                } else {
                    Penduduk::create($data);
                }
            }
            return back()->with('success', 'File xlsx berhasil di import');
    }
}
