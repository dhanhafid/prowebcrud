<?php
    include_once 'connect.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM nilaimahasiswa WHERE id = '$id'  ";
    
    $rs = $conn->Execute($sql);

    include 'tabel.php';
?>