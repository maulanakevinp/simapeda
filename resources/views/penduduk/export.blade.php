<table>
    <thead>
        <tr>
            <th>RT</th>
            <th>RW</th>
            <th>Dusun</th>
            <th>Alamat</th>
            <th>Kode Keluarga</th>
            <th>Nama Kepala Keluarga</th>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama Anggota Keluarga</th>
            <th>Jenis Kelamin</th>
            <th>Hubungan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>Status</th>
            <th>Agama</th>
            <th>Golongan Darah</th>
            <th>Kewarganegaraan</th>
            <th>Etnis/Suku</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <td>Alamat Sebelumnya</td>
            <td>Akseptor KB</td>
            <td>Alamat Email</td>
            <td>Anak Ke</td>
            <td>Asuransi</td>
            <td>Berat Lahir</td>
            <td>Jenis Cacat</td>
            <td>Jenis Kelahiran</td>
            <td>KTP Elektronik</td>
            <td>Nama Ayah</td>
            <td>Nama Ibu</td>
            <td>Nik Ayah</td>
            <td>Nik Ibu</td>
            <td>Nomor Akta Kelahiran</td>
            <td>Nomor Akta Perceraian</td>
            <td>Nomor Akta Perkawinan</td>
            <td>Nomor Kitas/Kitap</td>
            <td>Nomor Paspor</td>
            <td>Nomor Telepon</td>
            <td>Panjang Lahir</td>
            <td>Penolong Kelahiran</td>
            <td>Sakit Menahun</td>
            <td>Status Kehamilan</td>
            <td>Status Penduduk</td>
            <td>Status Rekam</td>
            <td>Tanggal Perceraian</td>
            <td>Tanggal Perkawinan</td>
            <td>Tempat Dilahirkan</td>
            <td>Tgl Berakhir Paspor</td>
            <td>Waktu Kelahiran</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($penduduk as $anggota)
            @foreach ($anggota as $item)
                <tr>
                    <td>{{ $item->detailDusun->rt ?? ''}}</td>
                    <td>{{ $item->detailDusun->rw ?? ''}}</td>
                    <td>{{ $item->detailDusun->dusun->nama ?? ''}}</td>
                    <td>{{ $item->alamat_sekarang }}</td>
                    <td>_{{ $item->kk }}</td>
                    <td>{{ App\Penduduk::where('kk',$item->kk)->whereHas('statusHubunganDalamKeluarga',function ($status) { $status->where('nama','Kepala Keluarga'); })->first()->nama ?? '' }}</td>
                    <td>{{ $item->nomor_urut_dalam_kk }}</td>
                    <td>_{{ $item->nik }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis_kelamin == 1 ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
                    <td>{{ $item->statusHubunganDalamKeluarga->nama ?? '' }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ date('d/m/Y',strtotime($item->tanggal_lahir)) }}</td>
                    <td>{{ date('Y') - date('Y',strtotime($item->tanggal_lahir)) }}</td>
                    <td>{{ $item->statusPerkawinan->nama ?? '' }}</td>
                    <td>{{ $item->agama->nama ?? '' }}</td>
                    <td>{{ $item->darah->golongan ?? '' }}</td>
                    <td>
                        @php
                            if ($item->kewarganegaraan == 1) {
                                echo 'Warga Negara Indonesia';
                            } elseif ($item->kewarganegaraan == 2) {
                                echo 'Warga Negara Asing';
                            } else {
                                echo 'Dwi Kewarganegaraan';
                            }
                        @endphp
                    </td>
                    <td>{{ $item->etnis_atau_suku }}</td>
                    <td>{{ $item->pendidikan->nama ?? '' }}</td>
                    <td>{{ $item->pekerjaan->nama ?? '' }}</td>
                    <td>{{ $item->alamat_sebelumnya }}</td>
                    <td>{{ $item->akseptorKb->nama ?? '' }}</td>
                    <td>{{ $item->alamat_email }}</td>
                    <td>{{ $item->anak_ke }}</td>
                    <td>{{ $item->asuransi->nama ?? '' }}</td>
                    <td>{{ $item->berat_lahir }}</td>
                    <td>{{ $item->jenisCacat->nama ?? '' }}</td>
                    <td>{{ $item->jenisKelahiran->nama ?? '' }}</td>
                    <td>{{ $item->ktp_elektronik }}</td>
                    <td>{{ $item->nama_ayah }}</td>
                    <td>{{ $item->nama_ibu }}</td>
                    <td>{{ $item->nik_ayah }}</td>
                    <td>{{ $item->nik_ibu }}</td>
                    <td>{{ $item->nomor_akta_kelahiran }}</td>
                    <td>{{ $item->nomor_akta_perceraian }}</td>
                    <td>{{ $item->nomor_akta_perkawinan }}</td>
                    <td>{{ $item->nomor_kitas_atau_kitap }}</td>
                    <td>{{ $item->nomor_paspor }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>{{ $item->panjang_lahir }}</td>
                    <td>{{ $item->penolongKelahiran->nama ?? '' }}</td>
                    <td>{{ $item->sakitMenahun->nama ?? '' }}</td>
                    <td>{{ $item->status_kehamilan }}</td>
                    <td>{{ $item->statusPenduduk->nama ?? '' }}</td>
                    <td>{{ $item->statusRekam->nama ?? '' }}</td>
                    <td>{{ $item->tanggal_perceraian }}</td>
                    <td>{{ $item->tanggal_perkawinan }}</td>
                    <td>{{ $item->tempatDilahirkan->nama ?? '' }}</td>
                    <td>{{ $item->tgl_berakhir_paspor }}</td>
                    <td>{{ $item->waktu_kelahiran }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
