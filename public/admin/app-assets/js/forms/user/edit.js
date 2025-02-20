
$(function () {

    var lang = $('#locale').attr('lang');

    if (lang == 'ar') {
        var message_time_from = 'يجب ان يكون وقت البداية اضغر من وقت النهاية';
    } else {
        var message_time_from = 'The start time must be less than the end time';
    }

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/) || value == value.match(/^[\u0621-\u064A ]+$/);
    });

    $.validator.addMethod('greaterThanTime', function (value) {
        return parseFloat(value) > parseFloat($('#job_time_from').val());
    }, message_time_from);



    'use strict';
    var $form = $("#from-user-edit");
    $form.validate({
        lang: 'ar',
        rules: {
            job_time_to: {
                greaterThanTime: true
            },
        },

        messages: {

        },
        submitHandler: function () {
            $form[0].submit();
        }
    });
});

$('.check-all-permission').click(function () {

    var role_id = $(this).data('id');

    if (this.checked) {

        document.querySelector(".permission-" + role_id).checked = localStorage.checked == true
        $(".permission-" + role_id).prop("checked", true);
        $(".permission-" + role_id).attr("checked", "checked");

    } else {
        document.querySelector(".permission-" + role_id).checked = localStorage.checked == false
        $("#role-" + role_id).prop("checked", false);
        $(".permission-" + role_id).removeAttr("checked", "checked");            
        $(".permission-" + role_id).prop("checked", false);
        
    }

});