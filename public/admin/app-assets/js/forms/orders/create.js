/**
 * DataTables Basic
 */

$(function () {

    $(document).on('click', '#show_modal_change_modal', function (e) {

        // $('#prodcut').html("");

        var status = $(this).attr('data-status');

        if (status == 'pending') {
            var append = 'هل تريد تأكيد الطلب ؟';
        } else if (status == 'accepted') {
            var append = 'هل الطلب في الطريق الي العميل ؟';
        } else if (status == 'in_way') {
            var append = 'هل تم استلام الطلب ؟';
        }

        $('#text-modal').html(append);
        $('.modal-status').modal('show');

    });


    $(document).on('click', '#change_status_order', function (e) {

        e.preventDefault();

        var url = $(this).data('action');
        var status = $(this).attr('data-status');
        var id = $(this).data('id');

        $.ajax({
            type: 'get',
            url: url,
            data: {
                'id': id,
                'status': status
            },
            dataType: 'json',
            success: function (result) {

                if (result.status == 'accepted') {

                    $('#reject_order').remove();

                }
                if (result.status == 'completed') {

                    $('#show_modal_change_modal').hide();

                }

                $('#status-' + result.status).find('img').removeClass('active_status');
                $('#show_modal_change_modal').attr('data-status', result.status);
                $('#change_status_order').attr('data-status', result.status);

                $('.modal').modal('hide');

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
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
                    title: result.message
                })

            } // end of success

        }); // end of ajax 



    });


    $(document).on('click', '#reject_order', function (e) {

        e.preventDefault();

        const Toast = Swal.mixin({

            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonColor: '#888',
            confirmButtonColor: '#d6210f',
            confirmButtonText: 'حذف',
            cancelButtonText: 'لا',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'question',
            title: 'هل تريد الغاء الطلب ؟'
        }).then((result) => {
            if (result.isConfirmed) {

                var url = $(this).data('action');
                var id = $(this).data('id');

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (result) {

                        // reloda page
                        $('#all_status').remove();

                        var append = `<div class="alert alert-danger"><strong>تم رفض الطلب بتاريخ ${result.date}</strong></div>`;

                        $('#append_rejected').html(append);

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
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
                            title: result.message
                        })

                    } // end of success

                }); // end of ajax 

            }
        }) // end of then

    });

    $(function () {

        $(".calendar").datepicker({
            dateFormat: 'yy-dd-mm',
            firstDay: 1
        });


        $(".calendar").on("change", function () {
            var $me = $(this),
                $selected = $me.val(),
                $parent = $me.parents('.date-picker');
            $('#date').val($selected);
            $parent.find('.result').children('span').html($selected);
        });

    });

    // ====================================================================
});
