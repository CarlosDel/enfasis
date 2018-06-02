<?php

$us=  $_REQUEST['var'];
require_once ('conexionbd.php');
$conexion = conectar(); 
$cadena= implode(";", $us);
$porciones = explode(";", $cadena);
$id=$porciones[0];
$idVideo=$porciones[1];
$cal = $porciones[2];
$idUser=1000;
$categoria=1000;


$sql= "SELECT * FROM emociones  WHERE idEmocion= '$id' ;";
        
        
        
        if ($result = mysqli_query($conexion,$sql)) {  
                echo "conexion exitosa"; 
                $consulta = mysqli_fetch_array($result);
                if($consulta!=null){
                  echo"---si existe----";
                  $sql3="UPDATE emociones  SET emocion = '$cal' WHERE idEmocion= '$id';";
                  if (mysqli_query($conexion,$sql3)) {
                    echo "ACTUALILZACION EXITOSA"; 
                    }else{
                      echo"ACTUALIZACION FALLIDA";
                    }

                }else{
                  echo"----no existe-----";
                  $sql2 = "INSERT INTO emociones (idEmocion,idUser,idVideo,categoria,emocion)
                  VALUES ('$id','$idUser','$idVideo','$categoria','$cal')";
                  if (mysqli_query($conexion,$sql2)) {
                    echo "Registro Exitoso"; 
                    } 
                  else {
                    echo "Registro Fallido"; 
                  }
                }

                
                                   
                              
        } else{
        
            echo "NO se econtraron resultados";
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
