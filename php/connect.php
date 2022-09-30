<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "duhigure";

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn) {

    }else{
        echo $conn->error;
    }

?>