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
            redirect("login to access the page", "danger", "views/login.php");
            
            return false;
        }
        else
        {
            return true;
        }
    }


    public function admin()
    {
        $userId = $_SESSION['auth_user']['user_id'];

        $checkAdmin = "SELECT id, role_as FROM users WHERE id='$userId' AND role_as='1' LIMIT 1";

        $result = $this->conn->query($checkAdmin);

        if($result->num_rows == 1)
        {
            return true;
        }
        else
        {
            redirect("You are not authorized as admin", "danger", "views/login.php");
        }
    }



    public function counsellor()
    {
        $userId = $_SESSION['auth_user']['user_id'];

        $checkCounsellor = "SELECT id, role_as FROM users WHERE id='$userId' AND role_as='2' LIMIT 1";

        $result = $this->conn->query($checkCounsellor);

        if($result->num_rows == 1)
        {
            return true;
        }
        else
        {
            redirect("You are not authorized as counsellor", "danger", "views/login.php");
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
                redirect("Something went wrong", "danger", "views/login.php");
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