function is_alphanumeric(s) {
    return s.match(/^[a-z0-9]+$/i);
}

function verify_form() {
    if(is_valid_usr && is_valid_em && is_valid_pw && is_valid_num)
    {
        $("#submit").attr("disabled", false);
        $("#error-msg").text("");
    }
    else 
    {
        $("#submit").attr("disabled", true);

        if(!is_valid_usr && $("#username").val() != "") 
            $("#error-msg").text("Invalid username.");
        else if(!is_valid_em && $("#email").val() != "") 
            $("#error-msg").text(msg);
        else if(!is_valid_pw && $("#password").val() != "") 
            $("#error-msg").text("Invalid password.");
        else if(!is_valid_num && $("#c_num").val() != "") 
            $("#error-msg").text("Invalid contact number.");
        else
            $("#error-msg").text("");
    }
}

$(document).ready(function(){
    $(".form").off("input");
    $(".form").on("input", "#username", function(){
        is_valid_usr = $("#username").val().match(/^[^ ]+.[^ ]+$/) ? true : false;

        verify_form();
    });

    $(".form").on("input", "#email", function(){
        // allow emails ending in up.edu.ph only
        is_valid_em = $("#email").val().match(/^\w+([\.-]?\w+)*@up\.edu\.ph$/) ? true : false;

        // chck if email exists
        if(is_valid_em){
            $.post("../backend/email_check.php", {"email": $("#email").val(), "u_type": "user"}, function(d,s){
                var r = JSON.parse(d);

                if(r["op_status"]) is_valid_em = true;
                else {
                    msg = "Email already exists.";
                    is_valid_em = false;
                }

                verify_form();
            })
        }
        else verify_form();
    });

    $(".form").on("input", "#password", function(){
        is_valid_pw = $("#password").val().trim() === "" ? false : true;

        verify_form();
    });
    
    $(".form").on("input", "#c_num", function(){
        // allow only 11-digit numeric
        is_valid_num = $("#c_num").val().match(/^$|(09[0-9]{9})+/) ? true : false;
        verify_form();
    });
});

var is_valid_usr = false;
var is_valid_em = false;
var is_valid_pw = false;
var is_valid_num = false;

var msg = "Invalid email.";