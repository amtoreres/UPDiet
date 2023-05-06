$(document).ready(function(){
    $(".val-sub").text(parseFloat(db_sub).toFixed(2));
    $(".val-df").text(parseFloat(db_df).toFixed(2));
    $(".val-total").text(parseFloat(db_sub+db_df).toFixed(2));
});