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
    <!-- <script type="text/javascript" src="/js/proses.js"></script> -->
    <script>
        function simpan() {
            var nim = document.getElementById("nim").value;
            var nama = document.getElementById("nama").value;
            var tugas = document.getElementById("tugas").value;
            var uts = document.getElementById("uts").value;
            var uas = document.getElementById("uas").value;

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            var url = "simpan.php";
            var params = "nim="+nim+"&nama="+nama+"&tugas="+tugas+"&uts="+uts+"&uas="+uas;
            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("tabel").innerHTML = xmlhttp.responseText;
                    bersih();
                }
            }

            xmlhttp.send(params);
        }

        function bersih() {
            document.getElementById("nim").value = "";
            document.getElementById("nama").value = "";
            document.getElementById("tugas").value = "";
            document.getElementById("uts").value = "";
            document.getElementById("uas").value = "";
        }
    </script>
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