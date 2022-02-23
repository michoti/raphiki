<?php

class Database{

    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE);

        if($conn->connect_error){
         
            die("<h2>Database connection failed!</h2>".$conn->connect_error);
        
        }
        // else
        // {

        //     echo "Database connected successfully";
        // }

        return $this->conn= $conn;
    }

  
}
?>