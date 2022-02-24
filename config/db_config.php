<?php

    session_start();

    define("DB_HOST", 'localhost');  
    define("DB_USER", 'root');  
    define("DB_PASSWORD", '');  
    define("DB_DATABSE", 'raphiki');
    define("SITE_URL", 'http://localhost/raphiki/views/');

    include 'dbConnection.php';

    $db = new Database;


    function base_url($slug)
    {
       echo SITE_URL.$slug; 
    }

    function redirect($msg, $type, $page)
    {
        $redirectTo = SITE_URL.$page;
        $_SESSION['message']= "$msg";
        $_SESSION['type']= "$type";

        header("Location: $redirectTo");
        exit(0);
    }

    function validate($dbconn,$input)
    {
        return mysqli_real_escape_string($dbconn,$input);
    }

?>