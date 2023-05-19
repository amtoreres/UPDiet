$(document).ready(function(){
    if(kao.length > 0) {   
        // ajax with async to prevent break in order
        kao.forEach(function(i){    
            //console.log(i); 
            $.ajax({
                type: "POST",
                url: "../backend/a_order_verify.php",
                data: i,
                async: false,
                success: function(d) {
                    const r = JSON.parse(d)
                    //console.log(r);
                    if(r["is_exist"]) {
                        $.post("../template/a_order_item.php", i, function(d,s){
                            $(".order-list").append(d);

                            //console.log(i["ti_id"]);
                            
                            if(i["order_status"] == "Pending") {
                                $(`#${i["ti_id"]}`).load("../template/a_order_action_control.php");
                            }
                            else if(i["order_status"] == "On Delivery") {
                                $(`#${i["ti_id"]}`).load("../template/a_order_confirm_control.php");
                            }
                        })
                    }
                    else {
                        $.get("../template/empty_item.php", function(d,s){
                            $(".order-list").append(d);
                        });
                    }
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
        $(".order-list").css("padding", "20px");
        $(".order-list").text("No results.");
    }
});