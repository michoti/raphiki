<?php


class CaseController
{
    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;
    }


    public function insertCase( $offender, $location,$witness,$description)
    {
        try
        {
            $query = "INSERT INTO cases (offenderName, incidentLocation, witnessPresent, caseDescription) VALUES(?,?,?,?)";

            $statement = $this->conn->prepare($query);

            // $statement->bind_param(1, $offender);
            // $statement->bind_param(2, $location);
            // $statement->bind_param(3, $witness);
            // $statement->bind_param(4, $description);

            $statement->bind_param('ssss', $offender, $location,$witness,$description);
            $query_execute = $statement->execute();

            if($query_execute)
            {
                // redirect("Added successfully", "success", "views/home.php");
                // exit(0);
                return true;
            }
            else
            {
                // redirect("Failed to add successfully", "danger", "views/home.php");
                return false;
            }
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
}
?>