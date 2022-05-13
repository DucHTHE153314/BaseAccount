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
    <link rel="stylesheet" href="/public/asset/css/popup.css" />
    <link href="/public/asset/css/content.css" rel="stylesheet" />
    <link rel="stylesheet" href="/public/asset/css/common.css">
    <title>Base Login</title>
</head>

<body>
    <div id="container">
        <div id="main-content">
            <div class="concentrate">
                <div class="logo">
                    <a href="#">
                        <img class="img-64" src="/public/asset/images/logo.full.png">
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
            <div id="myModal" class="modal modal-mess modal-unrequired">
                <!-- Modal content -->
                <div class="modal-content mc-20" id="myMessage-content">
                    <div class="modal-header">
                        <div class="modal-title error" id="modal-title">Login</div>
                        <span class="close btn-close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <p id="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                            </svg></p>
                        <div id='message'></div>
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
    <script src="\public\asset\js\account.js"></script>
    <script src="\public\asset\js\common.js"></script>
    <script src="\public\asset\js\popup.js"></script>
</body>

</html>