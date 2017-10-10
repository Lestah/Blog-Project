$(document).ready(function() {
    $("#createPost").unbind('submit1').bind('submit1', function() {
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success:function(response) { 

                if(response.success == true) {
                    alert(response.success);
                    alert(response.messages);
                    /*$("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                      response.messages+
                    '</div>');
                    $('#registrationsuccess').html('Succesfully Registered Please Login').fadeIn('slow').delay(9000).fadeOut('slow');
                    $('#btnRegister').remove();

                    $("#signinForm")[0].reset();
                    $(".text-danger").remove();
                    $(".form-group").removeClass('has-error').removeClass('has-success');*/
                    

                } else {
                    alert(response.success)
                    /*$.each(response.messages, function(index, value) {
                        var element = $("#"+index);

                        $(element)
                        .closest('.form-group')
                        .removeClass('has-error')
                        .removeClass('has-success')
                        .addClass(value.length > 0 ? 'has-error' : 'has-success')
                        .find('.text-danger').remove();

                        $(element).after(value);
                        

                    });*/
                    
                }
            } // /success
        });  // /ajax

        return false;
    }); 
});