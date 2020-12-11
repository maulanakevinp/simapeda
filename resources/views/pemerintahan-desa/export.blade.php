<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>NIP</th>
            <th>NIPD</th>
            <th>TEMPAT LAHIR</th>
            <th>TANGGAL LAHIR</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>PENDIDIKAN TERAKHIR</th>
            <th>STATUS PEGAWAI DESA</th>
            <th>NOMOR KEPUTUSAN PENGANGKATAN</th>
            <th>TANGGAL KEPUTUSAN PENGANGKATAN</th>
            <th>NOMOR KEPUTUSAN PEMBERHENTIAN</th>
            <th>TANGGAL KEPUTUSAN PEMBERHENTIAN</th>
            <th>PANGKAT / GOLONGAN</th>
            <th>JABATAN</th>
            <th>MASA JABATAN</th>
            <th>ALAMAT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemerintahan_desa as $item)
            <tr>
                <td>{{ $item->urutan }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nipd }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $item->agama->nama }}</td>
                <td>{{ $item->pendidikan->nama }}</td>
                <td>{{ $item->status_pegawai_desa == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>{{ $item->nomor_sk_pengangkatan }}</td>
                <td>{{ $item->tanggal_sk_pengangkatan }}</td>
                <td>{{ $item->nomor_sk_pemberhentian }}</td>
                <td>{{ $item->tanggal_sk_pemberhentian }}</td>
                <td>{{ $item->pangkat_atau_golongan }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->masa_jabatan }}</td>
                <td>{{ $item->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
