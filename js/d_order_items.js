$(document).ready(function(){
    //console.log($(".cart-items").height());
    $(".o-item-items").css("max-height", `${Math.round($(".o-item-items").height())}px`);

    //console.log(ko.length);

    if(koi.length > 0) {   
        // ajax with async to prevent break in order
        koi.forEach(function(i){    
            //console.log(i); 
            $.ajax({
                type: "POST",
                url: "../template/purchase_item.php",
                data: i,
                async: false,
                success: function(d) {
                    $(".o-item-items").append(d);
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
        //$(".content-cart").text("No results.");
    }
});