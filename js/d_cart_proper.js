$(".content-cart").ready(function(){
    if(kc.length > 0) {   
        // ajax with async to prevent break in order
        kc.forEach(function(i){    
            //console.log(i); 
            $.ajax({
                type: "POST",
                url: "../template/cart_item.php",
                data: i,
                async: false,
                success: function(d) {
                    $(".cart-items").append(d);
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