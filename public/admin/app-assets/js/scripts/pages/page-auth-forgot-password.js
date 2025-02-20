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

  var pageForgotPasswordForm = $('.auth-forgot-password-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageForgotPasswordForm.length) {
    pageForgotPasswordForm.validate({
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
        'email': {
          required: true,
          email: true
        }
      },
      messages: {
        'email': {
          required : 'برجاء ادخال بريدك الالكتروني',
          email : 'يجب ان يكون الحقل بريد الكتروني مثال name@gmail.com'
        }
      }
    });
  }
});
