<?php

$conn = new mysqli('localhost', 'root', '', 'raphiki');

if($conn->connect_error){
 
    die("<h2>Database connection failed!</h2>".$conn->connect_error);

}

if(isset($_POST['action']))
{
    if($_POST["action"] == "fetch")
    {
        $query = "SELECT * FROM users";

        $execute_query = $conn->query($query);

        if($execute_query == TRUE && $execute_query->num_rows > 0)
        {
            while($row = $execute_query->fetch_assoc())
            {
                $data[] = array(
                    'users' => $row['role_as'] == 0 ,
                    'counsellors' => $row['role_as'] == 2
                );
            }

            echo json_encode($data);

        }
        else
        {
            redirect("could not load the chart data", "danger", "admin/index.php");
        }
    }
}

?>