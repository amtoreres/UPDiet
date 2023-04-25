import { md5 } from "./md5.js";

function is_alphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function verify_form()
{
    if(is_valid_old_pw && is_valid_new_pw)
    {
        $("#submit-pw").attr("disabled", false);
        $("#error-msg").text("");
    }
    else 
    {
        $("#submit-pw").attr("disabled", true);

        if(!is_valid_old_pw)
        {
            if($("#pw-old").val()) $("#error-msg").text("Does not match current password.");
            else $("#error-msg").text("");
        }
        else if(!is_valid_new_pw)
        {
            if($("#pw-new").val()) $("#error-msg").text("New password invalid.");
            else $("#error-msg").text("");
        }
    }
}

var is_valid_old_pw = false;
var is_valid_new_pw = false;

$(document).ready(function(){ 
    $("#submit-prof").attr("disabled", true);
    // check if input matches current pw
    $(".profile").on("input", "#pw-old", function(){
        is_valid_old_pw = md5($("#pw-old").val()) == db_pw;
        verify_form();
    });
    
    // check if input is valid new pw
    $(".profile").on("input", "#pw-new", function(){
        is_valid_new_pw = is_alphanumeric($("#pw-new").val()) ? true : false;
        verify_form();
    });
});