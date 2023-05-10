<body>
    <table border="3" cellpadding="10" cellspacing="10" align="center">
        <form action="./update2.php" method="post" target="_blank">
            <tr>
                <!--  emp_no, emp_name, designation and salary -->
                <th>Enrollment No.</th>
                <th>Student name</th>
                <th>Department</th>
                <th>DOB</th>
                <th>Blood Group</th>
                <th>Conatact No.</th>
                <th>Addrees</th>
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
                // global $i;
                $i = 1;
                if (isset($_REQUEST['submit'])) {
                    if (!empty($_REQUEST["CheckBox"])) {
                        foreach ($_REQUEST["CheckBox"] as $selected) {
                            $sql = "SELECT * FROM student_info where enroll = $selected";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            if ($num > 0) {
                                if ($row = mysqli_fetch_assoc($result)) {
                                    echo "<input type='hidden' value='" . $row['enroll'] . "' name='enroll:$i'>";
                                    echo "<tr><td><input type='text' value ='" . $row['enroll'] . "' disabled></td><td><input type='text' name='name:$i' value ='" . $row['name'] . "'></td>" . "<td><input type='text' name='department:$i' value ='" . $row['department'] . "'></td><td><input type='text' name='dob:$i' value ='" .  $row['dob'] . "'></td><td><input type='text' name='blood_group:$i' value ='" .  $row['blood_group'] . "'></td><td><input type='text' name='contact_no:$i' value ='" .  $row['contact_no'] . "'></td><td><input type='text' name='Address:$i' value ='" .  $row['Address'] . "'></td><td><input type='text' name='image:$i' value ='" .  $row['image'] . "'></td></tr>";
                                    // echo 'cust_no:.' .$i. "<br>";
                                    $i++;
                                }
                            }
                        }
                    }
                }
            }
            ?>
            <tr>
                <input type="hidden" value="<?php echo ($i-1); ?>" name="count">
                <td colspan="8"><input type="submit" name="submit" value="submit"></td>
            </tr>
        </form>
    </table>
</body>

