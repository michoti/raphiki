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


    public function updateProfile($id, $fname, $sname, $idNo, $telNo, $email)
    {
        if(!empty($fname) && !empty($email) && !empty($sname))
        {
        $update_query = "UPDATE users 
                SET 
                fname='$fname',
                sname='$sname',
                id_number='$idNo', 
                tel_number='$telNo', 
                email='$email'
                WHERE 
                id='$id'";

        $result = $this->conn->query($update_query);
  
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


  public function updateCounsellor($id, $fname, $sname, $gender, $idNo, $telNo, $specialty, $email)
  {
      if(!empty($fname) && !empty($email) && !empty($sname) && !empty($idNo) && !empty($telNo))
      {
      $q = "UPDATE users 
              SET 
              fname='$fname',
              sname='$sname',
              gender='$gender',
              id_number='$idNo', 
              tel_number='$telNo', 
              email='$email', 
              specialty='$specialty'
              WHERE 
              id='$id'";
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
      $delete_query = "DELETE FROM users WHERE id='$id'";
      $execute_delete_query = $this->conn->query($delete_query);

      if($execute_delete_query)
      {
          return true;
      }
      else
      {
          return false;
      }
  }


}
?>