<?php
$cols=(int)$_POST['cols'];
$rows=(int)$_POST['rows'];
$text= $_POST['text'];
$i=1;
$j=1;
$txt=str_split($text);
$nap='→';
$counter = 0;
$arrayIndex = 0;
do {
    $mass[$i][$j]=$txt[$arrayIndex].$nap;
    $fin=0;
    if (!$fin AND $nap=='→') {
        $i++;
        if ($i>$cols OR isset($mass[$i][$j])) { $i--; $nap='↓'; }
        else $fin=1;
        }
    if (!$fin AND $nap=='↓') {
        $j++;
        if ($j>$rows OR isset($mass[$i][$j])) {$j--; $nap='←'; }
        else $fin=1;
        }
    if (!$fin AND $nap=='←') {
        $i--;
        if ($i<1 OR isset($mass[$i][$j])) { $i++; $nap='↑'; }
        else $fin=1;
        }
    if (!$fin AND $nap=='↑') {
        $j--;
        if ($j<1 OR isset($mass[$i][$j])) { $j++; $nap='→'; }
        else $fin=1;
        }
    if (!$fin AND $nap=='→') {
    $i++;
    if ($i>$cols OR isset($mass[$i][$j])) {$i--;  $nap='↓'; }
     else $fin=1;
    }
    if($arrayIndex == count($txt) - 1) {
        $arrayIndex = 0;
    } else {
        $arrayIndex++;
    }
    $counter++;
}while($counter < $cols*$rows);
 
$table = '<table border="1">';
$table .= '<th style="color:white;background-color:green;">'.' '.'</th>';
for ($td=1; $td<=$cols; $td++){
         $table .= '<th style="color:white;background-color:green;">'. $td.'</th>';
    }
    $table .= '</tr>';

for ($tr=1; $tr<=$rows; $tr++){
    $table .= '<th style="color:white;background-color:green;">'. $tr.'</th>'; 
    for ($td=1; $td<=$cols; $td++){
            $table .= '<td>'.$mass[$td][$tr].'</td>';
    }
    $table .= '</tr>';
}

$table .= '</table>';
echo $table; 
?>