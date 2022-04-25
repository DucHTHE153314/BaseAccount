<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>
<?php
include 'content.html';
?>
<div class="form-wrap" style="position: fixed; z-index: 99;">
    <form id="login-form" action="register.php" method="post">
        <h1>Register</h1>
        <div class="sub-title">Welcome to Base. Register to start working.</div>
        <div class="form">
            <div class="row">
                <div class="label">Full name</div>
                <div class="input"><input type="text" name="full_name" placeholder="Your name"></div>
            </div>
            <div class="row">
                <div class="label">Email</div>
                <div class="input"><input type="email" name="register_email" placeholder="Your email"></div>
            </div>
            <div class="row">
                <div class="label">Phone</div>
                <div class="input"><input type="text" name="register_phone" placeholder="Your phone"></div>
            </div>
            <div class="row">
                <div class="label">New Password</div>
                <div class="input"><input type="password" name="register_password" placeholder="New password"></div>
            </div>
            <div class="row">
                <div class="label">Confirm Password</div>
                <div class="input"><input type="password" name="confirm_password" placeholder="Confirm password"></div>
            </div>
            <div class="row relative hd-ov">
                <a class="right" href="login.html">Have an account?</a>
                <div class="submit btn-register" onclick="">Register</div>
            </div>
        </div>
    </form>
</div>

</html>