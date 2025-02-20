/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var pageResetPasswordForm = $('.auth-reset-password-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageResetPasswordForm.length) {
    pageResetPasswordForm.validate({
      /*
      * ? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },*/
      /*
      * ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, */
      rules: {
        'new_password': {
          required: true,
          minlength: 5,
        },
        'confirm_new_password': {
          required: true,
          minlength: 5,
          equalTo: '#reset-password-new'
        }
      },
      messages: {
        'new_password': {
          required : 'برجاء ادخال كلمة المرور الجديدة',
          minlength : 'يجب ان تكون كلمة المرور لا تقل عن 5 حروف',
        },
        'confirm_new_password': {
          required : 'برجاء ادخال تأكيد كلمة المرور الجديدة',
          equalTo : 'يجب ان يكون تأكيد كبمة المرور مطابق لكلمة المرور الجديدة',
          minlength : 'يجب ان تكون كلمة المرور لا تقل عن 5 حروف',

        }
      }      
    });
  }
});
