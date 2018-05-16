<?php
$conn = new MySQLi("localhost", "root","", "enfasisiv");
if ($conn -> connect_errno) {
    die( "Fallo la conexión a MySQL: (" . $conn -> mysqli_connect_errno()
        . ") " . $conn -> mysqli_connect_error());
}
?>
