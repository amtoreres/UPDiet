$(document).ready(function(){
    var u = "../user/";

    // redirect to corresponding form on signin page
    $(".profile").on("click", "#u-signup", function(){
        $.post("../backend/u_signin_state.php", {"u_signin_state": 0}, function(d,s){
            window.location.href = u;
        });
    });
    $(".profile").on("click", "#u-login", function(){
        $.post("../backend/u_signin_state.php", {"u_signin_state": 1}, function(d,s){
            window.location.href = u;
        });
    });
});