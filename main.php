
<?php
include_once('./connection.php');
include_once('./Controller/UserController.php');

$controller = new UserController($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Other GET methods can be defined here.
}

// Define your endpoint here
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/Hansil/Mini_Project/main.php/login') {
    // if ($_POST['action'] === 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $controller->getUsers($email, $password);
    // }
}

// Define your endpoint here
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/Hansil/Mini_Project/main.php/upload') {
    // if ($_POST['action'] === 'login') {
    $email = $_REQUEST['email'];
    $file_name = $_REQUEST['file_name'];
    $controller->insert_($file_name,$email);
    // }
}
?>