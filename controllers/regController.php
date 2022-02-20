<?php

// include '../config/dbConnection.php';

class RegisterController
{
    public function __construct()
    {
        $db = new Database;
        return $this->conn = $db->conn;
    }

    public function registration($fname,$email,$password)
    {
        $query = "INSERT INTO users (fname,email,passwrd) VALUES ('$fname','$email','$password')";
        $result = $this->conn->query($query);

        return $result;
    }

    public function confirmPassword($password,$c_password)
    {
        if($password == $c_password){
            return true;
        }else{
            return false;
        }
    }


    public function userExists($email)
    {
        $check_query = "SELECT email FROM users WHERE email= $email LIMIT 1";
        $result = $this->conn->query($check_query);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>