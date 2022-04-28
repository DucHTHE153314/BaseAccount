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
    <title>Base Recovery</title>
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
                    <form id="login-form" action="recover" method="post">
                        <h1 style="padding: 2px;">Login</h1>
                        <div class="sub-title">Welcome back. Login to start working.</div>
                        <div class="form">
                            <div class="row">
                                <div class="label">Email</div>
                                <div class="input"><input type="text" name="lemail" placeholder="Your email" required></div>
                            </div>
                            <div class="row">
                                <div class="label"><a class="right" href="#">Forget your password?</a>Password</div>
                                <div class="input"><input type="password" id="login-password" name="lpassword" placeholder="Your password" required></div>
                            </div>
                            <div class="row relative hd-ov">
                                <div class="checkbox">
                                    <input type="checkbox" checked name="lremember"> &nbsp; Remember me
                                </div>
                                <a class="right" href="register">Don't have any account?</a>
                                <button type="submit" class="submit btn btn-login" onclick="">Login</button>
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
        </div>
        <div id="bg-content"></div>
    </div>
    <script>
        $('#cls').click(function() {
            document.getElementById('message-box-1').style.display = 'none';
        });
    </script>
</body>

</html>