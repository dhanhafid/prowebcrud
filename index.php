<?php
    include_once('connect.php');
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
    <title>Input Nilai</title>
</head>
<body>
    <h2>Nilai Mahasiswa</h2>
    <form method="POST">
        Nama Mahasiswa : <input type="text" name="nama"><br>
        Nilai Tugas : <input type="number" name="tugas" min="0" max="100"><br>
        Nilai UTS : <input type="number" name="uts" min="0" max="100"><br>
        Nilai UAS : <input type="number" name="uas" min="0" max="100"><br><br>

        <input type="submit" name="input"><br>
        <hr>
    </form>

    <?php
        if (isset($_POST['input'])) {
            $nama = $_POST['nama'];
            $tugas = $_POST['tugas'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];
            $mean = round(($_POST['tugas'] + $_POST['uts'] + $_POST['uas']) / 3 );
            $abjad = NULL;
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
            }

            $sql = "INSERT INTO nilaimahasiswa VALUES ('', '$nama', '$uts', '$uas', '$tugas', '$mean', '$abjad')";

            $conn->Execute($sql);
            $result = $conn->Affected_Rows();

    } ?>

    <table>
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>NILAI TUGAS</th>
            <th>NILAU UTS</th>
            <th>NILAU UAS</th>
            <th>RATA-RATA</th>
            <th>KONVERSI</th>
            <th>PILIHAN</th>
        </tr>

        <?php
            $rs = $conn->Execute("select * from nilaimahasiswa");

            if($rs -> RecordCount() > 0){

                while (!$rs->EOF) { ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $rs->fields[0]; ?></td>
                        <td style="text-align:center;"><?php echo $rs->fields[1]; ?></td>
                        <td style="text-align:center;"><?php echo $rs->fields[2]; ?></td>
                        <td style="text-align:center;"><?php echo $rs->fields[3]; ?></td>
                        <td style="text-align:center;"><?php echo $rs->fields[4]; ?></td>
                        <td style="text-align:center;"><?php echo $rs->fields[5]; ?></td>
                        <td style="text-align:center;"><?php echo $rs->fields[6]; ?></td>
                        <td><a href="hapus.php?detail=<?php echo $rs->fields[0]; ?>">hapus</a> | <a href="edit.php?detail=<?php echo $rs->fields[0]; ?>">edit</a></td>
                    </tr>
                <?php
                $rs->MoveNext();
                }

            }
        ?>
        
    </table>

</body>
</html>