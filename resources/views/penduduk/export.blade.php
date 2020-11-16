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
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
