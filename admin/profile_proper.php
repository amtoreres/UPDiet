<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION["admin"]["u_id"];

    $q = "SELECT user.email, store_info.* FROM user, store_info WHERE user.u_id=$uid && store_info.u_id=$uid;";
    $res = $db->query($q);
    $row = mysqli_fetch_array($res);
?>
<link rel="stylesheet" href="../css/a_profile_proper.css" />
<div class="profile-content">
    <div class="profile-header">
        <div class="photo-cover">
        </div>
        <div class="photo-profile">
            <img>
        </div>
        <div class="control-container">
            <button id="view-trigger" class="icon-button control-button" title="Change store visibility">
                <img src="../img/view-<?php echo $row["is_published"] ? "show" : "hide"; ?>.png">
            </button>
            <button id="edit-trigger" class="icon-button control-button" title="Edit store profile">
                <img src="../img/edit.png">
            </button>
            <button id="del-trigger" class="icon-button control-button" title="Delete store">
                <img src="../img/delete.png">
            </button>
            <button id="pw-trigger" class="label-button">Change Password</button>
        </div>
    </div>
    <div class="profile-info">
        <div class="info-header">
            <span class="store-head info-name"></span>
            <span class="store-subhead info-em"></span>
            <span class="store-subhead info-num"></span>
            <span class="store-subhead info-loc"></span>
            <span class="store-subhead info-date"></span>
        </div>
    </div>
</div>
<script>
    var db_nm = "<?php echo $row["name"] ?>";
    var db_em = "<?php echo $row["email"] ?>";
    var db_num = "<?php echo $row["c_num"] ?>";
    var db_loc = "<?php echo $row["location"] ?>";
    var db_date = "<?php echo date_format(date_create($row["date"]), "F d, Y"); ?>";
    var db_p_pic = "<?php echo $row["prof_pic"]?>";
    var db_p_cov = "<?php echo $row["prof_cover"] ?>";
</script>
<script src="../js/a_profile_proper.js"></script>