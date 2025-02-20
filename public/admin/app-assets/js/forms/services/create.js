
$(function () {

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/) || value == value.match(/^[\u0621-\u064A ]+$/);
    });

    'use strict';
    var $form = $("#form-update-service");
    $form.validate({
        lang: 'ar',
        rules: {
            title_ar: {
                required: true,
            },
            title_en: {
                required: true,
            },
            desc_ar: {
                required: true,
            },
            desc_en: {
                required: true,
            },
            price: {
                required: true,
                number: true,
            },
            image: {
                required: true,
            },
        },

        messages: {

        },
        submitHandler: function () {
            $form[0].submit();
        }
    });

});





$(document).on('click', '.delete_item_feature', function () {

    $(this).closest('.item').remove();

});



$('.add_item_feature').click(function () {

    var append = `<div class="row item">
                    <div class="col-5">
                        <div class="form-group" id="content_ar">
                            <input type="text" class="form-control" value="" name="content_ar[]" placeholder="المحتوي بالعربي" aria-label="" />

                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group" id="content_en">
                            <input type="text" class="form-control" value="" name="content_en[]" placeholder="المحتوي بالانجليزي" aria-label="" />

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group" id="dis_content_en">

                            <button class="btn btn-danger btn-block delete_item_feature" type="button"><i class="fa fa-trash"></i></button>

                        </div>
                    </div>
                </div>`

    $('.append_here_feature').append(append);
});
