document.addEventListener("keydown", function (event) {
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
    const select = $(this).attr('value', this.value);
    $.each(this, function (key, item){
        if($(item).val() == $(select).attr('value')) {
            $(this).attr('selected', $(this).prop('selected'));
        } else {
            $(this).attr('selected', $(this).prop('selected'));
        };
    });
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

$(document).on('click', '.hapus-data', function (event) {
    event.preventDefault();
    $('#modal-hapus').modal('show');
    $('#nama-hapus').html('Apakah Anda yakin ingin menghapus ' + $(this).data('nama') + '???');
    $('#form-hapus').attr('action', $(this).data('action'));
});

$(document).on("submit", "form", function () {
    $(this).find("button:submit").attr('disabled', 'disabled');
    $(this).find("button:submit").html(`<img height="20px" src="${baseURL}/storage/loading.gif" alt=""> Loading ...`);
});

function alertSuccess(pesan) {
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

function alertFail(pesan) {
    $('.notifikasi').html(`
        <div class="alert alert-danger alert-dismissible fade show">
            <span class="alert-icon"><i class="fas fa-times-circle"></i> <strong>Berhasil</strong></span>
            <span class="alert-text">
                ${pesan}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `);
}

function alertError() {
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

function uploadImage(inputFile) {
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
        $('#nomor_akta_perkawinan').attr('placeholder', '');
        $('#nomor_akta_perkawinan').attr('readonly', 'true');
        $('#nomor_akta_perkawinan').val('');
        $('#tanggal_perkawinan').attr('readonly', 'true');
        $('#tanggal_perkawinan').val('');
        $('#nomor_akta_perceraian').attr('placeholder', '');
        $('#nomor_akta_perceraian').attr('readonly', 'true');
        $('#nomor_akta_perceraian').val('');
        $('#tanggal_perceraian').attr('readonly', 'true');
        $('#tanggal_perceraian').val('');
    } else if ($('#status_perkawinan_id').val() == 2) {
        $('#nomor_akta_perkawinan').attr('placeholder', 'Masukkan Nomor Akta Perkawinan');
        $('#nomor_akta_perkawinan').removeAttr('readonly');
        $('#tanggal_perkawinan').removeAttr('readonly');
        $('#nomor_akta_perceraian').attr('placeholder', '');
        $('#nomor_akta_perceraian').val('');
        $('#nomor_akta_perceraian').attr('readonly', 'true');
        $('#tanggal_perceraian').attr('readonly', 'true');
        $('#tanggal_perceraian').val('');
    } else {
        $('#nomor_akta_perkawinan').attr('placeholder', 'Masukkan Nomor Akta Perkawinan');
        $('#nomor_akta_perkawinan').removeAttr('readonly');
        $('#tanggal_perkawinan').removeAttr('readonly');
        $('#nomor_akta_perceraian').attr('placeholder', 'Masukkan Nomor Akta Perceraian');
        $('#nomor_akta_perceraian').removeAttr('readonly');
        $('#tanggal_perceraian').removeAttr('readonly');
    }
}

!(function ($) {
    "use strict";

    /* 1. Proloder */
    $(window).on('load', function () {
        $('#preloader-active').delay(450).fadeOut('slow');
        $('body').delay(450).css({
            'overflow': 'visible'
        });
    });
    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $('#header').outerHeight() - 1;
    $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();
                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
                if ($(this).parents('.nav-menu, .mobile-nav').length) {
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('fas fa-bars fas fa-times');
                    $('.mobile-nav-overly').fadeOut();
                }
                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function () {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });

    // Mobile Navigation
    if ($('.nav-menu').length) {
        var $mobile_nav = $('.nav-menu').clone().prop({
            class: 'mobile-nav d-lg-none'
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none text-white"><i class="fas fa-bars"></i></button>');
        $('body').append('<div class="mobile-nav-overly"></div>');
        $(document).on('click', '.mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('fas fa-bars fas fa-times');
            $('.mobile-nav-overly').toggle();
        });
        $(document).on('click', '.mobile-nav .drop-down > a', function (e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass('active');
        });
        $(document).click(function (e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('fas fa-bars fas fa-times');
                    $('.mobile-nav-overly').fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }

    // Stick the header at top on scroll
    $("#header").sticky({
        topSpacing: 0,
        zIndex: '50'
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });

})(jQuery);
