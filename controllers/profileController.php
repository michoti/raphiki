<?php 
include_once '../controllers/authenticationController.php';

class profileController
{
    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;
    }

    public function fetchUserData($id)
    {
        $query = "SELECT * FROM users WHERE id='$id' ";

        $result = $this->conn->query($query);

        if($result)
        {
            if($result->num_rows >0){
                return $result;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }

    }
}
?>