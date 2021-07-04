<?php
    include_once 'connect.php';

    if ($_POST){
        $id = $_GET['id'];
            
        $nim = $_POST['nim'];
        $nama = AddSlashes($_POST['nama']);
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        
        $sql = "UPDATE `nilaimahasiswa` SET `nim` = '$nim', `nama_mhs` = '$nama', `nilai_uts` = '$uts', `nilai_uas` = '$uas', `nilai_tugas` = '$tugas' WHERE `nilaimahasiswa`.`id` = '$id'";
        
        $conn->Execute($sql);
        $result = $conn->Affected_Rows();
        include_once './tabel.php';
        return;
    }
?>

<h2>Masukkan Nilai Baru</h2>
<?php
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM `nilaimahasiswa` WHERE `id` = '$id'";
    
    $rs = $conn->Execute($sql);

        while (!$rs->EOF) { ?>

            NIM : <input type="text" name="nim" id="nim-edit" value=<?php echo $rs->fields[1]; ?> maxlength="9" ><br>
            Nama : <input type="text" name="nama" id="nama-edit" value=<?php echo $rs->fields[2]; ?> maxlength="100"><br>
            Nilai Tugas : <input type="number" name="tugas" id="tugas-edit" value=<?php echo $rs->fields[5]; ?> min="0" max="100"><br>
            Nilai UTS : <input type="number" name="uts" id="uts-edit" value=<?php echo $rs->fields[3]; ?> min="0" max="100"><br>
            Nilai UAS : <input type="number" name="uas" id="uas-edit" value=<?php echo $rs->fields[4]; ?> min="0" max="100"><br><br>

            <button onclick="simpanEdit('<?php echo $rs->fields[0]; ?>'); hapusEdit();">Simpan</button>

        <?php
        $rs->MoveNext();
        }
?>