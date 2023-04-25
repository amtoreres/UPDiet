$(document).ready(function(){
    $(".content").on("click", "#view-trigger", function(){
        $.post("../backend/a_store_view_submit.php", {"submit-view": true}, function(d,s){
            if(parseInt(d)) $("#view-trigger").find("img").attr("src", "../img/view-show.png");
            else $("#view-trigger").find("img").attr("src", "../img/view-hide.png");
        });
    });

    $(".content").on("click", "#edit-trigger", function(){
        $(".content").load("profile_edit.php", function(d,s){
            //console.log(d);
        });
    });

    $(".content").on("click", "#edit-submit", function(){
        var i = $("#prof_pic").prop("files");
        if (i.length > 0) i = i[0];

        var j = $("#prof_cover").prop("files");
        if (j.length > 0) j = j[0];
    
        var k = new FormData();
        k.append("name", $("#name").val());
        k.append("c_num", $('#c_num').val());
        k.append("location", $("#location").val());
        k.append("prof_pic", i);
        k.append("prof_cover", j);

        $.ajax({
            url: "../backend/a_store_edit_submit.php",
            data: k,
            type: "POST",
            enctype: "multipart/form-data",
            cache: false,
            contentType: false,
            processData: false,
            success: function(d){
                window.location.href = "profile.php"
            },
            error: function(e){
                console.log(e); 
            }
        });
    });

    $(".content").on("click", "#form-cancel", function(){
        window.location.href = "profile.php"
    });

    $(".content").on("click", "#pw-trigger", function(){
        $(".content").load("profile_password.php", function(d,s){
            //console.log(d);
        });
    });

    // post data to backend on password edit submit
    $(".content").on("click", "#pw-submit", function(){
        var k = {
            "submit-pw": true,
            "type": "admin",
            "pw-new": $("#pw-new").val()
        };

        $.post("../backend/save_password.php", k, function(d,s){
            $("#logout").trigger("click");
        });
    });

    // post data to backend on password edit submit
    $(".content").on("click", "#del-trigger", function(){
        /*
        $.post("../backend/a_store_delete_submit.php", {"u_id": db_uid}, function(d,s){
            //alert(d);
            $("#logout").trigger("click");
        });*/
        $.get("overlay_alert.php", function(d,s){
            $("body").prepend(d);
        });
    });

    $("body").on("click", "#del-confirm", function(){ 
        $(".overlay-content").remove();   
        
        $.post("../backend/a_store_delete_submit.php", {"u_id": db_uid}, function(d,s){
            //alert(d);
            $("#logout").trigger("click");
        });       
    });

    $("body").on("click", "#del-cancel", function(){        
        $(".overlay-content").remove();
    });
});