<?php


class CaseController
{

    // public $offended = 
    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;
    }


    public function insertCase( $offender, $offenderRelation, $location, $witness, $description, $userid)
    {
        try
        {

            $insert_query = "INSERT INTO cases (offenderName, offenderRelation, incidentLocation, witnessPresent, caseDescription, offendedId) VALUES('$offender', '$offenderRelation', '$location', '$witness', '$description', '$userid')";

            $query_execute = $this->conn->query($insert_query);

            if($query_execute)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function fetchCase()
    {

        $user_id = $_SESSION['auth_user']['user_id'];

        $select_query = "SELECT * FROM cases WHERE offendedId='$user_id' ";
        $result = $this->conn->query($select_query);

        if($result->num_rows > 0 )
        {

            return $result;
        }
        else
        {
            return false;
        }
    }
}
?>