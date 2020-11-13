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

class PendudukImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key == 0) {
                continue;
            }

            if ($row[18] == 'Warga Negara Indonesia') {
                $kewarganegaraan = 1;
            } elseif ($row[18] == 'Warga Negara Asing') {
                $kewarganegaraan = 2;
            } else {
                $kewarganegaraan = 3;
            }
            $dusun_id = Dusun::where('nama',$row[3])->first() ? Dusun::where('nama',$row[3])->first()->id : null;

            $data = [
                'detail_dusun_id'                   => DetailDusun::where('dusun_id',$dusun_id)->where('rt',$row[1])->where('rw',$row[2])->first() ? DetailDusun::where('dusun_id',$dusun_id)->where('rt',$row[1])->where('rw',$row[2])->first()->id : null,
                'alamat_sekarang'                   => $row[4],
                'kk'                                => $row[5],
                'nik'                               => $row[8],
                'nama'                              => $row[9],
                'jenis_kelamin'                     => $row[10] == "LAKI-LAKI" ? 1 : 2,
                'status_hubungan_dalam_keluarga_id' => StatusHubunganDalamKeluarga::where('nama',$row[11])->first() ? StatusHubunganDalamKeluarga::where('nama',$row[11])->first()->id : null,
                'tempat_lahir'                      => $row[12],
                'tanggal_lahir'                     => date('Y-m-d',strtotime($row[13])),
                'status_perkawinan_id'              => StatusPerkawinan::where('nama',$row[15])->first() ? StatusPerkawinan::where('nama',$row[15])->first()->id : null,
                'agama_id'                          => Agama::where('nama',$row[16])->first() ? Agama::where('nama',$row[16])->first()->id : null,
                'darah_id'                          => Darah::where('golongan',$row[17])->first() ? Darah::where('golongan',$row[17])->first()->id : null,
                'kewarganegaraan'                   => $kewarganegaraan,
                'pendidikan_id'                     => Pendidikan::where('nama',$row[20])->first() ? Pendidikan::where('nama',$row[20])->first()->id : null,
                'pekerjaan_id'                      => Pekerjaan::where('nama',$row[21])->first() ? Pekerjaan::where('nama',$row[21])->first()->id : null,
            ];

            $penduduk = Penduduk::where('nik', $row[8])->first();

            if ($penduduk) {
                $penduduk->update($data);
            } else {
                Penduduk::create($data);
            }
        }
    }
}
