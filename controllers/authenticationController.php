<?php

class AuthenticationController
{
    public function __construct()
    {
        $this->checkIsLoggedIn();
    }

    public function checkIsLoggedIn()
    {
       if(isset($_SESSION['authenticated']))
        {
            redirect("login to access the page", "danger", "login.php");
            
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>