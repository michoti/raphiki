<?php
include_once '../controllers/authenticationController.php';
include_once '../controllers/caseController.php';

$data = $authenticated->authUserDetail();

if(isset($_POST['report_case']))
{
    
        $offernderName = mysqli_escape_string($db->conn,$_POST['offender_name']);
        $location = mysqli_escape_string($db->conn,$_POST['location']);
        $witness = mysqli_escape_string($db->conn,$_POST['witness']);
        $description = mysqli_escape_string($db->conn,$_POST['description']);
        // 'offernderName' => mysqli_escape_string($db->conn,$_POST['offender_name'])

        $reportCase = new CaseController;
        $result = $reportCase->insertCase($offernderName,$location,$witness,$description);

        if($result)
        {
            redirect("Added successfully", "success", "views/home.php");
        }
        else
        {
            redirect("Failed to add successfully", "danger", "views/home.php");
        }
    
}
?>