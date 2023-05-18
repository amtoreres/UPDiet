$(document).ready(function(){
    //console.log($(".cart-items").height());
    //$(".cart-items").css("max-height", `${Math.round($(".cart-items").height())}px`);

    //console.log(ko.length);

    if(kop.length > 0) {   
        // ajax with async to prevent break in order
        kop.forEach(function(i){    
            //console.log(i); 
            $.ajax({
                type: "POST",
                url: "../template/preview_item.php",
                data: i,
                async: false,
                success: function(d) {
                    $(".preview-list").append(d);
                    //console.log(d);
                },
                error: function(d) {
                    //console.log(d);
                }
            })
            /*
            $.post("../template/menu_item.php", i, function(d,s){
                $(".content-cart").append(d);
            });
            */
        });
    }
    else {
        $(".preview-list").append("No pending orders.");
        $(".preview-control").hide();
    }
});