tipe();

$("#tipe").change(function () {
    tipe();
});

$(document).on("click", ".tambah", function (event){
    let card = $(this).parent().parent().parent().parent().parent();
    $("#pilihan").append(card[0].outerHTML);
    let nextCard = card[0].nextElementSibling;
    $(nextCard).find('input').val('');
});

$(document).on("click", ".hapus", function (event){
    let card = $(this).parent().parent().parent().parent().parent();
    if (card[0].parentElement.children.length > 1) {
        card[0].remove();
    } else {
        alert('Satu-satunya jawaban yang ada tidak dapat dihapus');
    }
});

$(document).on("click", ".atas", function (event){
    let change = $(this).parent().parent().parent().parent().parent().prev();
    let current = $(this).parent().parent().parent().parent().parent();
    if (change[0]) {
        changePosition(change[0], current[0]);
    }
});

$(document).on("click", ".bawah", function (event){
    let change = $(this).parent().parent().parent().parent().parent().next();
    let current = $(this).parent().parent().parent().parent().parent();
    if (change[0]) {
        changePosition(change[0], current[0]);
    }
});

$('form').on('submit', function(event) {
    event.preventDefault();
    const url = $(this).attr('action');
    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(data){
            $("#simpan").attr('disabled','disabled');
            $("#simpan").html(`<img height="20px" src="${baseURL}/storage/loading.gif" alt=""> Loading ...`);
        },
        success: function(response){
            $("#simpan").html('SIMPAN');
            $("#simpan").removeAttr('disabled');
            alertSuccess(response.message);
            setTimeout(() => {
                $(".notifikasi").html('');
            }, 3000);
            if (response.redirect) {
                location.href = response.redirect;
            }
        },
        error: function (response) {
            console.clear();
            $("#simpan").html('SIMPAN');
            $("#simpan").removeAttr('disabled');
            alertError();
            $.each(response.responseJSON.errors, function (i, e) {
                $('#pesanError').append(`<li>`+e+`</li>`);
                if (!$("[name='" + i + "']").hasClass('is-invalid')) {
                    $("[name='" + i + "']").addClass('is-invalid');
                    $("[name='" + i + "']").focus();
                }
            });
        }
    });
});

function tipe() {
    if ($("#tipe").val() == 3) {
        $("#angka").css('display','block');
        $("#pilihan").css('display','none');
        $("#bobot").attr('readonly','readonly');
    } else if ($("#tipe").val() == 1) {
        $("#angka").css('display','none');
        $("#pilihan").css('display','block');
        $("#bobot").removeAttr('readonly');
    } else {
        $("#angka").css('display','none');
        $("#pilihan").css('display','none');
        $("#bobot").attr('readonly','readonly');
    }
}

function changePosition(change, current) {
    const dataChange = change.innerHTML;
    const dataCurrent = current.innerHTML;
    change.innerHTML = dataCurrent;
    current.innerHTML = dataChange;
}
