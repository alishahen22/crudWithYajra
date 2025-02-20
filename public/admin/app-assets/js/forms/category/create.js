
$(function () {

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/) || value == value.match(/^[\u0621-\u064A ]+$/);
    });       

    'use strict';
    var $form = $(".needs-validation");
    $form.validate({
        lang: 'ar',
        rules: {
            name : {
                required : true,
                // letters: true

            },
            category_id : {
                required : true
            },            
        },

        messages: {
            name : {
                required : 'برجاء ادخال البيانات',
                // letters : 'يجب ان يكون اسم الشركة مكون من حروف'
            },
            category_id : {
                required : 'برجاء ادخال اسم التصنيف'
            }
        },
        submitHandler: function () {
            $form[0].submit();
        }
    });

});
