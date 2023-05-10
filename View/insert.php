<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Contact Us</title>
</head>

<body>
    <div class="container mt-3">
        <h1>Insert into Student Data</h1>
        <form action="./insert.php" method="post">
            <div class="form-group">
                <label for="name">Enrollment: </label>
                <input type="text" name="enroll" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="name">Department: </label>
                <input type="text" name="department" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="name">Date of Birth: </label>
                <input type="text" name="dob" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="name">Blood_Group: </label>
                <input type="text" name="blood_group" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="mobile">contact_no: </label>
                <input type="number" name="contact_no" class="form-control" id="mobile" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Address: </label>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Address"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="desc">Drive Image link: </label>
                <input type="text" name="image" class="form-control" id="city" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $enroll = $_POST['enroll'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];
    $contact_no = $_POST['contact_no'];
    $Address = $_POST['Address'];


    // Connecting to the Database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "php_miniproject";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Die if connection was not successful
    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
        // Submit these to a database
        // Sql query to be executed
        $image = $_POST['image'];
        $parts = parse_url($image);
        parse_str($parts['query'], $query);
        $id = explode("/", $parts['path'])[3];
        $link = "https://drive.google.com/uc?export=view&id=$id";

        $sql = "INSERT INTO student_info VALUES ($enroll,'$name', '$department', '$dob', '$blood_group', $contact_no, '$Address', '" . $_SESSION['email'] . "', '$link')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        } else {
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
    }
}

?>