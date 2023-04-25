$(document).ready(function(){
    // cleanup events made by signup page
    $(".form").off("input");

    // remove error msg on input
    $(".form").on("input", "input", function(){
        $("#error-msg").text("");
    })
});