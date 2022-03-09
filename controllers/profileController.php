<?php 

class ProfileController
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
            if($result->num_rows == 1){

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


    public function updateProfile($id, $fname, $email)
    {
        if(!empty($fname) && !empty($email))
        {
        $q = "UPDATE users SET fname='$fname', email='$email' WHERE id='$id'";
        $result = $this->conn->query($q);

        if($result)
        {
            return true;
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

  public function deleteUser($id)
  {

  }


}
?>