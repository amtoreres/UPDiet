<link rel="stylesheet" href="../css/u_login.css">
<form action="" method="post">
    <div class="form-header">
        <div class="header-title signup">
            <a id="signup-link">
                <div class="header-content">
                    <img src="../img/user.png" />
                    <span>Sign Up</span>
                </div>
            </a>
        </div>
        <div class="header-title login">
            <a id="login-link">
                <div class="header-content">
                    <img src="../img/login.png" />
                    <span>Log In</span>
                </div>
            </a>
        </div>
    </div>
    <div class="form-field">
        <div class="form-input">
            <input type="text" placeholder="Email" name="email" id="email">
            <input id="password" type="password" placeholder="Password" name="password">
        </div>
        <span class="error" id="error-msg"></span>
        <button class="submit" type="button" id="submit">Log In</button>
    </div>
</form>
<script src="../js/u_login.js"></script>