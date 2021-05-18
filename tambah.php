<?php
    include_once 'connect.php';

    if ($_POST){
        $nim = $_POST['nim'];
        $nama = AddSlashes($_POST['nama']);
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];

        $sql = "INSERT INTO nilaimahasiswa VALUES ('', '$nim', '$nama', '$uts', '$uas', '$tugas')";

        $conn->Execute($sql);
        $result = $conn->Affected_Rows();
    }

?>

<form method="POST">
    NIM : <input type="text" name="nim" id="nim" maxlength="9" ><br>
    Nama Mahasiswa : <input type="text" name="nama" id="nama" maxlength="100"><br>
    Nilai Tugas : <input type="number" name="tugas" id="tugas" min="0" max="100" value=NULL><br>
    Nilai UTS : <input type="number" name="uts" id="uts" min="0" max="100" value="NULL"><br>
    Nilai UAS : <input type="number" name="uas" id="uas" min="0" max="100" value="NULL"><br><br>

    <button onclick="simpan()">Simpan</button>
</form>

