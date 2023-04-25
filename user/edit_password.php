<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start();
    
    $uid = $_SESSION['user']['u_id'];

    // fetch account data
    $q = "SELECT * from user where u_id='$uid';";
    $res = $db -> query($q);
    $rows = mysqli_fetch_array($res);
?>

<link rel="stylesheet" href="../css/u_edit_profile.css">
<link rel="stylesheet" href="../css/u_edit_password.css">
<div class="profile-edit">
    <form class="profile-form" method="post">
        <div class="form-field">
            <div class="form-container">
                <div class="form-header">
                    <span class="form-label">Password</span>
                    <span class="tooltip-header">?<span>Max of 16 alphanumeric characters.</span>
                </div>
                <div class="form-input">
                    <input id="pw-old" type="password" maxlength="16" placeholder="Current Password"/>
                    <input id="pw-new" type="password" maxlength="16" placeholder="New Password"/>
                </div>
            </div>
        </div>
        <div class="form-error">
            <span class="error" id="error-msg"></span>
        </div>
        <div class="form-button">
            <div class="submit-container">
                <button type="button" id="submit-pw" disabled="disabled">Save</button>
                <button type="button" id="cancel-pw">Cancel</button>
            </div>
        </div>
    </form>
</div>
<script>
    var db_pw = "<?php echo $rows["password"] ?>";
</script>
<script type="module" src="../js/u_edit_password.js"></script>