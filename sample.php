<body>
    <table border="3" cellpadding="10" cellspacing="10" align="center">
        <tr>
            <!--  emp_no, emp_name, designation and salary -->
            <th>Enrollment_no</th>
            <th>Student_name</th>
            <th>Department</th>
            <th>Date_of_Birth</th>
            <th>Blood_Group</th>
            <th>Contact_no</th>
            <th>Address</th>
            <th>Email_of_HOD</th>
            <th>Image</th>
        </tr>
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
            // Submit these to a database
            // Sql query to be executed
            $sql = "SELECT * FROM student_info";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            global $image;
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>". $row['enroll'] . "</td>";
                    echo "<td>". $row['name'] . "</td>";
                    echo "<td>". $row['department'] . "</td>";
                    echo "<td>". $row['dob'] . "</td>";
                    echo "<td>". $row['blood_group'] . "</td>";
                    echo "<td>". $row['contact_no'] . "</td>";
                    echo "<td>". $row['Address'] . "</td>";
                    echo "<td>". $row['email_fkey'] . "</td>";
                    echo "<td><img src='". $row['image'] . "'></td></tr>";
                    // $image = $row['image'];
                    // // echo $image;
                    // // Google Drive link to the image
                    // $image_url = $image;

                    // // Retrieve the contents of the image
                    // $image_data = file_get_contents($image_url);

                    // // Check if image data is valid
                    // if (!$image_data) {
                    //     die("Error retrieving image data.");
                    // }

                    // // Set the Content-Type header to the image MIME type
                    // header('Content-Type: image/jpeg');

                    // // Create the image resource from the image data
                    // $image = imagecreatefromstring($image_data);

                    // // Resize the image if needed
                    // $width = imagesx($image);
                    // $height = imagesy($image);
                    // $new_width = 200;
                    // $new_height = ($height / $width) * $new_width; // maintain aspect ratio
                    // $resized_image = imagecreatetruecolor($new_width, $new_height);
                    // imagecopyresampled($resized_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                    // Output the image

                }
            }
        }
