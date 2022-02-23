<?php
if(empty($data))
    echo "Empty output";
else{
    echo '<table style="text-align:center; border-spacing: 20px;">';
    echo '<tr>';
    foreach (array_keys($data[0]) as $value){
        echo '<td>';
        echo $value;
        echo '</td>';
    }
    echo '</tr>';
    foreach ($data as $arr){
        echo '<tr>';
        foreach($arr as $value){
            echo '<td>';
            echo $value;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>
