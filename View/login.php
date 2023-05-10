<?php
session_start();
ob_clean();
include_once("./index.html");
if (((isset($_SESSION['email'])) && $_SESSION['loggedin'] == true)) {
    header("location:./get_upload_file.php");
}
?>
<! DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="./login_request.php" method="post">
            <div class="bg-image" style="
            background-image: url('./back_img-transformed.jpeg');
            height: 100vh;opacity:0.9;">
                <div class="container">
                    <section class="vh-100 gradient-custom">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                    <div class="card bg-light text-danger opacity-75 card-outline-danger" style="border-radius: 2rem;">
                                        <div class="card-body p-5 text-center">

                                            <div class="mb-md-5 mt-md-4 pb-5">

                                                <h2 class="fw-bold mb-2 text-uppercase">SIGN IN</h2>
                                                <p class="text-dark-50 mb-5">Please enter your login and password!</p>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Email" />
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" />
                                                </div>

                                                <p class="small mb-5 pb-lg-2"><a class="text-danger" href="#!">Forgot password?</a></p>

                                                <button class="btn btn-outline-danger btn-lg px-5" type="submit" name="submit">Login</button>

                                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                                </div>

                                            </div>

                                            <div>
                                                <p class="mb-0">Don't have an account? <a href="#!" class="text-dark fw-bold">Sign Up</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </section>
        </form>
        <!-- <img src="./back_img-transformed.jpeg" class="img-fluid w-100 h-100 opacity-25" alt="icard" style="position:absolute;"> -->
    </body>

    </html>