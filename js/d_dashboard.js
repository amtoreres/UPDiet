$(document).ready(function(){
    // load edit sidebar form on edit button click
    $(".sidebar").on("click", "#edit-prof", function(){
        $(".sidebar").load("../user/edit_profile.php");
        //console.log("test");
    });

    // post data to backend on sidebar edit submit
    $(".sidebar").on("click", "#submit-prof", function(){
        var i = $("#prof_pic").prop("files");
        if (i.length > 0) i = i[0];

        var k = new FormData();
        k.append("submit-prof", true);
        k.append("username", $("#username").val());
        k.append("c_num", $("#c_num").val());
        k.append("prof_pic", i);

        // ajax instead of post to send file
        $.ajax({
            url: "../backend/u_save_profile.php",
            data: k,
            type: "POST",
            enctype: "multipart/form-data",
            cache: false,
            contentType: false,
            processData: false,
            success: function(d){
                // set overlay back to sidebar details on submit
                $(".sidebar").load("../user/overlay_proper.php");
                //console.log(d);
            },
            error: function(e){
                //console.log(e); 
            }
        });
    });

    // set overlay back to sidebar details on cancel
    $(".sidebar").on("click", "#cancel-prof", function(){
        $(".sidebar").load("../user/overlay_proper.php");
    });

    // load edit password form on click
    $(".sidebar").on("click", "#edit-pw", function(){
        $(".sidebar").load("../user/edit_password.php");
    });

    // post data to backend on password edit submit
    $(".sidebar").on("click", "#submit-pw", function(){
        var k = {
            "submit-pw": true,
            "type": "user",
            "pw-new": $("#pw-new").val()
        };

        $.post("../backend/save_password.php", k, function(d,s){
            $.post("../backend/u_signin_state.php", {"u_signin_state": 1}, function(d,s){
                // logout user after pw change
                $("#logout").trigger("click");
            });
        });
    });

    // set overlay back to sidebar details on cancel
    $(".sidebar").on("click", "#cancel-pw", function(){
        $(".sidebar").load("../user/overlay_proper.php");
    });

    $(".nav").on("click", ".nav-button", function(){
        $("button").removeClass("nav-active");
        var eid = $(this).attr("id");

        if(eid == "home-trigger") window.location.href = "../dashboard";
        else if(eid == "prof-trigger") $(".sidebar").load("../user/overlay_proper.php");
        else if(eid == "order-trigger") $(".sidebar").load("orders.php");
        else if(eid == "cart-trigger") $(".sidebar").load("cart_proper.php");
        
        $(this).addClass("nav-active");
    });

    $("#prof-trigger").trigger("click");

    $(".content").on("click", ".store-content", function(){
        $.post("../backend/d_store_set.php", {"store": $(this).attr("id")}, function(){
            window.location.href = "store.php";
        })
    })
});