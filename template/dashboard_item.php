<div class="store-content" 
     id="s-<?php echo $_POST["u_id"]?>"
     style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 1%, rgba(0,0,0,0.9)), url('../<?php echo $_POST["prof_cover"]; ?>');">
     <div class="store-container">
        <div class="store-pic">
            <img src="../<?php echo $_POST['prof_pic'] ?>" >
        </div>
        <div class="store-info">
            <span class="store-title"><?php echo $_POST["name"] ?></span>
            <span class="store-subtitle"><img src="../img/location_l.png"><span><?php echo $_POST["location"] ?></span></span>
        </div>
     </div>
</div>