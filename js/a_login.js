$(document).ready(function(){
    // remove error msg on input
    $(".form").on("input", "input", function(){
        $("#error-msg").text("");
    });

    // post credentials to backend
    $(".form").on("click", "#submit", function(){
        var k = {
            "submit": true,
            "form": "login",
            "u_type": "admin",
            "email": $("#email").val(),
            "password": $("#password").val()
        };

        $.post("../backend/signin_submit.php", k, function(d,s){
            var r = JSON.parse(d);

            if(r["op_status"]) window.location.href ="profile.php";
            else $("#error-msg").text(r["msg"]);
        });
    });
});