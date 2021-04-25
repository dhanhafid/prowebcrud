<?php
    include 'connect.php';

    $nim = $_GET['detail'];

    $sql = "DELETE FROM nilaimahasiswa WHERE nim = '$nim'  ";
    $query = mysqli_query($conn, $sql);
    if(!$query) {
        die ('SQL Error: ' . mysqli_error(($conn)));
    }

    header('location:index.php');
?>