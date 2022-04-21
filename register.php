<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <link rel='icon' href="images/logo.png"/>
        <link href="css/indexstyle.css" rel="stylesheet"/>
        <title>Base</title>
    </head>
    <body>
        <section class="vh-100">
            <div class="container ">
                <div class="row">
                    <section class="main vh-100" style="position: fixed; left: 0;top: 0; background-image: url(images/background.png); background-size: contain;">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col col-xl-6">
                                    <div class="card" style="border-radius: 1rem;">
                                        <div class="row g-0">
                                            <div class="col-md-12 col-lg-12 d-flex align-items-center">
                                                <form action="base.register.php" method="post" id="form-register" class="card-body p-4 p-lg-5 text-black">
                                                    <div class="align-items-center">
                                                        <img class="rounded mx-auto d-block small-img" src="images/logo.png" alt="Logo"/>
                                                        <h1 class="text-center">Register</h1>
                                                    </div>
                                                    <!-- Full name input -->
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="fullname">Full Name</label>
                                                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Your name" maxlength="128" required/>
                                                        <p class="message" id="mfullname"></p>
                                                    </div>
                                                    <!-- Email input -->
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Your email" maxlength="48" required/>
                                                        <p class="message" id="memail"></p>
                                                    </div>
                                                    <!-- Phone input -->
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="phone">Phone</label>
                                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Your phone" maxlength="10" required/>
                                                        <p class="message" id="mphone"></p>
                                                    </div>
                                                    <!-- Password input -->
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="password">New Password</label>
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" minlength="6" maxlength="32" required/>
                                                        <p class="message" id="mpassword"></p>
                                                    </div>
                                                    <!-- Password confirm -->
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="passwordcf">Confirm Password</label>
                                                        <input type="password" name="passwordcf" id="password" class="form-control" placeholder="Confirm Password" minlength="6" maxlength="32" required/>
                                                        <p class="message" id="mpassword"></p>
                                                    </div>

                                                    <!-- Submit button -->
                                                    <div class="form-outline mb-4 row">
                                                        <div class="col-md-2"></div>
                                                        <button type="submit" class="btn btn-primary btn-block mb-4 col-md-8" id="btn-register">Register</button>
                                                    </div>

                                                    <!-- Register buttons -->
                                                    <div class="text-center">
                                                        <p>You are member? <a href="login.php">Login</a></p>
                                                        <p>or sign up with:</p>
                                                        <button type="button" class="btn btn-primary btn-floating mx-1">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary btn-floating mx-1">
                                                            <i class="fab fa-google"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/commonevent.js"></script>
        <script>
            $('#form-register').submit(function () {
                var account = new AccountRegister($('#fullname').val(), $('#email').val(), $('#phone').val(), $('#password').val());
                return account.checkRegister();
            });
        </script>
        <script>
            $.each($('.form-control'), function () {
                $(this).focus(function () {
                    $(this).parent().children('.message').hide();
                });
            });
        </script>
    </body>
</html>
