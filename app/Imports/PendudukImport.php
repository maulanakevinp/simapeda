<?php

namespace App\Imports;

use App\Agama;
use App\AkseptorKb;
use App\Asuransi;
use App\Darah;
use App\DetailDusun;
use App\Dusun;
use App\JenisCacat;
use App\JenisKelahiran;
use App\Pekerjaan;
use App\Pendidikan;
use App\Penduduk;
use App\PenolongKelahiran;
use App\SakitMenahun;
use App\StatusHubunganDalamKeluarga;
use App\StatusPenduduk;
use App\StatusPerkawinan;
use App\StatusRekam;
use App\TempatDilahirkan;
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

            $data = [
                'detail_dusun_id'                   => DetailDusun::where('dusun_id', Dusun::where('nama',$row[2])->first()->id ?? null)->where('rt',$row[0])->where('rw',$row[1])->first()->id ?? null,
                'alamat_sekarang'                   => $row[3],
                'kk'                                => $kk,
                'nomor_urut_dalam_kk'               => $row[6],
                'nik'                               => $nik,
                'nama'                              => $row[8],
                'jenis_kelamin'                     => $row[9] == "LAKI-LAKI" ? 1 : 2,
                'status_hubungan_dalam_keluarga_id' => StatusHubunganDalamKeluarga::where('nama',$row[10])->first()->id ?? null,
                'tempat_lahir'                      => $row[11],
                'tanggal_lahir'                     => date('Y-m-d',strtotime($row[12])),
                'status_perkawinan_id'              => StatusPerkawinan::where('nama',$row[14])->first()->id ?? null,
                'agama_id'                          => Agama::where('nama',$row[15])->first()->id ?? null,
                'darah_id'                          => Darah::where('golongan',$row[16])->first()->id ?? null,
                'kewarganegaraan'                   => $kewarganegaraan,
                'etnis_atau_suku'                   => $row[18],
                'pendidikan_id'                     => Pendidikan::where('nama',$row[19])->first()->id ?? null,
                'pekerjaan_id'                      => Pekerjaan::where('nama',$row[20])->first()->id ?? null,
                'alamat_sebelumnya'                 => $row[21],
                'akseptor_kb_id'                    => AkseptorKb::where('nama',$row[22])->first()->id ?? null,
                'alamat_email'                      => $row[23],
                'anak_ke'                           => $row[24],
                'asuransi_id'                       => Asuransi::where('nama',$row[25])->first()->id ?? null,
                'berat_lahir'                       => $row[26],
                'jenis_cacat_id'                    => JenisCacat::where('nama',$row[27])->first()->id ?? null,
                'jenis_kelahiran_id'                => JenisKelahiran::where('nama',$row[28])->first()->id ?? null,
                'ktp_elektronik'                    => $row[29],
                'nama_ayah'                         => $row[30],
                'nama_ibu'                          => $row[31],
                'nik_ayah'                          => $row[32],
                'nik_ibu'                           => $row[33],
                'nomor_akta_kelahiran'              => $row[34],
                'nomor_akta_perceraian'             => $row[35],
                'nomor_akta_perkawinan'             => $row[36],
                'nomor_kitas_atau_kitap'            => $row[37],
                'nomor_paspor'                      => $row[38],
                'nomor_telepon'                     => $row[39],
                'panjang_lahir'                     => $row[40],
                'penolong_kelahiran_id'             => PenolongKelahiran::where('nama',$row[41])->first()->id ?? null,
                'sakit_menahun_id'                  => SakitMenahun::where('nama',$row[42])->first()->id ?? null,
                'status_kehamilan'                  => $row[43],
                'status_penduduk_id'                => StatusPenduduk::where('nama',$row[44])->first()->id ?? null,
                'status_rekam_id'                   => StatusRekam::where('nama',$row[45])->first()->id ?? null,
                'tanggal_perceraian'                => $row[46],
                'tanggal_perkawinan'                => $row[47],
                'tempat_dilahirkan_id'              => TempatDilahirkan::where('nama',$row[48])->first()->id ?? null,
                'tgl_berakhir_paspor'               => $row[49],
                'waktu_kelahiran'                   => $row[50],
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
