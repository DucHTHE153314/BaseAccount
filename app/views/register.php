<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <link rel='icon' href="/public/asset/images/logo.png" />
    <link href="/public/asset/css/content.css" rel="stylesheet" />
    <link rel="stylesheet" href="/public/asset/css/common.css">
    <link rel="stylesheet" href="/public/asset/css/popup.css">
    <title>Base Register</title>
</head>

<body>
    <div id="container">
        <div id="main-content">
            <div class="concentrate">
                <div class="logo">
                    <a href="#">
                        <img class="img-64" src="/public/asset/images/logo.png" />
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
                                    <div class="input"><input type="text" id="first_name" name="first_name" placeholder="First name" required maxlength="32"></div>
                                </div>
                                <div class="col right-col" style="margin-left: 5%;">
                                    <div class="label">&nbsp;</div>
                                    <div class="input"><input type="text" name="last_name" id="last_name" placeholder="Last name" required maxlength="32"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="label">Email</div>
                                <div class="input"><input type="email" name="register_email" id="register_email" placeholder="Your email" required maxlength="32"></div>
                            </div>
                            <div class="row">
                                <div class="label">Phone</div>
                                <div class="input"><input type="text" name="register_phone" id="register_phone" placeholder="Your phone" required maxlength="32"></div>
                            </div>
                            <div class="row">
                                <div class="label">New Password</div>
                                <div class="input"><input type="password" name="register_password" id="register_password" placeholder="New password" required maxlength="32"></div>
                            </div>
                            <div class="row">
                                <div class="label">Confirm Password</div>
                                <div class="input"><input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required maxlength="32"></div>
                            </div>
                            <div class="row relative hd-ov">
                                <a class="right" href="login">Have an account?</a>
                                <button type="button" class="submit btn btn-register" onclick="User.register();">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="bg-content"></div>
    </div>
    <!-- The Modal Message -->
    <div id="myMessage" class="modal modal-mess">
        <!-- Modal content -->
        <div class="modal-content mc-30" id="" style="margin-top: 17%;">
            <div class="modal-header">
                <div class="modal-title error" id="modal-title">Logout</div>
                <span class="close btn-close">&times;</span>
            </div>
            <div class="modal-body">
                <p id="icon"> <svg class="warning" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg></p>
                <p id='message'>
                    &nbsp; B???n c?? mu???n ????ng xu???t kh???i h??? th???ng ngay b??y gi???? </p>
            </div>
            <div class="modal-footer" id="btn-confirm">
                <p>Ok</p>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="\public\asset\js\account.js"></script>
    <script src="\public\asset\js\common.js"></script>
    <script src="\public\asset\js\popup.js"></script>
</body>

</html>