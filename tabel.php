<?php
    include_once 'connect.php';
?>

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
                <td><a href="" onclick="event.preventDefault(); hapus('<?php echo $rs->fields[0]; ?>')">hapus</a> | <a href="" onclick="event.preventDefault(); edit('<?php echo $rs->fields[0]; ?>')">edit</a></td>
            </tr>
        <?php
        $rs->MoveNext();
        }

    }
?>

</table>
