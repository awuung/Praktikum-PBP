<?php
    // Nama : Awang Pratama Putra Mulya
    // NIM  : 24060122120039
    
    // FOR-LOOP********************************************
    echo '<br />FOR-LOOP<br />';
    $harga = 1000;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
        </tr>';
        
    for ($i=1;$i<=10;$i++){
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
    }
    echo '</table>';

    // WHILE********************************************
    // TODO WHILE
    echo '<br />WHILE<br />';
    $harga = 1000;
    $i = 1;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
        </tr>';
    while ($i <= 10) {
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        $diskon = $i * 0.1;
        echo '<td>' . ($diskon * 100) . ' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>' . $harga_diskon . '</td>';
        echo '</tr>';
        $i++;
    }
    echo '</table>';

    // WHILE-DO********************************************
    // TODO DO-WHILE
    echo '<br />WHILE-DO<br />';
    $harga = 1000;
    $i = 1;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
        </tr>';
    do {
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        $diskon = $i * 0.1;
        echo '<td>' . ($diskon * 100) . ' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>' . $harga_diskon . '</td>';
        echo '</tr>';
        $i++;
    } while ($i <= 10);
    echo '</table>';
?>