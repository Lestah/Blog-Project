$(document).ready(function() {
  $("#loginForm").unbind('submit').bind('submit', function() {
    var form = $(this);

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(),
      dataType: 'json',
      success:function(response) {        
        if(response.success == true) {
          $('#loginsuccess').html('Welcome').fadeIn().delay(5000).fadeOut('slow');
          $(".text-danger").remove();
          $(".form-group").removeClass('has-error').removeClass('has-success');

          //window.location = response.messages;
          $("li").remove(".navLoginBtn");
          $("a").remove(".navLoginBtn");
          $("ul").append("<li><a href=''>Hello " + response.username + "</a></li>");
          $("ul").append("<li><a href='' id='brnLogout'>Logout</a><li>");
          $("#myModal").modal('hide');




        }
        else {
          $('#loginsuccess').html('Incorrect Email/Password combination').fadeIn().delay(5000).fadeOut('slow');
            /*$("#loginsuccess").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              response.messages+
          '</div>');*/

            $(".text-danger").remove();
            $(".form-group").removeClass('has-error').removeClass('has-success');         
          
            
        }
      } // /success
    });  // /ajax

    return false;
  }); 
});