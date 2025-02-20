let rectangle;
let map;
let infoWindow;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 44.5452,
            lng: -78.5389
        },
        zoom: 9,
    });

    const bounds = {
        north: 44.662072260939276,
        south: 44.42832773906073,
        east: -78.37491405329162,
        west: -78.70288594670838,
    };

    // Define the circle and set its editable property to true.
    rectangle = new google.maps.Circle({
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
        map: map,
        center: {
            lat: 44.5452,
            lng: -78.5389
        },
        radius: 30000,
        draggable: true,
        editable: true,
        bounds: bounds,
    });


    rectangle.setMap(map);
    // Add an event listener on the rectangle.
    rectangle.addListener("bounds_changed", showNewRect);
    // Define an info window on the map.
    infoWindow = new google.maps.InfoWindow();
}

/** Show the new coordinates for the rectangle in an info window. */
function showNewRect() {

    // get redius
    let radius = rectangle.getRadius();

    // get lng south west
    let sw = rectangle.getBounds().getSouthWest();
    // get lat north east
    let ne = rectangle.getBounds().getNorthEast();


    const contentString =
        "<b>Rectangle moved.</b><br>" +
        "New north-east corner: " +
        ne.lat() +
        ", " +
        ne.lng() +
        "<br>" +
        "New south-west corner: " +
        sw.lat() +
        ", " +
        sw.lng();

    // Set the info window's content and position.
    infoWindow.setContent(contentString);
    infoWindow.setPosition(ne);
    infoWindow.open(map);

    // get id lat and lng
    $('#lat_ne').val(ne.lat());
    $('#lng_ne').val(ne.lng());
    $('#lat_sw').val(sw.lat());
    $('#lng_sw').val(sw.lng());
    $('#radius').val(radius);

}

window.initMap = initMap;



$(function () {

    var lang = $('#locale').attr('lang');

    if (lang == 'ar') {
        var message_time_from = 'يجب ان يكون وقت البداية اضغر من وقت النهاية';
        var message_date = 'يجب ان يكون تاريخ الاذن اكبر من تاريخ اليوم';

    } else {
        var message_time_from = 'The start time must be less than the end time';
        var message_date = 'The start date must be greater than the end date';
    }

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/) || value == value.match(/^[\u0621-\u064A ]+$/);
    });

    $.validator.addMethod('greaterThanTime', function (value) {
        return parseFloat(value) > parseFloat($('#job_time_from').val());
    }, message_time_from);

    $.validator.addMethod('greaterThanDate', function (value) {
        // get date today and compare with the date entered
        var today = new Date();
        var date = new Date(value);
        return date > today;

    }, message_date);

    'use strict';
    var $form = $("#from-user");
    $form.validate({
        lang: 'ar',
        rules: {
            date_register: {
                greaterThanDate: true
            },
        },

        messages: {

        },
        submitHandler: function () {
            $form[0].submit();
        }
    });
});

// item-start-job

var lang = $('#locale').attr('lang');

if (lang == 'ar') {
    var how = 'هل تريد بدء العمل لهذا الموظف؟ , ملحوظه عند بدأ العمل بناءا علية يتم عمل تقرير الموظف';
    var yes = 'نعم';
    var no = 'لا';
    var done_start_job_success = 'تم بدء العمل بنجاح';
} else {
    var how = 'Do you want to start this job for this employee? , note that when you start the job, a report will be generated for the employee';
    var yes = 'Yes';
    var no = 'No';
    var done_start_job_success = 'The job has been started successfully';
}


$(document).ready(function () {

    $(document).on('click', '.item-start-job', function (e) {

        e.preventDefault();

        const Toast = Swal.mixin({

            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonColor: '#888',
            confirmButtonColor: '#d6210f',
            confirmButtonText: yes,
            cancelButtonText: no,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'question',
            title: how,
        }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).data('id');
                var url = $(this).attr('href');
                var elem = $(this).closest('tr');

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        // _method : 'delete',
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id,
                    },
                    dataType: 'json',
                    success: function (result) {

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
                            title: result.message,
                        })

                        // reload page
                        setTimeout(function () {
                            location.reload();
                        }, 2000);

                    } // end of success

                }); // end of ajax

            } else if (result.dismiss === Swal.DismissReason.cancel) {



            } // end of else confirmed

        }) // end of then
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