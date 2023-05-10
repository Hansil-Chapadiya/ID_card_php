<?php
include("./index.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        #start:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="./login.php" method="post">
    <div class="bg-image" style="
            background-image: url('./back_img-transformed.jpeg');
            height: 100vh;opacity:0.7;">
        <div class="container mt-5 font w-50 d-flex">
            <p class="d-flex justify-content-center fs-4">
                The goal of an identity card is to store personal information that can help identify a person with certainty.
                The certainty one has in identifying someone else derives from the security of the credential itself.
                This means the personal information has to be stored securely in the card.
            </p>
        </div>
        <div class="container mt-5 font w-50 d-flex">
            <button class="btn btn-outline-danger btn-lg px-5" type="submit">Get Started</button>
        </div>
    </div>
    </form>
</body>

</html>