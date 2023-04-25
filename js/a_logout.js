$(document).ready(function(){
    // destroy session and reload page
    $(".nav").on("click", "#logout", function(){
        $.post("../backend/logout.php", {"u_type": "admin"}, function(d,s){
            window.location.href = "../admin/";
        });
    })
});