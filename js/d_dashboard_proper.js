$(".content-store").ready(function(){
    if(ka.length > 0) {        
        // ajax with async to prevent break in order
        ka.forEach(function(i){
            $.ajax({
                type: "POST",
                url: "../template/dashboard_item.php",
                data: i,
                async: false,
                success: function(d) {
                    $(".content-store").append(d);
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
        $(".content-store").text("No stores found.");
    }
});