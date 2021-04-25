<?php
    include 'connect.php';
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
            $nim = $_GET['detail'];

            $sql = 'SELECT * FROM `nilaimahasiswa` WHERE `nim` = '.$nim.'';

            $query = mysqli_query($conn, $sql);
            if(!$query) {
                die ('SQL Error: ' . mysqli_error(($conn)));
            }

            while ($row = mysqli_fetch_array($query)) {
                echo '<tr><td>' . $row["nim"] . '</td>' . 
                '<td>' . $row["nama_mhs"] . '</td>' .
                '<td>' . $row["nilai_tugas"] . '</td>' .
                '<td>' . $row["nilai_uts"] . '</td>' .
                '<td>' . $row["nilai_uas"] . '</td>' .
                '<td>' . $row["nilai_ratarata"] . '</td>' . 
                '<td>' . $row["nilai_konversi"] . '</td>';
            }
        ?>
    </table>

    <h2>Masukkan Nilai Baru</h2>
    <form method="POST">
        Nilai Tugas : <input type="number" name="tugas" min="0" max="100"><br>
        Nilai UTS : <input type="number" name="uts" min="0" max="100"><br>
        Nilai UAS : <input type="number" name="uas" min="0" max="100"><br><br>

        <input type="submit" name="input"><br>
    </form>

    <?php
        if (isset($_POST['input'])) {
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

            $sql = "UPDATE `nilaimahasiswa` SET `nilai_uts` = '$uts', `nilai_uas` = '$uas', `nilai_tugas` = '$tugas', `nilai_ratarata` = '$mean', `nilai_konversi` = '$abjad' WHERE `nilaimahasiswa`.`nim` = '$nim'";

            $query = mysqli_query($conn, $sql);
            if(!$query) {
                die ('SQL Error: ' . mysqli_error(($conn)));
        }    
        
        header('location:index.php');

    } ?>
    
</body>
</html>