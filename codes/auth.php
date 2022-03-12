<?php
include '../controllers/regController.php';
include '../controllers/loginController.php';
include_once '../controllers/profileController.php';


$auth = new LoginController;

if(isset($_POST['logout_btn'])){
    // echo "clicked";
    $check_logout = $auth->logout();

    if($check_logout)
    {
        redirect("Logged out successfuly", "success", "views/index.php");
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
        elseif($_SESSION['auth_role'] == '2')
        {
            redirect("Wecome sir!", "success", "counsellor/index.php");
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




if(isset($_POST['edit-profile-btn']))
{
    $id = validate($db->conn, $_POST['editedId']);
    $fname = validate($db->conn, $_POST['editedname']);
    $email = validate($db->conn, $_POST['editedemail']);

    $user_id= validate($db->conn,$id);

    $Profile = new ProfileController;
    $execution = $Profile->updateProfile($user_id, $fname, $email);

    if($execution)
    {
    redirect("Updated successfuly", "success", "views/profile.php");
    }
    else
    {
    redirect("Update failed", "danger", "views/edit_profile.php");
    }
    
}



if(isset($_POST['changepassword-btn']))
{
    $userid = validate($db->conn, $_POST['user_id']);
    $current = validate($db->conn, $_POST['currentpassword']);
    $new = validate($db->conn, $_POST['newpassword']);

    $profile = new ProfileController;
    $result = $profile->fetchUserData($userid);

    if($result == TRUE)
    {
        $data = $result->fetch_assoc();
        $password_verification = new LoginController;
        $password = $password_verification->comparePassword($current , $data['passwrd']);

        if($password)
        {
            $hashedpassword = password_hash($new, PASSWORD_DEFAULT);

            $update_query = "UPDATE users SET passwrd='$hashedpassword' WHERE id='$userid'";
            $execute_update_query = $db->conn->query($update_query);

            if($execute_update_query)
            {
                redirect("password changed successfully", "success", "views/profile.php");
            }
            else
            {
                redirect("update was not successful", "danger", "views/profile.php");                
            }
        }
        else
        {
            redirect("password does not match existing password", "danger", "views/profile.php");            
        }
    }
    else
    {
        redirect("password is not in database", "danger", "views/profile.php");
    }
}


if(isset($_POST['btn-yes']))
{
    $userid = validate($db->conn, $_POST['user_id']);
    
    $profile = new ProfileController;
    $delete_user = $profile->deleteUser($userid);

    if($delete_user)
    {
        $controller = new LoginController;
        $unset_sessions = $controller->logout();

        if($unset_sessions)
        {
            redirect("Raphiki account deleted", "danger", "views/registration.php");
        }


    }
    else
    {
        redirect("Cannot delete account", "danger", "views/profile.php");
    }
}


if(isset($_POST['regCounsellor-btn']))
{
    $fname = validate($db->conn,$_POST['first_name']);
    $sname = validate($db->conn,$_POST['second_name']);
    $email = validate($db->conn,$_POST['counselloremail']);
    $c_id = validate($db->conn,$_POST['counsellorId']);
    $c_tel = validate($db->conn,$_POST['counsellorTel']);
    $gender = validate($db->conn,$_POST['gender']);
    $specialty = validate($db->conn,$_POST['specialty']);

    $reg = new RegisterController;
    $result = $reg->regCounsellor($fname, $sname, $email, $gender, $c_id, $c_tel, $specialty);

    if($result)
    {
        redirect("registration successful", "success", "admin/register_counsellor.php");
    }
    else
    {
        redirect("registration unsuccessful", "danger", "admin/register_counsellor.php");
    }
}
?>