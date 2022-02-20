<?php
include '../controllers/regController.php';
include '../controllers/loginController.php';


$auth = new LoginController;

if(isset($_POST['login_btn']))
{
    $email = validate($db->conn,$_POST['email']);
    $password = validate($db->conn,$_POST['password']);


    $check_login = $auth->userLogin($email, $password); 

    if($check_login)
    {
        redirect("login was successful", "home.php");
    }
    else
    {
        redirect("invalid email or password","login.php");
    }
}


if(isset($_POST['register_btn'])){

    $fname = validate($db->conn,$_POST['fname']);
    $email = validate($db->conn,$_POST['email']);
    $password = validate($db->conn,$_POST['password']);
    $c_password = validate($db->conn,$_POST['c_password']);

    echo "working auth";

    $register= new RegisterController;

    $result_pswd = $register->confirmPassword($password,$c_password);

    if($result_pswd)
    {
        $user_exists = $register->userExists($email);

        if($user_exists)
        {
            redirect("user already exists", "registration.php");
        }
        else
        {
            $q = $register->registration($fname,$email,$password);

            if($q)
            {
                redirect("Added successfully", "login.php");
            }
            else
            {
                redirect("Registration was unsuccessful", "registration.php");
            }
        }
    }
    else
    {
        redirect("Passwords do not match", "registration.php");
    }
}
?>