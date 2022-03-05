<?php
include_once '../controllers/authenticationController.php';
include_once '../controllers/caseController.php';

$data = $authenticated->authUserDetail();

if(isset($_POST['report_btn']))
{
        $user_id = $_SESSION['auth_user']['user_id'];
    
        $offenderName = mysqli_escape_string($db->conn,$_POST['offender_name']);
        $offenderRelation = mysqli_escape_string($db->conn,$_POST['relation']);
        $location = mysqli_escape_string($db->conn,$_POST['location']);
        $witness = mysqli_escape_string($db->conn,$_POST['witness']);
        $description = mysqli_escape_string($db->conn,$_POST['description']);
        // 'offernderName' => mysqli_escape_string($db->conn,$_POST['offender_name'])

        $reportCase = new CaseController;
        $result = $reportCase->insertCase($offenderName, $offenderRelation, $location, $witness, $description, $user_id);

        if($result)
        {
            redirect("Added successfully", "success", "views/home.php");
            exit(0);
        }
        else
        {
            redirect("Failed to add successfully", "danger", "views/home.php");
        }
    
}
?>