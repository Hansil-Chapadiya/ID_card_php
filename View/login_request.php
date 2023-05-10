<?php
session_start();
if (isset($_POST['submit'])) {
    $_SESSION["email"] = $_POST['email'];
    $_SESSION["password"] = $_POST['password'];
    $_SESSION["loggedin"] = true;
    // Set POST data
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $data = array(
        'email' => $email,
        'password' => $hashed_password
    );

    // Set API endpoint URL
    $url = "http://localhost/Hansil/Mini_Project/main.php/login";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($ch);
    // Close cURL session
    curl_close($ch);

    // Process API response
    if ($response) {
        // Response received, process the data
        $result = json_decode($response, true);
        if($result['status'] == 1){
            header("location:./get_upload_file.php");
        }
        else
        {
            echo "<script>alret('Invalid Email/Password');</script>";
            // header("location:./login.php");
        }
        // Do something with the data
    } else {
        echo "<script>alret('Invalid Email/Password');</script>";
        // header("location:./login.php");
    }
}
