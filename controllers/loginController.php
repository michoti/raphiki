<?php

class LoginController
{
    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;
    }


    public function userLogin($email, $password)
    {
        $check_user_query = "SELECT * FROM users WHERE email='$email' AND passwrd='$password' ";
        $result = $this->conn->query($check_user_query);

        if($result->num_rows >0)
        {
            $data = $result->fetch_assoc();
            $this->userAuth($data);
            return true;
        }
        else
        {
            return false;

        }
    }


    private function userAuth($data)
    {
        $_SESSION['authenticated']= true;
        // $_SESSION['auth_role']= $data['role_as'];
        $_SESSION['auth_user'] = [
            'user_id' => $data['id'],
            'user_id' => $data['fname'],
            'user_id' => $data['email']
        ];

    }


    public function isLoggedin()
    {
        if(isset($_SESSION['authenticated'])  === TRUE)
        {
            redirect("you're already logged in", "home.php");
            
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>