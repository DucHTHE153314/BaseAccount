<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <link rel='icon' href="/BaseAccount/public/asset/images/logo.png" />
    <link href="/BaseAccount/public/asset/css/content.css" rel="stylesheet" />
    <link rel="stylesheet" href="/BaseAccount/public/asset/css/common.css">
    <title>Base Register</title>
</head>

<body>
    <div id="container">
        <div id="main-content">
            <div class="concentrate">
                <div class="logo">
                    <a href="#">
                        <img class="img-125" src="/BaseAccount/public/asset/images/logo.png" />
                    </a>
                </div>
                <div class="form-wrap">
                    <form id="login-form" action="register" method="post">
                        <h1 style="padding: 2px;">Register</h1>
                        <div class="sub-title">Welcome to Base. Register to start working.</div>
                        <div class="form">
                            <div class="row">
                                <div class="col">
                                    <div class="label">Your name</div>
                                    <div class="input"><input type="text" name="first_name" placeholder="First name" required></div>
                                </div>
                                <div class="col right-col" style="margin-left: 5%;">
                                    <div class="label">&nbsp;</div>
                                    <div class="input"><input type="text" name="last_name" placeholder="Last name" required></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="label">Email</div>
                                <div class="input"><input type="email" name="register_email" placeholder="Your email" required></div>
                            </div>
                            <div class="row">
                                <div class="label">Phone</div>
                                <div class="input"><input type="text" name="register_phone" placeholder="Your phone" required></div>
                            </div>
                            <div class="row">
                                <div class="label">New Password</div>
                                <div class="input"><input type="password" name="register_password" placeholder="New password" required></div>
                            </div>
                            <div class="row">
                                <div class="label">Confirm Password</div>
                                <div class="input"><input type="password" name="confirm_password" placeholder="Confirm password" required></div>
                            </div>
                            <div class="row relative hd-ov">
                                <a class="right" href="login">Have an account?</a>
                                <button type="submit" class="submit btn btn-register" onclick="">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="bg-content"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/commonevent.js"></script>
    <script>
        $('#form-register').submit(function() {
            var account = new AccountRegister($('#fullname').val(), $('#email').val(), $('#phone').val(), $('#password').val(), $('#passwordcf').val());
            account.checkRegister();
            account.showMess();
            return false;
        });
    </script>
    <script>
        $.each($('.form-control'), function() {
            $(this).focus(function() {
                $(this).parent().children('.message').hide();
            });
        });
    </script>
</body>

</html>