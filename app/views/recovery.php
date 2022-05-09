<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/BaseAccount/public/asset/css/popup.css" />
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
                    <form id="login-form" action="recovery" method="post">
                        <h1 style="padding: 2px;">Password Recovery</h1>
                        <div class="sub-title">Please enter your information. A password recovery hint will be sent to your email.</div>
                        <div class="form">
                            <div class="row">
                                <div class="label">Email</div>
                                <div class="input"><input type="text" name="remail" placeholder="Your email" required></div>
                            </div>
                            <iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=2&amp;k=6LcTNZ0aAAAAADQo0bEL0USKOHpCTm_jw-WKezKA&amp;co=aHR0cHM6Ly9hY2NvdW50LmJhc2Uudm46NDQz&amp;hl=vi&amp;v=2W_gRz39xX8G13fM-OdyQPlc&amp;size=normal&amp;cb=pf3rctigpsxm" width="304" height="78" role="presentation" name="a-c7750uvy1k7" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                            <div class="row relative hd-ov">
                                <button type="button" class="submit btn btn-login" onclick="User.recover();">Recover password</button>
                                <div class="another">
                                </div>
                                <p class="sub-title"><a href="login" id="login-now"><b>Login now</b></a> if your company was already on <b>Base Account</b></p>
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
                        <h3 class="modal-title error">Error Email!</h3>
                        <span class="close btn-close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <p>Email Không tồn tại</p>
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
    <script src="/BaseAccount/public/asset/js/popup.js"> </script>
</body>

</html>