<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Icard.css" rel="StyleSheet" type="text/css" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    if (((isset($_SESSION['email'])) && $_SESSION['loggedin'] == true)) {
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "php_miniproject";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from database
        $sql = "SELECT * FROM student_info where email_fkey= '" . $_SESSION['email'] . "'";
        $result = $conn->query($sql);

        // Display two cards in two columns until loop ends
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            if ($counter % 2 == 0) {
                echo "<div class='row mt-3'>";
            }
            echo "<div class='col'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo '<div class="row mb-2">
            <div class="col-3">
                <img class="d-block w-100" src="./photo_6253356539574335081_m.jpg" alt="" height="100px">
            </div>
            <div class="col-9">
                <h5 align="center">DR.S. &S. S. GHANDHY COLLEGE OF ENGG. AND TECH., SURAT </h5>
                <h6 align="center">Gujarat Technological University</h6>
            </div>
        </div>';
            echo "<div class='row'>";
            echo "<div class='col-md-3  col-sm-3'>";
            echo "<img src='" . $row['image'] . "' class='w-100 h-100' alt=''>";
            echo "</div>";
            echo "<div class='col-md-9 col-sm-9 fit-content'>";
            echo "<p>" . $row['name'] . "<br>";
            echo "" . $row['enroll'] . "<br>";
            echo "" . $row['department'] . "<br>";
            echo "" . $row['dob'] . "<br>";
            echo "" . $row['blood_group'] . "<br>";
            echo "" . $row['contact_no'] . "<br>";
            echo "" . $row['Address'] . "<br>";
            echo "" . $row['email_fkey'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            if ($counter % 2 == 1) {
                echo "</div>";
            }
            $counter++;
        }
        // Close container and row
        if ($counter % 2 == 1) {
            echo "</div>";
        }
        echo "</div>";

        // Close connection
        $conn->close();
    } else {
        header("location:./login.php");
    }
    ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->

</body>

</html>