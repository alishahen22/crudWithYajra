
$(function () {

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/) || value == value.match(/^[\u0621-\u064A ]+$/);
    });

    'use strict';
    var $form = $("#form-reply");
    $form.validate({
        lang: 'ar',
        rules: {

        },

        messages: {

        },
        submitHandler: function () {
            $form[0].submit();
        }
    });

});
