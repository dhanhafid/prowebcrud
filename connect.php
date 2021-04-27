<?php
    include_once("adodb5/adodb.inc.php");
    $conn = NewADOConnection("mysqli");
    $conn->Connect("localhost", "root", "", "prowebcrud");
    global $conn;
    
    if (!$conn) {
    die ('failed to connect: ' . mysqli_connect_error());
    }
?>