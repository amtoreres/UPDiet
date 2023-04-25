function is_alphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function verify_form()
{
    if(is_valid_usr && is_valid_num && is_valid_img)
    {
        $("#submit-prof").attr("disabled", false);
        $("#error-msg").text("");
    }
    else 
    {
        $("#submit-prof").attr("disabled", true);

        if(!is_valid_img && $("#prof_pic").prop("files").length > 0) 
            $("#error-msg").text("Invalid image.");
        else if(!is_valid_usr && $("#username").val() != "") 
            $("#error-msg").text("Invalid username.");
        else if(!is_valid_num && $("#c_num").val() != "") 
            $("#error-msg").text("Invalid contact number.");
        else
            $("#error-msg").text("");
    }
}

var is_valid_img = true;
var is_valid_usr = true;
var is_valid_num = true;

$(document).ready(function(){
    $(".profile").on("input", "#username", function(){
        is_valid_usr = $("#username").val().match(/^(?!\s).+(?<!\s)$/) ? true : false;;
        verify_form();
    });
    
    $(".profile").on("input", "#c_num", function(){
        // allow only 11-digit numeric
        is_valid_num = $("#c_num").val().match(/^$|(09[0-9]{9})+/) ? true : false;
        verify_form();
    });
    
    $(".profile").on("change", "#prof_pic", function(){
        if($("#prof_pic").prop("files").length > 0) {
            var fr = new FileReader();
            fr.onloadend = function(e){
                var a = (new Uint8Array(e.target.result)).subarray(0,4);

                // get header info
                var h = "";
                for(var i = 0; i < a.length; i++)
                    h += a[i].toString(16);

                switch(h){
                    case "89504e47":    // png
                    case "ffd8ffe0":    // all ff* are jpeg
                    case "ffd8ffe1":
                    case "ffd8ffe2":
                    case "ffd8ffe3":
                    case "ffd8ffe8":
                        is_valid_img = true;
                        break;
                    default:
                        is_valid_img = false;
                        break;
                }
                
                verify_form();
            }

            // read file
            fr.readAsArrayBuffer($("#prof_pic").prop("files")[0]);
        }
        else {
            is_valid_img = true;
            verify_form();
        } 

        //console.log(is_valid_img);
    });
});