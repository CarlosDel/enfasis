<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "localhost";    // sera el valor de nuestra BD 
	$basededatos = "enfasisiv";    // sera el valor de nuestra BD 
	$usuariodb = "root";    // sera el valor de nuestra BD 
	$clavedb = "";    // sera el valor de nuestra BD 

	//Lista de Tablas
	$tabla_db1 = "usuarios"; 	   // tabla de datos
	$tabla_db2 = "videos"; 	   // tabla de usuarios	
	$tabla_db3 = "emociones"; 	   // tabla de parametros	
	$tabla_db4 = "calificaciones"; 	   // tabla de parametros	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>
