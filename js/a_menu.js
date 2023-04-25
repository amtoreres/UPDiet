function refresh_list() {
    var k = {
        "fetch-list": true,
        "search-input": $("#search-input").val(),
        "filter-type": $("#filter-control").find(":selected").val(),
        "sort-mode": parseInt($("#sort-control").find(":selected").val()),
        "sort-priority": is_sort_descending
    };

    $(".menu-list").load("menu_list.php", k, function(d,s){
        //console.log(d);
    });
}

function get_form() {
    var i = $("#img").prop("files");
    if (i.length > 0) i = i[0];

    var k = new FormData();
    k.append("name", $("#name").val());
    k.append("type", $('#type').find(":selected").val());
    k.append("price", $("#price").val());
    k.append("img", i);

     return k;
}

function submit_form(k) {
    // ajax instead of post to send file
    $.ajax({
        url: "../backend/a_menu_item_submit.php",
        data: k,
        type: "POST",
        enctype: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        success: function(d){
            window.location.href = "menu.php"
        },
        error: function(e){
            console.log(e); 
        }
    });
}

$(document).ready(function(){
    refresh_list();

    $(".content").on("click", ".control-button", function(){
        if($(this).attr("id") == "sort-trigger") {
            is_sort_descending = is_sort_descending ? 0 : 1;
            
            if(is_sort_descending) $("#sort-trigger").children('img')[0].src = "../img/sort-descending.png";
            else $("#sort-trigger").children('img')[0].src = "../img/sort-ascending.png";
        } 
        refresh_list();
    });

    $(".content").on("change", ".control-select", function(){
        refresh_list();
    });

    $(".content").on("click", "#add-trigger", function(){
        $(".content").load("menu_add.php");
    });

    $(".content").on("click", "#form-cancel", function(){
        window.location.href = "menu.php"
    });

    $(".content").on("click", "#add-submit", function(){
        var k = get_form();
        k.append("submit-add", true);
        k.append("menu_id", null);

        submit_form(k);
    });

    $(".content").on("click", "#edit-submit", function(){
        var k = get_form();
        k.append("submit-edit", true);
        k.append("menu_id", mid);

        submit_form(k);
    });

    $(".content").on("click", ".view-control", function(){
        mid = $(this).parent().attr("id");
        
        $.post("../backend/a_menu_view_submit.php", {"menu_id": mid}, function(d,s){
            if(parseInt(d)) $(`#${mid} .view-control`).find("img").attr("src", "../img/view-show.png");
            else $(`#${mid} .view-control`).find("img").attr("src", "../img/view-hide.png");
        });
    });

    $(".content").on("click", ".edit-control", function(){
        mid = $(this).parent().attr("id");

        $(".content").load("menu_edit.php", {"menu_id": mid}, function(d,s){
            console.log(d);
        });
    });

    $(".content").on("click", ".del-control", function(){
        mid = $(this).parent().attr("id");
        
        $.get("overlay_alert.php", function(d,s){
            $("body").prepend(d);
        });
    });

    $("body").on("click", "#del-confirm", function(){ 
        $(".overlay-content").remove();   
        
        $.post("../backend/a_menu_delete_submit.php", {"menu_id": mid}, function(d,s){
            $(`#${mid}`).parent(".item-content").remove();
            
            $.post("../backend/a_store_view_submit.php", {"submit-view": true, "v": true}, function(d,s){

            });
        });        
    });

    $("body").on("click", "#del-cancel", function(){        
        $(".overlay-content").remove();
    });
});

var is_sort_descending = 1;
var mid;