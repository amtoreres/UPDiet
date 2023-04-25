$(document).ready(function(){
    // destroy session and reload page
    $(".logout").on("click", "#logout", function(){
        $.post("../backend/logout.php", {"u_type": "user"}, function(d,s){
            window.location.href = "../user/";
        });
    })
});