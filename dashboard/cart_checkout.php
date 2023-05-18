<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['user']['u_id'];

    $q = "SELECT a.price, b.quantity FROM store_menu AS a, customer_cart AS b WHERE b.u_id=$uid && a.menu_id=b.menu_id;";
    $res = $db->query($q);

    $st = 0;

    if(mysqli_num_rows($res) > 0) {
        while($row = $res->fetch_assoc()) {
            $st += $row["price"] * $row["quantity"];
        }
    }

    $df = 15;

?>
<div class="checkout-content">
    <div class="checkout-container">
        <!-- subtotal -->
        <span class="row-1 col-1 form-label">Subtotal:</span>
        <span class="row-1 col-2 form-value">&#8369;<span class="val-sub"></span></span>

        <!-- delivery fee -->
        <span class="row-2 col-1 form-label">Delivery Fee:</span>
        <span class="row-2 col-2 form-value">&#8369;<span class="val-df"></span></span>

        <div class="form-spacer"></div>

        <!-- total -->
        <span class="row-4 col-1 form-label">Total:</span>
        <span class="row-4 col-2 form-label form-value">&#8369;<span class="val-total"></span></span>

        <div class="checkout-field checkout-location">
            <div class="field-header">
                <img src="../img/location.png">
                <span>Set pickup location:</span>
            </div>
            <input id="co-loc" type="text">
        </div>

        <div class="checkout-field checkout-notes">
            <div class="field-header">
                <img src="../img/note.png">
                <span>Additional notes:</span>
            </div>
            <textarea id="co-note" placeholder="Optional"></textarea>
        </div>
    </div>
    <div class="binary-controls">
        <button class="binary-button binary-button-submit" id="checkout-submit">Place Order</button>
        <button class="binary-button binary-button-cancel" id="checkout-cancel">Cancel</button>
    </div>
</div>
<script>
    var db_sub = <?php echo $st ?>;
    var db_df = <?php echo $df ?>;
</script>
<script src="../js/d_cart_checkout.js"></script>