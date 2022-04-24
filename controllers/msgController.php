<?php 

class Message 
{
    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;
    }

    public function insert_stray_msg($name, $email, $msg, $subject)
    {
        $query = "INSERT INTO stray_msg (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$msg')";
        $exeute = $this->conn->query($query);

        if($exeute)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}