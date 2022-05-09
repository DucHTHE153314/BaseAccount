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
                                <div class="input"><input type="password" id="lpassword" name="lpassword" placeholder="Your password" required  maxlength="32"></div>
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
            <!-- The Modal Error email -->
            <div id="myModal" class="modal modal-unrequired">
                <!-- Modal content -->
                <div class="modal-content mc-20">
                    <div class="modal-header">
                        <h3 class="modal-title error">Login Failed!</h3>
                        <span class="close btn-close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <p id='message'>Email Không tồn tại</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-close btn-ok">Ok</button>
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