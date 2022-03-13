<?php

// include '../config/dbConnection.php';

class RegisterController
{
    public function __construct()
    {
        $db = new Database;
        return $this->conn = $db->conn;
    }

    public function registration($fname,$sname, $gender, $idNo, $telNo, $email,$password)
    {
        $hashedpasswd = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO 
                  users (fname, sname, gender, id_number, tel_number, email, passwrd)
                  VALUES ('$fname', '$sname', '$gender', '$idNo', '$telNo','$email','$hashedpasswd')";
                  
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
        $check_query = "SELECT * FROM users WHERE email= '$email' LIMIT 1";
        $result = $this->conn->query($check_query);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }


    public function regCounsellor($fname, $sname, $email, $gender, $counsellor_id, $counsellor_tel, $specialty)
    { 
        $default = "yellow";
        $hashed = password_hash($default, PASSWORD_DEFAULT);
        $role = 2;

        $query = "INSERT INTO
         `users`(`fname`, `sname`, `gender`, `id_number`, `tel_number`, `email`, `specialty`, `passwrd`, `role_as` ) 
         VALUES ('$fname','$sname', '$gender','$counsellor_id','$counsellor_tel','$email','$specialty','$hashed','$role')" ; 
         
         $result = $this->conn->query($query);

         if($result)
         {
             return true;
         }
         else
         {
             return false;
         }
    }
}
?>