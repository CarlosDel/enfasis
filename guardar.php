<?php
	
if(isset($_POST["estrellas"]))
{

	$cali = $_POST["estrellas"];
	$user = $_POST["iduser"];
	$video = $_POST["idvideo"];
	$catego = $_POST["categoriav"];
	
		
	include ("abrir_conexion.php");
    $resultados = mysqli_query($conexion,"SELECT *FROM $tabla_db4  WHERE `idUser`='$user' AND `idVideo`='$video'");
    $numero_filas = $resultados->num_rows;
    if ($numero_filas > 0)
    {
    $resultado = $conexion->query("UPDATE $tabla_db4  SET `calificacion`='$cali' WHERE `idUser`='$user' AND `idVideo`='$video'"); 
                                
    }else{
     $resultado = $conexion->query("INSERT INTO $tabla_db4 (idUser,idVideo,categoria,calificacion) VALUES ('$user','$video','$catego','$cali')"); 
    }	
}

?>
