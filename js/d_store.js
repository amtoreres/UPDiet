function update_checkout_button() {
    if($(".cart-items").children().length > 0) {
        $(".cart-submit").show();
    }
    else {
        $(".cart-submit").hide();
    }
}

$(document).ready(function(){
    $(".content-store").css("max-height", `${Math.round($(".content-store").height())}px`);

    $(".content-category").on("click", ".cate-img", function(){
        $(".cate-img").removeClass("cate-active");
        $(this).addClass("cate-active");
        //console.log($(this).find("span").text());

        var k = {
            "fetch": true,
            "u_id": db_sid,
            "type": $(this).find(".cate-type").text()
        };

        $(".content-store").load("store_list.php", k, function(d,s){
            //console.log(d);
        })
    });

    $(".content").on("click", ".control-submit", function() {
        var mid = parseInt($(this).parent().attr("id").split("-")[1])
        var k = {
            "u_id": db_uid,
            "menu_id": mid
        };

        $.post("../backend/d_cart_add.php", k, function(d,s){
            if($(`#c-${db_uid}-${mid}`).length != 0) {
                $(`#c-${db_uid}-${mid} .cart-quantity`).text(d);
            }
            else {
                $.get("../backend/d_cart_data.php", function(d,s){
                    $.post("../template/cart_item.php", JSON.parse(d), function(d,s){
                        $(".cart-items").prepend(d);

                        update_checkout_button();
                    });
                });
            }
        });
    });

    $("#cart-trigger").trigger("click");
    $(".cate-img:first-child").trigger("click");
});