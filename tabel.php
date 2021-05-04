<?php
    include_once 'connect.php';

    echo "<table>";
    echo "<tr>";
        echo "<th>NIM</th>";
        echo "<th>NAMA</th>";
        echo "<th>NILAI TUGAS</th>";
        echo "<th>NILAU UTS</th>";
        echo "<th>NILAU UAS</th>";
        echo "<th>RATA-RATA</th>";
        echo "<th>KONVERSI</th>";
        echo "<th>PILIHAN</th>";
    echo "</tr>";

        $rs = $conn->Execute("select * from nilaimahasiswa");

        if($rs -> RecordCount() > 0){

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
                    <td><a href="hapus.php?detail=<?php echo $rs->fields[0]; ?>" onclick="return confirm('Data akan dihapus, Anda yakin ?')">hapus</a> | <a href="edit.php?detail=<?php echo $rs->fields[0]; ?>">edit</a></td>
                </tr>
            <?php
            $rs->MoveNext();
            }

        }
    
echo "</table>";

?>

