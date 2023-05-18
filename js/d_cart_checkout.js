$(document).ready(function(){
    $("#checkout-submit").attr("disabled", true);

    $(".val-sub").text(parseFloat(db_sub).toFixed(2));
    $(".val-df").text(parseFloat(db_df).toFixed(2));
    $(".val-total").text(parseFloat(db_sub+db_df).toFixed(2));

    $(".sidebar").on("input", "#co-loc", function(){
        if($("#co-loc").val().trim() === "") {
            $("#checkout-submit").attr("disabled", true);
        }
        else { 
            $("#checkout-submit").attr("disabled", false);
        }
    });
});