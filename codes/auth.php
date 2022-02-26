<?php
include '../controllers/regController.php';
include '../controllers/loginController.php';


$auth = new LoginController;

if(isset($_POST['logout_btn'])){
    // echo "clicked";
    $check_logout = $auth->logout();

    if($check_logout)
    {
        redirect("Logged out successfuly", "success", "views/login.php");
    }
}

if(isset($_POST['login_btn']))
{
    $email = validate($db->conn,$_POST['email']);
    $password = validate($db->conn,$_POST['password']);


    $check_login = $auth->userLogin($email, $password); 

    if($check_login)
    {
        if($_SESSION['auth_role'] == '1')
        {
            redirect("Wecome sir!", "success", "admin/index.php");
        }
        else
        {            
            redirect("login was successful", "success", "views/home.php");
        }
    }
    else
    {
        redirect("invalid email or password",  "danger", "views/login.php");
    }
}


if(isset($_POST['register_btn'])){

    $fname = validate($db->conn,$_POST['fname']);
    $email = validate($db->conn,$_POST['email']);
    $password = validate($db->conn,$_POST['password']);
    $c_password = validate($db->conn,$_POST['c_password']);

    // echo "working auth";

    $register= new RegisterController;

    $result_pswd = $register->confirmPassword($password,$c_password);

    if($result_pswd)
    {
        $user_exists = $register->userExists($email);

        if($user_exists)
        {
            // echo "user exists";
            redirect("user already exists",  "danger", "views/registration.php");
        }
        else
        {
            $q = $register->registration($fname,$email,$password);

            if($q)
            {
                redirect("Added successfully", "success", "views/login.php");
            }
            else
            {
                redirect("Registration was unsuccessful", "danger", "views/registration.php");
            }
        }
    }
    else
    {
        redirect("Passwords do not match", "danger", "views/registration.php");
    }
}
?>