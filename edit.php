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
    <title>Nilai Mahasiswa</title>
</head>
<body>
    <table>
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>NILAI TUGAS</th>
            <th>NILAU UTS</th>
            <th>NILAU UAS</th>
            <th>RATA-RATA</th>
            <th>KONVERSI</th>
        </tr>

        <?php
            $id = $_GET['detail'];

            $sql = 'SELECT * FROM `nilaimahasiswa` WHERE `id` = '.$id.'';

            $rs = $conn->Execute($sql);

            while (!$rs->EOF) { ?>
                <tr>
                    <td style="text-align:center;"><?php echo $rs->fields[1]; ?></td>
                    <td style="text-align:center;"><?php echo $rs->fields[2]; ?></td>
                    <td style="text-align:center;"><?php echo $rs->fields[5]; ?></td>
                    <td style="text-align:center;"><?php echo $rs->fields[3]; ?></td>
                    <td style="text-align:center;"><?php echo $rs->fields[4]; ?></td>
                    <?php $mean = round(($rs->fields[3]+$rs->fields[4]+$rs->fields[5]) / 3); ?>
                        <td style="text-align:center;"><?php echo $mean ?></td>
                        <?php $abjad = $abjad = "NULL";
                            if ($mean >= 90){
                                $abjad = 'A';
                            } elseif ($mean >= 80 && $mean <= 89) {
                                $abjad = 'B';
                            } elseif ($mean >= 70 && $mean <= 79) {
                                $abjad = 'C';
                            }elseif ($mean >= 60 && $mean <= 69) {
                                $abjad = 'D';
                            }else{
                                $abjad = 'E';
                            } ?>
                    <td style="text-align:center;"><?php echo $abjad; ?></td>
                </tr>
            <?php
            $rs->MoveNext();
            }
        ?>
    </table>

    <h2>Masukkan Nilai Baru</h2>
    <?php
        $id = $_GET['detail'];
        
        $sql = 'SELECT * FROM `nilaimahasiswa` WHERE `id` = '.$id.'';
        
        $rs = $conn->Execute($sql);

            while (!$rs->EOF) { ?>
    
            <form method="POST">
                NIM : <input type="text" name="nim" value=<?php echo $rs->fields[1]; ?> maxlength="9" ><br>
                Nama : <input type="text" name="nama" value=<?php echo $rs->fields[2]; ?> maxlength="100"><br>
                Nilai Tugas : <input type="number" name="tugas" value=<?php echo $rs->fields[5]; ?> min="0" max="100"><br>
                Nilai UTS : <input type="number" name="uts" value=<?php echo $rs->fields[3]; ?> min="0" max="100"><br>
                Nilai UAS : <input type="number" name="uas" value=<?php echo $rs->fields[4]; ?> min="0" max="100"><br><br>

                <input type="submit" name="input"><br>
            </form>

         <?php
            $rs->MoveNext();
            }
        
        ?>

    <?php
        if (isset($_POST['input'])) {
            $nim = $_POST['nim'];
            $nama = AddSlashes($_POST['nama']);
            $tugas = $_POST['tugas'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];

            $sql = "UPDATE `nilaimahasiswa` SET `nim` = '$nim', `nama_mhs` = '$nama', `nilai_uts` = '$uts', `nilai_uas` = '$uas', `nilai_tugas` = '$tugas' WHERE `nilaimahasiswa`.`nim` = '$nim'";

            $conn->Execute($sql);
            $result = $conn->Affected_Rows();
        
        header('location:index.php');

    } ?>
    
</body>
</html>