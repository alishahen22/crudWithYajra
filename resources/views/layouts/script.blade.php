   <!-- BEGIN: Vendor JS-->
   <script src="{{ url('admin') }}/app-assets/vendors/js/vendors.min.js"></script>
   <!-- BEGIN Vendor JS-->

   <!-- BEGIN: Page Vendor JS-->
   <!-- <script src="{{ url('admin') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script> -->
   <script src="{{ url('admin') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>
   <script src="{{ url('admin') }}/app-assets/vendors/js/extensions/moment.min.js"></script>


   <!-- <script src="{{url('admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{url('admin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('admin/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>    
 -->

   <!-- BEGIN: Theme JS-->
   <script src="{{ url('admin') }}/app-assets/js/core/app-menu.js"></script>
   <script src="{{ url('admin') }}/app-assets/js/core/app.js"></script>
   <!-- END: Theme JS-->
   <script src="{{ url('admin') }}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>



   <!-- BEGIN: Page JS-->
   <!-- <script src="{{ url('admin') }}/app-assets/js/scripts/pages/dashboard-analytics.js"></script> -->
   <script src="{{ url('admin') }}/app-assets/js/scripts/pages/app-invoice-list.js"></script>
   <!-- END: Page JS-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


   <!-- custom  -->
   <!-- <script src="{{ url('admin') }}/app-assets/js/custom/custom-validate.js"></script> -->
   <!-- <script src="{{ url('admin') }}/app-assets/js/custom/export.js"></script> -->
   <script src="{{ url('admin') }}/app-assets/js/custom/custom-delete.js"></script>
   <script src="{{ url('admin') }}/app-assets/js/custom/preview-image.js"></script>
   <!-- <script src="{{ url('admin') }}/app-assets/js/forms/public/search.js"></script> -->
   <!-- custom  -->

    <!-- BEGIN: Page JS-->
    <script src="{{ url('admin') }}/app-assets/js/scripts/pages/app-ecommerce-checkout.js"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ url('admin') }}/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="{{ url('admin') }}/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="{{ url('admin') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS--> 

   @if (App::getLocale() == 'ar')

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/localization/messages_ar.min.js"></script>

   @endif


   @stack('js')

   <script>
       $(window).on('load', function() {
           if (feather) {
               feather.replace({
                   width: 14,
                   height: 14
               });
           }
       })

       // $('table').DataTable({
       //     "language": {
       //         //for arabic language
       //         "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
       //     }            
       // });
   </script>

   {{-- Sweet Alerts Start --}}
   @if(session()->has('success'))
   <script>
       const Toast = Swal.mixin({
           toast: true,
           position: 'top-start',
           showConfirmButton: false,
           timer: 4000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
       })

       Toast.fire({
           icon: 'success',
           title: "{{ session()->get('success') }}"
       })
   </script>
   @endif

   @if(session()->has('error'))
   <script>
       const Toast = Swal.mixin({
           toast: true,
           position: 'top-start',
           showConfirmButton: false,
           timer: 4000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
       })

       Toast.fire({
           icon: 'error',
           title: "{{ session()->get('error') }}"
       })
   </script>
   @endif