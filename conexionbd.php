<?php

function conectar() {
    $conexion = new mysqli('localhost','root','', 'enfasisiv');
    if (mysqli_connect_errno($conexion)) {
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
    }
    $conexion->character_set_name();
    if (!$conexion->set_charset('utf8')) {
        echo nl2br("\nError cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
        exit;
    }
    return $conexion;
}
/*
create table calificaciones(
	idUsuario  Varchar(20),
    idVideo Varchar(20),
    calificacion float(5),
    PRIMARY KEY (idUsuario,idVideo)
)
*/
?>
