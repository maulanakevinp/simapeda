<div class="card shadow mb-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <tr>
                    <td style="padding:0.5rem" width="100px">Nama Program</td>
                    <td style="padding:0.5rem" width="1px">:</td>
                    <td style="padding:0.5rem">{{ $bantuan->nama_program }}</td>
                </tr>
                <tr>
                    <td style="padding:0.5rem" width="100px">Sasaran Peserta</td>
                    <td style="padding:0.5rem" width="1px">:</td>
                    <td style="padding:0.5rem">{{ $bantuan->sasaran_program == 1 ? 'Penduduk' : 'Keluarga' }}</td>
                </tr>
                <tr>
                    <td style="padding:0.5rem" width="100px">Masa Berlaku</td>
                    <td style="padding:0.5rem" width="1px">:</td>
                    <td style="padding:0.5rem">{{ tgl($bantuan->tanggal_mulai) }} - {{ tgl($bantuan->tanggal_berakhir) }}</td>
                </tr>
                <tr>
                    <td style="padding:0.5rem" width="100px">Keterangan</td>
                    <td style="padding:0.5rem" width="1px">:</td>
                    <td style="padding:0.5rem ; white-space: normal !important;word-wrap: break-word;">{{ $bantuan->keterangan }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
