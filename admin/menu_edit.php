<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $mid = $_POST['menu_id'];

    $q = "SELECT * FROM store_menu WHERE menu_id=$mid;";
    $res = $db->query($q);
    $row = mysqli_fetch_array($res);
?>
<link rel="stylesheet" href="../css/a_edit_form.css" />
<div class="form-content">
    <fieldset>
        <legend>Edit menu item</legend>
        <div class="form-container">
            <!-- name -->
            <span class="col-1">Name:</span>
            <input type="text" id="name" class="col-2" maxlength="20">
            <span class="tooltip-q col-3">?
                    <span class="tooltip">Max of 20 characters. Should start and end with a character.</span>
            </span>

            <!-- type -->
            <span class="col-1">Type:</span>
            <select id="type"class="col-2">
                <option value="Main Course">Main Course</option>
                <option value="Appetizer">Appetizer</option>
                <option value="Dessert">Dessert</option>
                <option value="Beverage">Beverage</option>
                <option value="Add-on">Add-on</option>
            </select>
            
            <!-- price -->
            <span class="col-1">Price:</span>
            <input type="text" id="price" class="col-2">
            <span class="tooltip-q col-3">?
                    <span class="tooltip">Must be greater than zero with max of 2 decimal spaces.</span>
            </span>
        </div>
        <div class="h-sep"></div>
        <div class="form-image">
            <div class="field-label">
            <span>Image</span>
                <span class="tooltip-q col-3">?
                        <span class="tooltip">Recommended size of 100x100 pixels.</span>
                </span>
            </div>
            <input type="file" id="img" name="img">
        </div>
        <span class="error" id="error-msg"></span>
        <div class="form-submit">
            <button id="edit-submit">Submit</button>
            <button id="form-cancel">Cancel</button>
        </div>
    </fieldset>
    <script>
        var db_nm = "<?php echo $row["name"] ?>";
        var db_typ = "<?php echo $row["type"] ?>";
        var db_prc = "<?php echo $row["price"] ?>";
    </script>
    <script src="../js/a_menu_edit.js"></script>
</div>