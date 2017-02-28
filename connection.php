<?php 
    $servername = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "db_student";
     
    $conn = new mysqli($servername, $db_user, $db_pass, $db_name); //เชื่อมDB
    
    header('Content-Type: text/html; charset=utf-8'); //ทำให้เป็นภาษาไทย
    if ($conn->connect_error) //CHECK CONNECTION
        die("Connection failed: " . $conn->connect_error);
    $conn->set_charset("utf8"); //ทำให้เป็นภาษาไทย
?>