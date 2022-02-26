<?php

include '../config/db_config.php';

class AuthenticationController
{
    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;

        $this->checkIsLoggedIn();
    }

    public function checkIsLoggedIn()
    {
       if(!isset($_SESSION['authenticated']))
        {
            redirect("login to access the page", "danger", "login.php");
            
            return false;
        }
        else
        {
            return true;
        }
    }

    public function authUserDetail()
    {
        $checkAuthentication = $this->checkIsLoggedIn();
        if($checkAuthentication)
        {
            $user_id = $_SESSION['auth_user']['user_id'];

            $getUserData = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
            $result = $this->conn->query($getUserData);

            if($result->num_rows > 0)
            {
                $data = $result->fetch_assoc();

                return $data;
            }
            else
            {
                redirect("Something went wrong", "danger", "login.php");
            }
        }
        else
        {
            return false;
        }

    }
}

$authenticated = new AuthenticationController;

?>