<?php
    include_once 'connect.php';

    $nim = $_GET['detail'];

    $sql = "DELETE FROM nilaimahasiswa WHERE nim = '$nim'  ";
    
    $rs = $conn->Execute($sql);
    

    header('location:index.php');
?>