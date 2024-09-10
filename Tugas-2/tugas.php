<?php
    // Nama : Aniqah Nursabrina
    // NIM  : 24060122120036

    function hitung_rata($array) {
        $average = 0;
        for ($i=0;$i<3;$i++){
            $average += $array[$i];
        }
        return $average/3;
    }

    function print_mhs($array_mhs) {
        echo '<table border="1">';
        echo '<tr>
            <td>Nama</td>
            <td>Nilai 1</td>
            <td>Nilai 2</td>
            <td>Nilai 3</td>
            <td>Rata2</td>
        </tr>';
        
        foreach ($array_mhs as $name => $scores) {
            echo '<tr>';
            echo '<td>' . $name. '</td>';
            echo '<td>' . $scores[0] . '</td>';
            echo '<td>' . $scores[1] . '</td>';
            echo '<td>' . $scores[2] . '</td>';
            echo '<td>' . hitung_rata($scores) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    }

    $array_mhs = [
        'Abdul' => [89, 90, 54],
        'Budi' => [98, 65, 74],
        'Nina' => [67, 56, 84],
    ];

    print_mhs($array_mhs);

?>
