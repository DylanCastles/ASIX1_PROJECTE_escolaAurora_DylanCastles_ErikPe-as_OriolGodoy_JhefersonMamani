<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'aurora');
try {
    $mysqli = mysqli_connect('localhost', 'root', '', 'aurora');
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>