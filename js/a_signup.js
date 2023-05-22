function is_alphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function verify_form()
{
    if(is_valid_nm && is_valid_em && is_valid_pw && is_valid_num && is_valid_loc)
    {
        $("#submit").attr("disabled", false);
        $("#error-msg").text("");
    }
    else 
    {
        $("#submit").attr("disabled", true);

        if(!is_valid_nm && $("#name").val() != "") 
            $("#error-msg").text(msg);
        else if(!is_valid_em && $("#email").val() != "") 
            $("#error-msg").text(msg);
        else if(!is_valid_pw && $("#password").val() != "") 
            $("#error-msg").text("Invalid password.");
        else if(!is_valid_num && $("#c_num").val() != "") 
            $("#error-msg").text("Invalid number.");
        else
            $("#error-msg").text("");
    }
}

$(document).ready(function(){
    $(".form-proper").on("input", "#name", function(){
        is_valid_nm = $("#name").val().match(/^(?!\s).+(?<!\s)$/) ? true : false;
        msg = is_valid_nm ? "" : "Invalid store name.";

        // check if store name exists
        if(is_valid_nm){
            $.post("../backend/a_name_check.php", {"name": $("#name").val()}, function(d,s){
                //console.log(s);
                var r = JSON.parse(d);

                if(r["op_status"]) is_valid_nm = true;
                else {d
                    msg = "Store name already exists.";
                    is_valid_nm = false;
                }

                verify_form();
            })
        }
        else verify_form();
    });

    $(".form-proper").on("input", "#email", function(){
        // check if valid email and not ending in 'up.edu.ph'
        is_valid_em = $("#email").val().match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) ? true : false;
        if(is_valid_em) {
            $.post("../backend/email_check.php", {"email": $("#email").val(), "u_type": "admin"}, function(d,s){
                var r = JSON.parse(d);

                if(r["op_status"]) is_valid_em = true;
                else {
                    msg = "Email already exists.";
                    is_valid_em = false;
                }

                verify_form();
            })
        }
        else msg = "Invalid email.";

        verify_form();
    });

    $(".form-proper").on("input", "#password", function(){
        is_valid_pw = $("#password").val().trim() === "" ? false : true;

        verify_form();
    });

    $(".form-proper").on("input", "#c_num", function(){
        is_valid_num = $("#c_num").val().match(/^09[0-9]{9}/) ? true : false;
        //console.log(is_valid_num);
        verify_form();
    });

    $(".form-proper").on("input", "#location", function(){
        is_valid_loc = $("#is_valid_loc").val() == "" ? false: true;

        verify_form();
    });

    $(".form-proper").on("click", "#submit", function(){
        var k = {
            "submit": true,
            "form": "signup",
            "u_type": "admin",
            "name": $("#name").val(),
            "email": $("#email").val(),
            "password": $("#password").val(),
            "c_num": $("#c_num").val(),
            "location": $("#location").val(),
        }

        $.post("../backend/signin_submit.php", k, function(d,s){
            window.location.href = "profile.php";
        });
    });
});

var is_valid_nm = false;
var is_valid_em = false;
var is_valid_pw = false;
var is_valid_num = false;
var is_valid_loc = false;

var msg = "";