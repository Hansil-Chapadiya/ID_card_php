<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <table border="3" cellpadding="10" cellspacing="10" align="center" class="mt-3 mb-3">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <tr>
                <!--  emp_no, emp_name, designation and salary -->
                <th>Enrollment No.</th>
                <th>Student name</th>
                <th>Conatact No.</th>
                <th>Image</th>
            </tr>
            <?php
            session_start();
            // if (isset($_GET['year'])) {
                $year = $_GET['year'];
                $year_num = intval(substr($year, 2, 5));
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
                 $sql = "SELECT enroll,name,contact_no,image FROM student_info where email_fkey = '" . $_SESSION['email'] . "' AND  enroll LIKE '$year_num%' ";
                 $result = mysqli_query($conn, $sql);
                 $num = mysqli_num_rows($result);
                 // print_r($result);

                 $i = 1;
                 if ($num > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td>" . $row['enroll'] . "</td><td>" . $row['name'] . "</td>" . "<td>" . $row['contact_no'] . "</td><td><img src='" .  $row['image'] . "' height='100' width='100'></td></tr>";
                         $i++;
                     }
                 }
             }
            ?>
            <tr>
                <td colspan="4"> <a class="btn btn-danger close" role="button" aria-disabled="true" data-dismiss="alert" aria-label="Close" href="./get_upload_file.php">Back
          <span aria-hidden="true">×</span></a></td>
            </tr>
        </form>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>