<?php
$myGetArgs = $_GET;

foreach ($myGetArgs as $x => $x_value) {
    echo  $x . " = " . $x_value;
    echo "<br>";
}
?>