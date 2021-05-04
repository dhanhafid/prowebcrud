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
    <script type="text/javascript" src="../prowebcrud/js/proses.js"></script>
    <title>Input Nilai</title>
</head>
<body>
    <h2>Nilai Mahasiswa</h2>
    <form method="POST">
        NIM : <input type="text" name="nim" id="nim" maxlength="9" ><br>
        Nama Mahasiswa : <input type="text" name="nama" id="nama" maxlength="100"><br>
        Nilai Tugas : <input type="number" name="tugas" id="tugas" min="0" max="100" value=NULL><br>
        Nilai UTS : <input type="number" name="uts" id="uts" min="0" max="100" value="NULL"><br>
        Nilai UAS : <input type="number" name="uas" id="uas" min="0" max="100" value="NULL"><br><br>

        <button onclick="simpan()">Simpan</button>
        <hr>
    </form>

    <div id="tabel">
        <?php include_once 'tabel.php'?>
    </div>

</body>
</html>