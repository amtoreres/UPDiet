function update_controls(id, status) {
    $(`#${id}`).parent().find(".info-order").text(`Status: ${status}`);

    if(status == "On Delivery") {
        $(`#${id}`).load("../template/a_order_confirm_control.php");
    }
    else {
        $(`#${id}`).html("");
    }
}

function order_listener() {
    $.post("../backend/a_order_listener.php", {"u_id": db_uid}, function(d,s){
        const r = JSON.parse(d);
        //console.log(r["latest"]);
        if(r["latest"] != -1) {
            if($(`#${r["latest"]}`).length == 0) {
                $(".reload-trigger").show();
            }
        }
    })
}

$(document).ready(function(){
    setInterval(order_listener, 250);

    $(".content").on("click", ".reload-trigger", function(){
        window.location.reload(true);
    });
    
    $(".content").on("click", ".cancel-control", function(){
        var tiid = $(this).parent().attr("id");
        var ord = "Cancelled";

        var k = {
            "ti_id": tiid,
            "order_status": ord
        };

        $.post("../backend/a_order_update.php", k, function(d,s){
            update_controls(tiid, ord);
        });
    });
    
    $(".content").on("click", ".cancel-a-control", function(){
        var iid = $(this).closest(".item-content").attr("data-group-id");

        $(`.i-${iid}`).each(function(){
            //console.log($(this).find(".item-control").attr("id"));
            var tiid = $(this).find(".item-control").attr("id");
            
            var ord = "Cancelled";

            var k = {
                "ti_id": tiid,
                "order_status": ord
            };

            $.post("../backend/a_order_update.php", k, function(d,s){
                var r = JSON.parse(d);
                if(r["is_update"]) {
                    update_controls(tiid, ord);
                }
                
                $(`.i-${iid}`).css("background-color", "transparent");
            });
        });
    });
    
    $(".content").on("click", ".deliver-control", function(){
        var tiid = $(this).parent().attr("id");
        var ord = "On Delivery";

        var k = {
            "ti_id": tiid,
            "order_status": ord
        };

        $.post("../backend/a_order_update.php", k, function(d,s){
            //console.log(d);
            update_controls(tiid, ord);
        });
    });
    
    $(".content").on("click", ".deliver-a-control", function(){
        var iid = $(this).closest(".item-content").attr("data-group-id");
        $(`.i-${iid}`).css("background-color", "transparent");

        $(`.i-${iid}`).each(function(){
            //console.log($(this).find(".item-control").attr("id"));
            var tiid = $(this).find(".item-control").attr("id");
            
            var ord = "On Delivery";

            var k = {
                "ti_id": tiid,
                "order_status": ord
            };

            $.post("../backend/a_order_update.php", k, function(d,s){
                var r = JSON.parse(d);
                if(r["is_update"]) {
                    update_controls(tiid, ord);
                }
                
                $(`.i-${iid}`).css("background-color", "transparent");
            });
        });
    });
    
    $(".content").on("click", ".complete-control", function(){
        var tiid = $(this).parent().attr("id");
        var ord = "Completed";

        var k = {
            "ti_id": tiid,
            "order_status": ord
        };

        $.post("../backend/a_order_update.php", k, function(d,s){
            update_controls(tiid, ord);
        });
    });

    $(".content").on("mouseenter", ".group-control", function(){
        var iid = $(this).closest(".item-content").attr("data-group-id");
        //console.log(iid);
        $(`.i-${iid}`).css("background-color", "#F1F1F1");
    });

    $(".content").on("mouseleave", ".group-control", function(){
        var iid = $(this).closest(".item-content").attr("data-group-id");
        //console.log(iid);
        $(`.i-${iid}`).css("background-color", "transparent");
    });
});

