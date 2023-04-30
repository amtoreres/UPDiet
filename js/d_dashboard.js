$(document).ready(function(){
    $(".content").on("click", ".store-content", function(){
        $.post("../backend/d_store_set.php", {"store": $(this).attr("id")}, function(){
            window.location.href = "store.php";
        })
    });
    
    $("#prof-trigger").trigger("click");
});