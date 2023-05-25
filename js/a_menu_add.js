function is_alphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function verify_form() {
    if(is_valid_nm && is_valid_prc && is_valid_img)
    {
        $("#add-submit").attr("disabled", false);
        $("#error-msg").text("");
    }
    else 
    {
        $("#add-submit").attr("disabled", true);

        if(!is_valid_nm && $("#name").val() != "") 
            $("#error-msg").text("Invalid name.");
        else if(!is_valid_prc && $("#price").val() != "") 
            $("#error-msg").text("Invalid price.");
        else if(!is_valid_img && $("#img").prop("files").length > 0) 
            $("#error-msg").text("Invalid image.");
        else
            $("#error-msg").text("");
    }
}

$(document).ready(function(){
    $(".form-content").off("input");
    $(".form-content").off("focusout");

    $("#add-submit").attr("disabled", true);

    $(".form-content").on("input", "#name", function(){
        is_valid_nm = $("#name").val().match(/^(?!\s).+(?<!\s)$/) ? true : false;
        verify_form();
    });

    $(".form-content").on("input", "#price", function(){
        is_valid_prc = $("#price").val().match(/^(?!0+(\.0{1,2})?$)(\d+|\d+\.\d{1,2})$/) ? true : false;

        verify_form();
    });

    $(".form-content").on("focusout", "#price", function(){
        if(is_valid_prc) $("#price").val(parseFloat($("#price").val()).toFixed(2));
    });
    
    $(".form-content").on("change", "#img", function(){
        if($("#img").prop("files").length > 0) {
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
            fr.readAsArrayBuffer($("#img").prop("files")[0]);
        }
        else {
            is_valid_img = true;
            verify_form();
        } 
    });
});

var is_valid_nm = false;
var is_valid_prc = false;
var is_valid_img = false;