$(document).ready(function(){
    $(".content-category").on("click", ".cate-img", function(){
        $(".cate-img").removeClass("cate-active");
        $(this).addClass("cate-active");
        //console.log($(this).find("span").text());

        var k = {
            "fetch": true,
            "u_id": db_uid,
            "type": $(this).find("span").text()
        };

        $(".content-store").load("store_list.php", k, function(d,s){
            console.log(d);
        })
    });

    $(".cate-img:first-child").click();
});