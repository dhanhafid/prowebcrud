<?php
    include_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
    <script src="js/proses.js"></script>
    <title>Input Nilai</title>
</head>
<body>
    <h2>Nilai Mahasiswa</h2>

    <div id="tambah">
        <?php include 'tambah.php';?>
    </div>

    <hr>

    <div id="tabel">
        <?php include 'tabel.php'; ?>
    </div>

    <div id="edit"></div>

</body>
</html>