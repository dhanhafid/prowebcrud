<?php
    include_once 'connect.php';
    
    $nim = $_POST['nim'];
    $nama = AddSlashes($_POST['nama']);
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    $sql = "INSERT INTO nilaimahasiswa (nim, nama_mhs, nilai_uts, nilai_uas, nilai_tugas) VALUES ('$nim', '$nama', '$uts', '$uas', '$tugas')";

    $conn->Execute($sql);
    $result = $conn->Affected_Rows();

    include_once './tabel.php';

?>