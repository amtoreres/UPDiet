$(".list-content").ready(function(){
    if(ka.length > 0) {
        //$(".list-content").css("padding", "0px");
        
        // ajax with async to prevent break in order
        ka.forEach(function(i){
            $.ajax({
                type: "POST",
                url: "../template/store_item.php",
                data: i,
                async: false,
                success: function(d) {
                    $(".list-content").append(d);
                }
            })
            /*
            $.post("../template/menu_item.php", i, function(d,s){
                $(".list-content").append(d);
            });
            */
        });
    }
    else {
        //$(".list-content").css("padding", "20px");
        //$(".list-content").text("No results.");
    }
});