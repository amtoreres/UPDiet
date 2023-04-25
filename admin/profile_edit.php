<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION["admin"]["u_id"];

    $q = "SELECT user.email, store_info.* FROM user, store_info WHERE user.u_id=$uid && store_info.u_id=$uid;";
    $res = $db->query($q);
    $row = mysqli_fetch_array($res);
?>
<link rel="stylesheet" href="../css/a_edit_form.css" />
<div class="form-content">
    <fieldset>
        <legend>Edit store profile</legend>
        <div class="form-container">
            <!-- name -->
            <span class="col-1">Name:</span>
            <input type="text" id="name" class="col-2" maxlength="20">
            <span class="tooltip-q col-3">?
                    <span class="tooltip">Max of 20 characters. Should start and end with a character.</span>
            </span>

            <!-- contact -->
            <span class="col-1">Contact Number:</span>
            <input type="text" id="c_num" class="col-2" maxlength="11">
            <span class="tooltip-q col-3">?
                    <span class="tooltip">11-digit number.</span>
            </span>
            
            <!-- location -->
            <span class="col-1">Location:</span>
            <input type="text" id="location" class="col-2">
            <span class="tooltip-q col-3">?
                    <span class="tooltip">Location within Miagao. Should not be empty.</span>
            </span>
        </div>
        <div class="h-sep"></div>
        <div class="form-image">
            <div class="field-label">
                <span>Store Picture:</span>
            </div>
            <input type="file" id="prof_pic" name="prof_pic">
        </div>
        <div class="form-image">
            <div class="field-label">
                <span>Store Cover:</span>
            </div>
            <input type="file" id="prof_cover" name="prof_cover">
        </div>
        <span class="error" id="error-msg"></span>
        <div class="form-submit">
            <button id="edit-submit">Submit</button>
            <button id="form-cancel">Cancel</button>
        </div>
    </fieldset>
    <script>
        var db_nm = "<?php echo $row["name"] ?>";
        var db_num = "<?php echo $row["c_num"] ?>";
        var db_loc = "<?php echo $row["location"] ?>";
    </script>
    <script src="../js/a_profile_edit.js"></script>
</div>