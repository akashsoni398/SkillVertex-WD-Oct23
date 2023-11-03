<?php 

    
    $host = "localhost";
    $dbname = "music-hub";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host,$username,$password,$dbname);

    if(!$conn) {
        $errmsg = "Database error:".mysqli_connect_error();
    }
?>