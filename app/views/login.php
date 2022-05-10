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
    <link rel="stylesheet" href="/BaseAccount/public/asset/css/popup.css" />
    <link href="/BaseAccount/public/asset/css/content.css" rel="stylesheet" />
    <link rel="stylesheet" href="/BaseAccount/public/asset/css/common.css">
    <title>Base Login</title>
</head>

<body>
    <div id="container">
        <div id="main-content">
            <div class="concentrate">
                <div class="logo">
                    <a href="#">
                        <img class="img-125" src="/BaseAccount/public/asset/images/logo.png">
                    </a>
                </div>
                <div class="form-wrap">
                    <form id="login-form" action="login" method="post">
                        <h1 style="padding: 2px;">Login</h1>
                        <div class="sub-title">Welcome back. Login to start working.</div>
                        <div class="form">
                            <div class="row">
                                <div class="label">Email</div>
                                <div class="input"><input type="email" name="lemail" id="lemail" placeholder="Your email" required maxlength="32"></div>
                            </div>
                            <div class="row">
                                <div class="label"><a class="right" href="recovery">Forget your password?</a>Password</div>
                                <div class="input"><input type="password" id="lpassword" name="lpassword" placeholder="Your password" required maxlength="32"></div>
                            </div>
                            <div class="row relative hd-ov">
                                <div class="checkbox">
                                    <input type="checkbox" checked name="lremember"> &nbsp; Remember me
                                </div>
                                <a class="right" href="register">Don't have any account?</a>
                                <button type="button" class="submit btn btn-login" onclick="User.login();">Login</button>
                                <div class="another">
                                    <div class="label"><span>Or, login via single sign-on</span></div>
                                    <a class="another-login" href="#">Login with Google</a>
                                    <a class="another-login" href="#">Login with Microsoft</a>
                                    <a class="another-login right" href="#">Login with SAML</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- The Modal Message -->
            <div id="myModal" class="modal modal-unrequired">
                <!-- Modal content -->
                <div class="modal-content mc-20" id="myMessage-content">
                    <div class="modal-header">
                        <h3 class="modal-title error" id="modal-title">Logout</h3>
                        <span class="close btn-close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <p id="icon"> <svg class="warning" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg></p>
                        <p id='message'>
                            &nbsp; Bạn có muốn đăng xuất khỏi hệ thống ngay bây giờ? </p>
                    </div>
                    <div class="modal-footer btn-close" id="btn-confirm">
                        <p>Ok</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="bg-content"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="\BaseAccount\public\asset\js\account.js"></script>
    <script src="\BaseAccount\public\asset\js\common.js"></script>
    <script src="\BaseAccount\public\asset\js\popup.js"></script>
</body>

</html>