<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'test');

    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_query($connect, "SET NAMES 'utf8'");

    if($connect == false){
        die("ERROR: " . mysqli_connect_error());
    }
    else{
        return $connect;
    }
    
?>