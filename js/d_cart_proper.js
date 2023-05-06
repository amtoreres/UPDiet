function update_checkout_button() {
    if($(".cart-items").children().length > 0) {
        $(".cart-submit").show();
    }
    else {
        $(".cart-submit").hide();
    }
}
$(document).ready(function(){
    //console.log($(".cart-items").height());
    //$(".cart-items").css("max-height", `${Math.round($(".cart-items").height())}px`);

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
        update_checkout_button();
    }
    else {
        //$(".content-cart").text("No results.");
    }
});