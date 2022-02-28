<?php
include_once '../controllers/authenticationController.php';

$data = $authenticated->authUserDetail();

if(isset($_POST['report_case']))
{
    $UserData = [
        'offernderName' => mysqli_escape_string($db->conn,$_POST['offender_name']),
        'offernderName' => mysqli_escape_string($db->conn,$_POST['location']),
        'offernderName' => mysqli_escape_string($db->conn,$_POST['witness']),
        'offernderName' => mysqli_escape_string($db->conn,$_POST['description']),
        'offernderName' => mysqli_escape_string($db->conn,$_POST['offender_name'])
    ];
}
?>