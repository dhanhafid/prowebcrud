<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'prowebcrud';
    
    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
   
    if (!$conn) {
    die ('failed to connect: ' . mysqli_connect_error());
    }
?>