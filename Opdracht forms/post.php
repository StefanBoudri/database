<?php
$myPostArgs = $_POST;

foreach ($myPostArgs as $x => $x_value) {
    echo  $x . " = " . $x_value;
    echo "<br>";
}
?>