<?php
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
    if (isset($_REQUEST['submit'])) {
        $count_cust = $_REQUEST['count'];
        for ($i = 1; $i <= $count_cust; $i++) {
            $enroll = $_REQUEST['enroll:' . $i];
            $name = $_REQUEST['name:' . $i];
            $department = $_REQUEST['department:' . $i];
            $dob = $_REQUEST['dob:' . $i];
            $blood_group = $_REQUEST['blood_group:' . $i];
            $contact_no = $_REQUEST['contact_no:' . $i];
            $Address = $_REQUEST['Address:' . $i];

            $image = $_REQUEST['image:' . $i];
            $parts = parse_url($image);
            parse_str($parts['query'], $query);
            $id = explode("/", $parts['path'])[3];
            $link = "https://drive.google.com/uc?export=view&id=$id";

            try {
                $sql1 = "UPDATE student_info SET name = '" . $name . "', department = '" . $department .  "', dob ='" . $dob . "', blood_group ='" . $blood_group . "', contact_no =" . $contact_no . ", Address ='" . $Address . "', image ='" . $image .   "' WHERE enroll = " . $enroll . "";
                if (mysqli_query($conn, $sql1)) {
                    header("location:./get_upload_file.php");
                } else {
                    echo "Failed";
                }
            } catch (Exception $ex) {
                echo $ex;
            }
        }
    } else {
        echo  "Not set";
    }
}
