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
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fileName = $_FILES["excel"]["name"];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));
        $newFileName = $fileName . "_" . date('d-m-Y_G-i-sa') . "." . $fileExtension;

        $targetDirectory = "C:\\xampp\\htdocs\\Hansil\\Mini_Project\\uploads\\" . $newFileName;
        move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
        // rest of the code

        $email = $_SESSION['email'] ;
        $arr = array(
            'file_name' => $targetDirectory,
            'email' => $email
        );

        // Set API endpoint URL
        $url = "http://localhost/Hansil/Mini_Project/main.php/upload";

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request
        $response = curl_exec($ch);


        // Process API response
        if ($response) {
            // Response received, process the data
            $result = json_decode($response, true);
            if ($result['status'] == 1) {
                header("location:./show_student.php");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                <a class="btn btn-danger close" role="button" aria-disabled="true" data-dismiss="alert" aria-label="Close" href="./get_upload_file.php">Dismiss
                  <span aria-hidden="true">×</span></a>
              </div>';
                // print_r($result);
            }
            // Do something with the data
        } else {
            // print_r($response);
        }

        // Close cURL session
        curl_close($ch);
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>