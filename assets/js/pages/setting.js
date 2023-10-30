'use strict';

(function () {

    $("#formAccountSettings").on('submit', function(e){
        e.preventDefault();
        $("#confirm_modal").modal("show");
    })

    $("#form_account").on('submit', function(e){
        e.preventDefault();

        $("#m_update_btn").attr("disabled", true);
        $("#m_update_btn .fa-spinner").removeClass("d-none");

        $.post(SITE_URL + 'Setting/update_info',
            { 
                new_email: $("#email").val(),
                new_password: $("#password").val(),
                cur_email: $("#current_email").val(),
                cur_password: $("#current_password").val()
            },
           function (response) {
                $("#m_update_btn").removeAttr("disabled");
                $("#m_update_btn .fa-spinner").addClass("d-none");
                response = JSON.parse(response);
                if(response.status) {
                    $("#alert_message").html("Updated Successfully");
                    $("#alert").removeClass("d-none").addClass("alert-success");
                    $("#confirm_modal").modal("hide");
                } else {
                    $("#m_alert_message").html("Invalid Credentials");
                    $("#m_alert").removeClass("d-none").addClass("alert-danger");
                }
            }
        );
    })

})();


