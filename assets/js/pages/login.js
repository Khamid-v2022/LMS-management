'use strict';

(function () {
    $("#formAuthentication").on('submit', function(e){
        e.preventDefault();

        $("#login_btn").attr("disabled", true);
        $("#login_btn .fa-spinner").removeClass("d-none");

        $.post(SITE_URL + 'Auth/sign_in',
            { 
                email: $("#email").val(),
                password: $("#password").val()
            },
           function (response) {
                console.log(response);

                $("#login_btn").removeAttr("disabled");
                $("#login_btn .fa-spinner").addClass("d-none");

                if(response == "yes") {
                    location.href='/';
                } else {
                    $("#alert_message").html("Invalid Credentials");
                    $(".alert").removeClass("d-none");
                }
            }
        );
    })

})();


