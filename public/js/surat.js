$(document).on('change','#tampilkan_perihal',function(){
    if ($(this).prop('checked') == true) {
        $("#isian").prepend(`
            <div id="isian_perihal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Sifat</label>
                            <input class="form-control form-control-alternative" name="isi[]">
                            <input type="hidden" name="jenis_isi[]" value="4">
                            <input type="hidden" name="tampilkan[]" value="0">
                            <input type="hidden" name="isian[]" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Lampiran</label>
                            <input class="form-control form-control-alternative" name="isi[]">
                            <input type="hidden" name="jenis_isi[]" value="4">
                            <input type="hidden" name="tampilkan[]" value="0">
                            <input type="hidden" name="isian[]" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Perihal</label>
                            <input class="form-control form-control-alternative" name="isi[]">
                            <input type="hidden" name="jenis_isi[]" value="4">
                            <input type="hidden" name="tampilkan[]" value="0">
                            <input type="hidden" name="isian[]" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Kepada</label>
                            <input class="form-control form-control-alternative" name="isi[]">
                            <input type="hidden" name="jenis_isi[]" value="4">
                            <input type="hidden" name="tampilkan[]" value="0">
                            <input type="hidden" name="isian[]" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Di</label>
                            <input class="form-control form-control-alternative" name="isi[]">
                            <input type="hidden" name="jenis_isi[]" value="4">
                            <input type="hidden" name="tampilkan[]" value="0">
                            <input type="hidden" name="isian[]" value="">
                        </div>
                    </div>
                </div>
            </div>
        `);
    } else {
        $("#isian_perihal").remove();
    }
});

$(document).on('change',"input:checkbox",function () {
    if ($(this).prop('checked') == true) {
        $(this).next().val('1');
    } else {
        $(this).next().val('0');
    }
});

$(document).on('change','[name="jenis_isi[]"]',function () {
    const card = $(this).parents('.card')[0];
    const isi = $(card).find('[name="isi[]"]')[0];
    const isian = $(card).find('[name="isian[]"]')[0];
    const bantuan = $(card).find('.bantuan')[0];
    const tampil = $(card).find('[name="tampil[]"]')[0];
    if ($(this).val() == 1) {
        $(bantuan).css("display",'');
        $(bantuan).attr('href',`${baseURL}/img/bantuan-paragraf.png`);
        $(tampil).css("display",'');
        $(isi).attr('placeholder', 'Masukkan Paragraf ...');
        $(isian).css('display','none');
    } else if ($(this).val() == 2) {
        $(bantuan).css("display",'');
        $(bantuan).attr('href',`${baseURL}/img/bantuan-kalimat.png`);
        $(tampil).css("display",'');
        $(isi).attr('placeholder', 'Masukkan Kalimat ...');
        $(isian).css('display','none');
    } else if ($(this).val() == 3) {
        $(bantuan).css("display",'none');
        $(tampil).css("display",'none');
        $(isi).attr('placeholder', 'Masukkan Isian ...');
        $(isian).css('display','block');
    } else {
        $(bantuan).css("display",'');
        $(bantuan).attr('href',`${baseURL}/img/bantuan-subjudul.png`);
        $(tampil).css("display",'');
        $(isi).attr('placeholder', 'Masukkan Subjudul ...');
        $(isian).css('display','none');
    }
    $('[data-toggle="tooltip"]').tooltip();

});

$(document).on('click',".tambah-isian",function () {
    const card = $(this).parents('.card')[0];
    $(this).tooltip('hide');
    $("#isian").append(card.outerHTML);

    const next = card.nextElementSibling;
    $('[data-toggle="tooltip"]').tooltip();
    $(next).find('[name="isi[]"]').val('');
    $(next).find('[name="isian[]"]').val('');
    $(next).find('[name="tampil[]"]').prop('checked', false);
    $(next).find('[name="tampilkan[]"]').val(0);
    $(next).find('[name="isian[]"]').css('display','none');
    $(next).find('[name="jenis_isi[]"]').val(1);
});

$(document).on('click', '.hapus-isian', function () {
    $(this).tooltip('hide');
    if ($(this).parents('#isian').children().length > 1) {
        $(this).parents('.card')[0].remove();
    }
})

$(document).on('click', '.atas-isian', function () {
    $(this).tooltip('hide');
    const card = $(this).parents('.card')[0];
    if (card.previousElementSibling) {
        changePosition(card.previousElementSibling, card)
    }
})

$(document).on('click', '.bawah-isian', function () {
    $(this).tooltip('hide');
    const card = $(this).parents('.card')[0];
    if (card.nextElementSibling) {
        changePosition(card.nextElementSibling, card)
    }
})

function changePosition(change, current) {
    const dataChange = change.innerHTML;
    const dataCurrent = current.innerHTML;
    change.innerHTML = dataCurrent;
    current.innerHTML = dataChange;
}
