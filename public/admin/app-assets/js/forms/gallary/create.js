
$(function () {

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/) || value == value.match(/^[\u0621-\u064A ]+$/);
    });

    'use strict';
    var $form = $("#needs-validation");
    $form.validate({
        lang: 'ar',
        rules: {
            // name: {
            //     required: true,
            //     letters: true

            // },
            // category_id: {
            //     required: true
            // },
        },

        messages: {
            name: {
                required: 'برجاء ادخال اسم الشركة',
                letters: 'يجب ان يكون اسم الشركة مكون من حروف'
            },
            category_id: {
                required: 'برجاء ادخال اسم التصنيف'
            }
        },
        submitHandler: function () {
            $form[0].submit();
        }
    });


    function _(el) {
        return document.getElementById(el);
    }


    function uploadFile() {
        var file = _("vedio").files[0];
        // alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("file", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "file_upload_parser.php");
        ajax.send(formdata);
    }

    function progressHandler(event) {
        $("#progressBar").show().css("display", "block");;
        _("loaded_n_total").innerHTML = "تم تحميل " + event.loaded + " من " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = "  جاري التحميل " + Math.round(percent) + "%";
    }

    function completeHandler(event) {
        $("#progressBar").hide().css("display", "none");
        _("status").innerHTML = "  تم التحميل ";
        _("progressBar").value = 0; //wil clear progress bar after successful upload
    }

    function errorHandler(event) {
        _("status").innerHTML = "فشل التحميل";
    }

    function abortHandler(event) {
        _("status").innerHTML = "تم إلغاء التحميل";
    }

    $("#vedio").change(function () {
        uploadFile()
    });


    $(".check_vedio_or_image").click(function () {

        var value = $(this).val();

        if (value == 'image') {
            $('#show_image').show();
            $('#show_vedio').hide();
        } else {
            $('#show_vedio').show();
            $('#show_image').hide();
        }

    });

});
