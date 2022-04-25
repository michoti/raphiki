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


    public function insert_counsellor_msg($name, $sender_email, $recipient_email , $message, $subject)
    {
        $query = "INSERT INTO counsellor_msg (name, sender_email, recipient_email, subject, message) VALUES ('$name', '$sender_email' , '$recipient_email', '$subject', '$message')";
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