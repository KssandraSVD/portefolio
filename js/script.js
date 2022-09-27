$(function() {

    $('#contact-form').submit(function(e){

        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();

        $.ajax({

            type : 'POST',
            url : 'php/contact.php',
            data : postdata,
            dataType : 'json',
            success : function(result) {

             if(result.isSuccess)
             {
                $("#contact-form").append("<p class='merci'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>");
                $("#contact-form")[0].reset();
             }
             else
             {
                $("#email + .comments").html(result.emailError);
                $("#message + .comments").html(result.messageError);
             }   

            }

        });
    });
})