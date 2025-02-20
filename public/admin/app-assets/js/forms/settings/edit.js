
$(function () {

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/) || value == value.match(/^[\u0621-\u064A ]+$/);
    });

    'use strict';
    var $form = $("#form-update-setting");
    $form.validate({
        lang: 'ar',
        rules: {
            name_site_ar: {
                required: true
            },
            name_admin_ar: {
                required: true
            },
            notes_register_ar: {
                required: true
            },
            about_ar: {
                required: true
            },
            information_ar: {
                required: true
            },
            help_center_ar: {
                required: true
            },
            privacy_ar: {
                required: true
            },
            terms_ar: {
                required: true
            },
            message_today_ar: {
                required: true
            },
            instructions_ar: {
                required: true
            },
            text_tirms_registe_one_ar: {
                required: true
            },
            text_tirms_registe_two_ar: {
                required: true
            },
        },

        messages: {
            name: {
                required: 'برجاء ادخال البيانات',
                // letters : 'يجب ان يكون اسم الشركة مكون من حروف'
            },
            category_id: {
                required: 'برجاء ادخال اسم التصنيف'
            }
        },
        submitHandler: function () {
            $form[0].submit();
        }
    });

});





$(document).on('click', '.delete_item_number_contact', function () {

    $(this).closest('.item').remove();

});
$(document).on('click', '.delete_item_phone', function () {

    $(this).closest('.item').remove();

});


$('.add_item_number_contact').click(function () {

    var append = `<div class="row item">
                    <div class="col-9">
                        <div class="form-group" id="dis_content_en">
                            <input type="text" class="form-control" value="" name="number_contact[]" placeholder="" aria-label="" />

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group" id="dis_content_en">

                            <button class="btn btn-danger delete_item_number_contact" type="button"><i class="fa fa-trash"></i></button>

                        </div>
                    </div>
                </div>`

    $('.append_here_instructions').append(append);
});
$('.add_item_phone').click(function () {

    var append = `<div class="row item">
                    <div class="col-9">
                        <div class="form-group" id="dis_content_en">
                            <input type="text" class="form-control" value="" name="phones[]" placeholder="" aria-label="" />

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group" id="dis_content_en">

                            <button class="btn btn-danger delete_item_phone" type="button"><i class="fa fa-trash"></i></button>

                        </div>
                    </div>
                </div>`

    $('.append_here_information').append(append);
});
