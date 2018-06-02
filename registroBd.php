<?php

$us=  $_REQUEST['var'];
require_once ('conexionbd.php');
$conexion = conectar(); 
$cadena= implode(";", $us);
$porciones = explode(";", $cadena);
$idUser=$porciones[0];
$idVideo=$porciones[1];
$categoria=$porciones[2];
$cal = $porciones[3];
$sql = "INSERT INTO emociones(idUser,idVideo,categoria,emocion)
VALUES ('$idUser','$idVideo','$categoria','$cal')";
if (mysqli_query($conexion,$sql)) {
echo "Registro Exitoso"; 
} 
else {
echo "Registro Fallido"; 
}

mysqli_close($conexion);
      
        
/*
$sql="UPDATE calificaciones  SET calificacion = '$cal' WHERE idUsuario = '$id' and  idVideo= '$idVideo';";
if (mysqli_query($conexion,$sql)) {
  echo "ACTUALILZACION EXITOSA"; 
  } 
else {
  echo "NO ACTUALIZADO--- NO EXISTE"; 
  $sql2 = "INSERT INTO calificaciones (idUsuario,idVideo,calificacion)
  VALUES ('$id','$idVideo','$cal')";
  if (mysqli_query($conexion,$sql2)) {
    echo "Registro Exitoso"; 
    } 
  else {
    echo "Registro Fallido"; 
  }
  
}
mysqli_close($conexion);
*/
              

?>
