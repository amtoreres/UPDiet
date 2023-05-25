function is_alphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function is_valid_img(o) {
    if($(o).prop("files").length > 0) {
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
                    return true;
                default:
                    return false;
            }
        }

        // read file
        fr.readAsArrayBuffer($(o).prop("files")[0]);
    }
    else {
        return true;
    } 
} 

function verify_form() {
    if(is_valid_nm && is_valid_num && is_valid_loc && is_valid_p_pic && is_valid_p_cov)
    {
        $("#edit-submit").attr("disabled", false);
        $("#error-msg").text("");
    }
    else 
    {
        $("#edit-submit").attr("disabled", true);

        if(!is_valid_nm && $("#name").val() != "") 
            $("#error-msg").text(msg);
        else if(!is_valid_num && $("#c_num").val() != "") 
            $("#error-msg").text("Invalid number.");
        else if(!is_valid_p_pic && $("#prof_pic").prop("files").length > 0) 
            $("#error-msg").text("Invalid profile picture.");
        else if(!is_valid_p_cov && $("#prof_cover").prop("files").length > 0) 
            $("#error-msg").text("Invalid cover picture.");
        else
            $("#error-msg").text("");
    }
}

$(document).ready(function(){
    $(".form-content").off("input");

    $("#name").val(db_nm);
    $("#c_num").val(db_num);
    $("#location").val(db_loc);
    $("#edit-submit").attr("disabled", false);

    $(".form-content").on("input", "#name", function(){
        is_valid_nm = $("#name").val().match(/^(?!\s).+(?<!\s)$/) ? true : false;
        msg = is_valid_nm ? "" : "Invalid store name.";

        // check if store name exists
        if(is_valid_nm){
            $.post("../backend/a_name_check.php", {"name": $("#name").val()}, function(d,s){
                //console.log(s);
                var r = JSON.parse(d);

                if(r["op_status"]) is_valid_nm = true;
                else {d
                    msg = "Store name already exists.";
                    is_valid_nm = false;
                }

                verify_form();
            })
        }
        else verify_form();
    });

    $(".form-content").on("input", "#c_num", function(){
        is_valid_num = $("#c_num").val().match(/^09[0-9]{9}/) ? true : false;
        //console.log(is_valid_num);
        verify_form();
    });

    $(".form-content").on("input", "#location", function(){
        is_valid_loc = $("#location").val() != "";

        verify_form();
    });
    
    $(".form-content").on("change", "#prof_pic", function(){
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
                        is_valid_p_pic = true;
                        break;
                    default:
                        is_valid_p_pic = false;
                        break;
                }
                
                verify_form();
            }
    
            // read file
            fr.readAsArrayBuffer($("#prof_pic").prop("files")[0]);
        }
        else {
            is_valid_p_pic = true;
            verify_form();
        } 
    });
    
    $(".form-content").on("change", "#prof_cover", function(){
        if($("#prof_cover").prop("files").length > 0) {
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
                        is_valid_p_cov = true;
                        break;
                    default:
                        is_valid_p_cov = false;
                        break;
                }
                
                verify_form();
            }
    
            // read file
            fr.readAsArrayBuffer($("#prof_cover").prop("files")[0]);
        }
        else {
            is_valid_p_cov = true;
            verify_form();
        } 
    });
});

var is_valid_nm = true;
var is_valid_num = true;
var is_valid_loc = true;
var is_valid_p_pic = true;
var is_valid_p_cov = true;

var msg = "";