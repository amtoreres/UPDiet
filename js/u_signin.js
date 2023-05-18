$(document).ready(function(){
    // update state on form change
    $(".form").on("click", "#signup-link", function(){
        $.post("../backend/u_signin_state.php", {"u_signin_state": 0}, function(d,s){
            $(".form").load('signup.php');
            u_signin_state = 0;
        });
    });
    $(".form").on("click", "#login-link", function(){
        $.post("../backend/u_signin_state.php", {"u_signin_state": 1}, function(d,s){
            $(".form").load('login.php');
            u_signin_state = 1;
        });
    });

    // post credentials to backend
    $(".form").on("click", "#submit", function(){
        var k = {
            "submit": true,
            "u_type": "user",
            "email": $("#email").val(),
            "password": $("#password").val(),
            "username": $("#username").val(),
            "c_num": $("#c_num").val(),
        };

        $.post("../backend/signin_submit.php", k, function(d,s){
            var r = JSON.parse(d);

            if(r["op_status"]) window.location.href ="../dashboard/";
            else $("#error-msg").text(r["msg"]);
        });
    });
});