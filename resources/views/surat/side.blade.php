<div class="form-group">
    <select name="jenis_isi[]" class="form-control">
        <option value="1" {{ $isiSurat->jenis_isi == 1 ? 'selected' : '' }}>Paragraf</option>
        <option value="2" {{ $isiSurat->jenis_isi == 2 ? 'selected' : '' }}>Kalimat</option>
        <option value="3" {{ $isiSurat->jenis_isi == 3 ? 'selected' : '' }}>Isian</option>
        <option value="5" {{ $isiSurat->jenis_isi == 5 ? 'selected' : '' }}>Subjudul</option>
    </select>
</div>
<div class="text-right mt-3">
    <input type="checkbox" name="tampil[]" value="1" style="transform: scale(1.5); margin-right: 15px; {{ $isiSurat->jenis_isi == 3 ? 'display: none;' : '' }}" data-toggle="tooltip" title="Centang untuk ditampilkan pada form buat surat" {{ $isiSurat->tampilkan == 1 ? 'checked' : '' }}>
    <input type="hidden" name="tampilkan[]" value="{{ $isiSurat->tampilkan }}">
    <a class="bantuan mb-1 mr-2" href="{{ $bantuan }}" data-fancybox style="{{ $isiSurat->jenis_isi == 3 ? 'display: none;' : '' }}"><i class="fas fa-question-circle text-blue" title="Bantuan" data-toggle="tooltip"></i></a>
    <button class="btn btn-sm btn-success mb-1 atas-isian" data-toggle="tooltip" title="Pindahkan Ke Atas" type="button"><i  class="fas fa-arrow-up"></i></button>
    <button class="btn btn-sm btn-success mb-1 bawah-isian" data-toggle="tooltip" title="Pindahkan Ke Bawah" type="button"><i class="fas fa-arrow-down"></i></button>
    <button class="btn btn-sm btn-primary mb-1 tambah-isian" data-toggle="tooltip" title="Tambah Isian" type="button"><i class="fas fa-plus"></i></button>
    <button class="btn btn-sm btn-danger mb-1 hapus-isian" data-toggle="tooltip" title="Hapus Isian Ini" type="button"><i class="fas fa-trash"></i></button>
</div>
