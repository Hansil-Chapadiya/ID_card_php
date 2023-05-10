<?php

class UserModel
{
    private $db;
    private $cnt = 0;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUsers($condition = '')
    {
        $query = "SELECT * FROM user";
        if (!empty($condition)) {
            $query .= " WHERE " . $condition;
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Other model methods for insert, update, delete operations can be defined here.
    public function insertStudent($file,$email)
    {
        error_reporting(0);
        require 'C:\\xampp\\htdocs\\Hansil\\Mini_Project\\excelReader\\excel_reader2.php';
        require 'C:\\xampp\\htdocs\\Hansil\\Mini_Project\\excelReader\\SpreadsheetReader.php';

        $reader = new SpreadsheetReader($file);
        try {
            foreach ($reader as $key => $row) {
                $enroll = $row[0];
                $name = $row[1];
                $department = $row[2];
                $dob = $row[3];
                $blood_groop = $row[4];
                $contact = $row[5];
                $address = $row[6];
                $email_fkey = $email;
                $image = $row[7];
                $parts = parse_url($image);
                parse_str($parts['query'], $query);
                $id = explode("/", $parts['path'])[3];
                $link = "https://drive.google.com/uc?export=view&id=$id";

                $stmt = $this->db->prepare("INSERT INTO student_info VALUES(?, ?, ?, ?,?,?,?,?,?)");
                $stmt->execute([$enroll, $name, $department,$dob,$blood_groop,$contact,$address,$email_fkey,$link]);
            }
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
