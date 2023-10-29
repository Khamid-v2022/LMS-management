'use strict';

(function () {
    $("#generate_password").on("click", function(){
        
        let emails = $("#emails").val().trim();
        if(!emails) {
            $("#alert_message").html("Pelase enter email address");
            $(".alert").removeClass("d-none");
            $("#emails").focus();
            return;
        }

        $(".alert").addClass("d-none");

        let email_list = emails.split(",");

        let table_html = "";

        if(email_list.length > 0) {
            let html = "";
            for(let index = 0; index < email_list.length; index++){
                let email = email_list[index].trim();
                if(email) {
                    html += "<tr class='email-item'>";
                        html += "<td>" + (index + 1) + "</td>";
                        html += "<td class='email' data-email='" + email + "'>" + email + "</td>";
                        html += "<td class='password'>" + generateRandomPassword(8) + "</td>";
                        html += "<td><a href='javascript:;' class='change-password' title='generate another password'><i class='bx bx-reset'></i></a></td>";
                    html += "</tr>";
                }
            }

            $("#generated_password_tbody").html(html);
            
            $(".change-password").on("click", function(){
                let password = generateRandomPassword(8);
                $(this).parents(".email-item").find(".password").html(password);
            })

            $(".generate-password-table").removeClass("d-none");
        }
    })

    $("#replace_password").on("click", function(){
        let email_array = [];
        $(".email-item").each(function(){
            email_array.push({email: $(this).find(".email").html(), password: $(this).find(".password").html()});
        })

        const replace_password_endpoint = SITE_URL + 'ResetPassword/replace_password';

        $(this).attr("disabled", true);
        $("#generate_password").attr("disabled", true);
        $("#replace_password .fa-spinner").removeClass("d-none");

        $.ajax({
            type: "POST",
            url: replace_password_endpoint,
            data: { email_array : JSON.stringify(email_array) },
            dataType: "json",
            success: function (response) {
                $("#replace_password").removeAttr("disabled");
                $("#generate_password").removeAttr("disabled", true);
                $("#replace_password .fa-spinner").addClass("d-none");
                // response = JSON.parse(response);
                if(response.status) {
                    if(response.msg.invalid_emails.length > 0) {
                        response.msg.invalid_emails.forEach((item) => {
                            $(".email[data-email='" + item.email + "']").parents(".email-item").addClass("table-danger").attr("title", "Invalid email");
                        })
                    }   
                }
            }
        });
        
    })
})();

function generateRandomPassword(length) {
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
    let password = "";
  
    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * charset.length);
      password += charset[randomIndex];
    }
  
    return password;
}
