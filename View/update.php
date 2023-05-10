<body>
    <table border="3" cellpadding="10" cellspacing="10" align="center">
        <form action="./update1.php" method="post" target="_blank">
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
                <th>UPADATE</th>
            </tr>
            <?php
            session_start();
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
                $sql = "SELECT * FROM student_info where email_fkey = '" . $_SESSION['email'] . "' AND  enroll LIKE '$year_num%' ";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);

                $i = 1;
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row['enroll'] . "</td><td>" . $row['name'] . "</td>" . "<td>" . $row['department'] . "</td><td>" .  $row['dob'] . "</td><td>" .  $row['blood_group'] . "</td><td>" .  $row['contact_no'] . "</td><td>" .  $row['Address'] . "</td><td><img src='" .  $row['image'] . "' height='100' width='100'></td><td><input type='checkbox' value='" . $row['enroll'] . "' name='CheckBox[]'></td></tr>";
                        $i++;
                    }
                }
            }
            ?>
            <tr>
                <td colspan="9"><input type="submit" name="submit" value="submit"></td>
            </tr>
        </form>
    </table>
</body>