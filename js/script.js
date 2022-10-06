$(function () {

    $('#contact-form').submit(function(e){
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'post',
            url: 'php/contact.php',
            data: postdata,
            dataType: 'json',
            succes: function(result) {

                if(result.isSucces)
                {
                    $("#contact-form").append("<p class='merci'>Votre message a bien été envoyé. Merci de m'avoir contacté</p>");
                    $("#contact-form")[0].reset();
                }
                else
                {
                    $("#email + .comments").html(result.emailError);
                    $("#prenom + .comments").html(result.prenomError);
                    $("#nom + .comments").html(result.nomError);
                    $("#message + .comments").html(result.messageError);
                }
            }
        });
    });
})