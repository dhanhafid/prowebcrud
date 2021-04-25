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

            $query = mysqli_query($conn, $sql);
            if(!$query) {
                die ('SQL Error: ' . mysqli_error(($conn)));
            }     
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
            $sql = 'SELECT * FROM `nilaimahasiswa`';

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
                '<td>' . $row["nilai_konversi"] . '</td>';?>
                <td><a href="hapus.php?detail=<?php echo $row['nim']; ?>">hapus</a> | <a href="edit.php?detail=<?php echo $row['nim']; ?>">edit</a></td>
                </tr>
            <?php
            }

            mysqli_free_result($query);
            mysqli_close($conn);
        ?>
        
    </table>

</body>
</html>