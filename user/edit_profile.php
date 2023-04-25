<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['user']['u_id'];

    // fetch account data
    $q = "SELECT username, c_num from customer_info where u_id='$uid';";
    $resi = $db -> query($q);
    $rowi = mysqli_fetch_array($resi);

    $usr = $rowi["username"];
    $num = $rowi["c_num"];
?>

<link rel="stylesheet" href="../css/u_edit_profile.css">
<div class="profile-edit">
    <form class="profile-form" action="" method="post" enctype="multipart/form-data">
        <div class="form-field">
            <div class="form-container">
                <div class="form-header">
                    <span class="form-label">Profile Picture</span>
                </div>
                <div class="form-input file-input">
                    <input id="prof_pic" type="file" name="prof_pic"/>
                </div>
            </div>
        </div>
        <div class="form-field">
            <div class="form-container">
                <div class="form-header">
                    <span class="form-label">Username</span>
                    <span class="tooltip-header">?<span>Max of 16 alphanumeric characters.</span>
                </div>
                <div class="form-input">
                    <input id="username" type="text" maxlength="16" />
                </div>
            </div>
        </div>
        <div class="form-field">
            <div class="form-container">
                <div class="form-header">
                    <span class="form-label">Contact Number</span>
                    <span class="tooltip-header">?<span>11-digit number.</span>
                </div>
                <div class="form-input">
                    <input id="c_num" type="text" maxlength="11"/>
                </div>
            </div>
        </div>
        <div class="form-error">
            <span class="error" id="error-msg"></span>
        </div>
        <div class="form-button">
            <div class="pw-container">
                <a id="edit-pw">Change Password</a>
            </div>
            <div class="v-sep"></div>
            <div class="submit-container">
                <button type="button" id="submit-prof">Save</button>
                <button type="button" id="cancel-prof">Cancel</button>
            </div>
        </div>
    </form>
</div>
<script>
    var db_usr = "<?php echo $usr; ?>";    // get username
    var db_num = "<?php echo $num; ?>"; // get c_num

    document.getElementById("username").value = db_usr;
    document.getElementById("c_num").value = db_num;
</script>
<script type="module" src="../js/u_edit_profile.js"></script>