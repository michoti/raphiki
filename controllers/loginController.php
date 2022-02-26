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
        
        $check_user_query = "SELECT * FROM users WHERE email='$email' ";

        $result = $this->conn->query($check_user_query);

        if($result->num_rows >0)
        {
            $data = $result->fetch_assoc();

            //$hash = $data['passwrd'];

            $verify_password = password_verify($password, $data['passwrd']);

            if($verify_password)
            {
                $this->userAuth($data);
                return true;
            }
            else
            {
                return false;
            }

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
            'user_fname' => $data['fname'],
            'user_email' => $data['email']
        ];

    }

    public function comparePassword($pswd, $hashed_pswd)
    {
        $compare_password = password_verify( $pswd, $hashed_pswd);

        if($compare_password)
        {
            return true;
        }
        else
        {
            return false;
        }

    }


    public function isLoggedin()
    {
        if(isset($_SESSION['authenticated'])  === TRUE)
        {
            redirect("you're already logged in", "success", "home.php");
            
            return true;
        }
        else
        {
            return false;
        }
    }


    public function logout()
    {

        if(isset($_SESSION['authenticated'])  === TRUE)
        {
            unset( $_SESSION['authenticated']);
            unset( $_SESSION['auth_user']);
            
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>