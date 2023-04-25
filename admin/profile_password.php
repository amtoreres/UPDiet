<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION["admin"]["u_id"];

    $q = "SELECT password FROM user WHERE u_id=$uid;";
    $res = $db->query($q);
    $row = mysqli_fetch_array($res);
?>
<link rel="stylesheet" href="../css/a_edit_form.css" />
<div class="form-content">
    <fieldset>
        <legend>Edit admin password</legend>
        <div class="form-container">
            <!-- old pw -->
            <span class="col-1">Current Password:</span>
            <input type="password" id="pw-old" class="col-2" maxlength="20">

            <!-- new pw -->
            <span class="col-1">New Password:</span>
            <input type="password" id="pw-new" class="col-2" maxlength="11">
        </div>
        <span class="error" id="error-msg"></span>
        <div class="form-submit">
            <button id="pw-submit">Submit</button>
            <button id="form-cancel">Cancel</button>
        </div>
    </fieldset>
    <script>
        var db_pw = "<?php echo $row["password"]; ?>";
    </script>
    <script src="../js/a_profile_password.js" type="module"></script>
</div>