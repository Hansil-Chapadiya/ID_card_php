<?php
include_once('C:\\xampp\\htdocs\\Hansil\\Mini_Project\\Modals\\UserModel.php');

class UserController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new UserModel($db);
    }

    public function getUsers($email, $password)
    {
        $email_form = $email;
        $password_form = $password;
        $condition = "email = '$email_form' AND password = '$password_form'";
        $users = $this->model->getUsers($condition);
        // Process the users data and send the response to the client.
        // For example, return a JSON response.
        header('Content-Type: application/json');
        if ($users) {
            // Set POST data
            $status = array(
                'email' => $email,
                'password' => $password,
                'status' => true
            );
            echo json_encode($status);
        } else {
            // Set POST data
            $status = array(
                'status' => 0
            );
            echo json_encode($status);
        }
    }

    public function insert_($file,$email)
    {
        $get_status = $this->model->insertStudent($file,$email);
        if ($get_status) {
            $status = array(
                'status' => $get_status
            );
            echo json_encode($status);
        } else {
            // Set POST data
            $status = array(
                'status' => 0
            );
            echo json_encode($status);
        }
    }
    // Other controller methods for insert, update, delete operations can be defined here.
}
