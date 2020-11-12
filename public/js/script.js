document.addEventListener("keydown", function(event) {
    if (event.keyCode == 27) {
        $('.alert-dismissible').remove();
        $(".modal").modal('hide');
    }
});

$(document).on("change", "input", function (event) {
    $(this).attr('value', this.value);
    $(this).removeClass('is-invalid');
    $(this).siblings('.invalid-feedback').remove();
    $('.alert-dismissible').remove();
});

$(document).on("change", "select", function (event) {
    $(this).attr('value', this.value);
    $(this).removeClass('is-invalid');
    $(this).siblings('.invalid-feedback').remove();
    $('.alert-dismissible').remove();
});

$(document).on("change", "textarea", function (event) {
    $(this).html(event.target.value);
    $(this).removeClass('is-invalid');
    $(this).siblings('.invalid-feedback').remove();
    $('.alert-dismissible').remove();
});

$(document).on("click", "input[type='checkbox']", function () {
    $(this).tooltip('hide');
    $(this).attr('checked', $(this).prop('checked'));
});

$(document).on('click', '.hapus-data', function(event){
    event.preventDefault();
    $('#modal-hapus').modal('show');
    $('#nama-hapus').html('Apakah Anda yakin ingin menghapus ' + $(this).data('nama') + '???');
    $('#form-hapus').attr('action', $(this).data('action'));
});

$(document).on("submit","form", function () {
    $(this).find("button:submit").attr('disabled','disabled');
    $(this).find("button:submit").html(`<img height="20px" src="${baseURL}/storage/loading.gif" alt=""> Loading ...`);
});

function alertSuccess (pesan) {
    $('.notifikasi').html(`
        <div class="alert alert-success alert-dismissible fade show">
            <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
            <span class="alert-text">
                ${pesan}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `);
}

function alertError () {
    $('.notifikasi').html(`
        <div class="alert alert-danger alert-dismissible fade show">
            <span class="alert-icon"><i class="fas fa-times-circle"></i> <strong>Gagal</strong></span>
            <span class="alert-text">
                <ul id="pesanError">
                </ul>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `);
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function hanyaHuruf(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
        return false;
    return true;
}

function uploadImage (inputFile) {
    if (inputFile.files && inputFile.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(inputFile).siblings('img').attr("src", e.target.result);
        }
        reader.readAsDataURL(inputFile.files[0]);
    }
}

function perkawinan() {
    if ($('#status_perkawinan_id').val() == 1) {
        $('#nomor_akta_perkawinan').attr('placeholder','');
        $('#nomor_akta_perkawinan').attr('readonly','true');
        $('#nomor_akta_perkawinan').val('');
        $('#tanggal_perkawinan').attr('readonly','true');
        $('#tanggal_perkawinan').val('');
        $('#nomor_akta_perceraian').attr('placeholder','');
        $('#nomor_akta_perceraian').attr('readonly','true');
        $('#nomor_akta_perceraian').val('');
        $('#tanggal_perceraian').attr('readonly','true');
        $('#tanggal_perceraian').val('');
    } else if ($('#status_perkawinan_id').val() == 2) {
        $('#nomor_akta_perkawinan').attr('placeholder','Masukkan Nomor Akta Perkawinan');
        $('#nomor_akta_perkawinan').removeAttr('readonly');
        $('#tanggal_perkawinan').removeAttr('readonly');
        $('#nomor_akta_perceraian').attr('placeholder','');
        $('#nomor_akta_perceraian').val('');
        $('#nomor_akta_perceraian').attr('readonly','true');
        $('#tanggal_perceraian').attr('readonly','true');
        $('#tanggal_perceraian').val('');
    } else {
        $('#nomor_akta_perkawinan').attr('placeholder','Masukkan Nomor Akta Perkawinan');
        $('#nomor_akta_perkawinan').removeAttr('readonly');
        $('#tanggal_perkawinan').removeAttr('readonly');
        $('#nomor_akta_perceraian').attr('placeholder','Masukkan Nomor Akta Perceraian');
        $('#nomor_akta_perceraian').removeAttr('readonly');
        $('#tanggal_perceraian').removeAttr('readonly');
    }
}
