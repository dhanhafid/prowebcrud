<?php
    include_once 'connect.php';

    $id = $_GET['detail'];

    $sql = "DELETE FROM nilaimahasiswa WHERE id = '$id'  ";
    
    $rs = $conn->Execute($sql);
    

    header('location:index.php');
?>