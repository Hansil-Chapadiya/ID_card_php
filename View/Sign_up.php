<?php
session_start();
$db_host = 'localhost:3307'; // database host name
$db_username = 'root'; //database username
$db_password = ''; // database password
$db_name = 'php_miniproject'; // database name

// Create connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the login form has been submitted
if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists in the database
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        print_r('<script>alert("This Email is Already Taken")</script>');
        exit();
    }
    // If the username doesn't exist, add a new user to the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (email, username, password) VALUES ('$email','$username', '$hashed_password')";
    $flag = 0;
    if (mysqli_query($conn, $sql)) {
        $flag = 1;
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvenience caused!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>';
    }
    if($flag)
    {
        ob_clean();
        header("location:./Mini_Project/View/login.php"); // Redirect to the login page
        exit();
    }
}
include("./index.html");
?>

<body>
    <form action="" method="post">
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

                                            <h2 class="fw-bold mb-2 text-uppercase">SIGN UP</h2>
                                            <p class="text-dark-50 mb-5">Please enter your login and password!</p>

                                            <div class="form-outline form-white mb-4">
                                                <input type="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Email" name="email" required />
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeEmailX" class="form-control form-control-lg" placeholder="Username" name="username" required />
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" name="password" required />
                                            </div>

                                            <input class="btn btn-outline-danger btn-lg px-5" type="submit" name="signup">

                                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                                <a href="#!" class="text-danger"><i class="fab fa-facebook-f fa-lg"></i></a>
                                                <a href="#!" class="text-danger"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                                <a href="#!" class="text-danger"><i class="fab fa-google fa-lg"></i></a>
                                            </div>
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