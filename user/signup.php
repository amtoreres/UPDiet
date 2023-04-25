<link rel="stylesheet" href="../css/u_signup.css">
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
            <div class="signup-field">
                <input type="text" id="username" maxlength="20" placeholder="Username">
                <span class="tooltip-q">?
                    <span class="tooltip">Max of 20 characters. Should start and end with a character.</span>
                </span>
            </div>
            <div class="signup-field">
                <input type="text" placeholder="UP Mail" id="email">
                <span class="tooltip-q">?
                    <span class="tooltip">Emails ending in 'up.edu.ph' only.</span>
                </span>
            </div>
            <div class="signup-field">
                <input  id="password" type="password" placeholder="Password" maxlength="16">
                <span class="tooltip-q">?
                    <span class="tooltip">Max of 16 alphanumeric characters.</span>
                </span>
            </div>
        </div>
        <span class="error" id="error-msg"></span>
        <button class="submit" type="button" id="submit" disabled="disabled">Sign Up</button>
    </div>
</form>
<script src="../js/u_signup.js"></script>
