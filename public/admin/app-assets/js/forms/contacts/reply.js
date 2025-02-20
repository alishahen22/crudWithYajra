
$(document).on('click' , '.show-modal' , function() {

    var id    = $(this).data('id');
    var email = $(this).data('email');
    
    $('#item').val(id);
    $('#email').val(email);

    $(".modal").modal("show");

});

$("#message").keypress(function(){

    $('#append-valid').html('');
    
});

$('#reply-message').click(function() {

    var $message = $("#message");

    if($message.val() == '')
    {

        $('#append-valid').html('<p  style="color:red">برجاء ادخال نص الرسالة</p>');

    } else 
    {

        $('.loding_index').show();

        var item    = $('#item').val();
        var message = $('#message').val();
        var url = $(this).data('url');
        console.log(item);
        console.log(message);
        console.log(url);
        $.ajax({
            type: 'GET',
            url: url,
            data: {'id' : item , 'message' : message , '_token' : $('meta[name="csrf-token"]').attr('content')},               
            dataType: 'json',
            success: function(){
    
    
                const Toast2 = Swal.mixin({
    
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  });
                  
                  Toast2.fire({
                    title: 'تم الرد بنجاح',
                    // showConfirmButton: false,
                    icon: 'success',
                    timer: 1000
                });              
    
                setTimeout(() => {
                    $(".modal").modal("hide");
                    location.reload()
                }, 1500);
     
            }
    
        });        

    }

});

