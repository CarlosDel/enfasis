<?php
	include ("abrir_conexion.php");

	$catego = array("teorico", "practico","ejercicios","biografias", "documentales");
	$salida="";

	if (isset($_POST['consulta'])) {
		$q=$conexion->real_escape_string($_POST['consulta']);
		$resultado=mysqli_query($conexion,"SELECT * FROM $tabla_db2 WHERE name LIKE '%".$q."%' or palabras_clave LIKE '%".$q."%'");

	if ($resultado->num_rows > 0) {
	$salida.='<div class="row">
		                <div class="col-md-1"></div>
		                <div class="col-md-8">';	

		while($consulta = mysqli_fetch_array($resultado))
		{

	$salida.='<div class="media">
		  			<div class="media-left media-middle">
		    			<a href="video.php?idVideo='.$consulta['idVideo'].'" id="btn_play_video_rec1" type="button"
		                                            style="text-align: left;">
		                                    
		                    <video src="videos/'.$consulta['urlVideo'].'.mp4"  poster="videos/marcos/'.$consulta['urlVideo'].'.jpg" style="width: 300px; height: 210px;">		                                   
		                    </video>		                    
		                </a>
		  			</div>
		  			<div class="media-body">
		  			<br>
		    		<h2 class="media-heading"><a href="video.php?idVideo='.$consulta['idVideo'].'" id="btn_play_video_rec1" type="button"
		                                            style="text-align: left;">'.utf8_encode($consulta['name']).'</a></h2>
		            <p><h4>
		            '.utf8_encode($consulta['descripcion']).'
		            </h4></p>                                
		  			</div>
			  </div><br>';
		 }
     $salida.='</div>
		      <div class="col-md-3"></div>
		    </div>';

				} 
				else
				{
				$salida.="No hay dato";
				}
				
				echo $salida;
				$conexion->close();	


		} else { 

			$salida.='<div class="row">
		                <div class="col-md-1"></div>
		                <div class="col-md-10">
		                    <div class="box">

		                        <div class="box-header with-border">
		                            <h3 class="box-title">VIDEOS MEJOR CALIFICADOS</h3>

		                            <div class="box-tools pull-right">
		                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
		                                        class="fa fa-minus"></i>
		                                </button>
		                            </div>
		                        </div>
		                        <div class="box-body">
		                            <div class="row">
		                                ';                               
		                                include ("abrir_conexion.php");

		                                $resultados = mysqli_query($conexion,"SELECT *FROM $tabla_db2  ORDER BY `calificacion` DESC LIMIT 4");
		                                
		                                while($consulta = mysqli_fetch_array($resultados))
		                                  { 
		                                    $salida.='<div class="col-md-3" >
		                                    <a href="video.php?idVideo='.$consulta['idVideo'].'" id="btn_play_video_rec1" type="button"
		                                            style="text-align: left;">
		                                    
		                                    <video src="videos/'.$consulta['urlVideo'].'.mp4"  poster="videos/marcos/'.$consulta['urlVideo'].'.jpg" style="width: 300px; height: 210px;">		                                   
		                                    </video>
		                                 
		                                    '.utf8_encode($consulta['name']).'
		                                    </a>

		                                    </div>
		                                    
		                                ';}  
		                                 include("cerrar_conexion.php");                                                           
		                           
		                      $salida.='</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-1"></div>
		            </div>';

		  foreach ($catego as $valorcat) {
		  
		  $categoria = strtoupper($valorcat); 		
          $salida.='<div class="row">
		                <div class="col-md-1"></div>
		                <div class="col-md-10">
		                    <div class="box">
		                        <div class="box-header with-border">
		                            <h3 class="box-title">VIDEOS MEJOR '.$categoria.'</h3>

		                            <div class="box-tools pull-right">
		                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
		                                        class="fa fa-minus"></i>
		                                </button>
		                            </div>
		                        </div>
		                        <div class="box-body">
		                            <div class="row">
		                                ';                               
		                                include ("abrir_conexion.php");

		                                $resultados = mysqli_query($conexion,"SELECT *FROM $tabla_db2  WHERE `categoria`='$valorcat' ORDER BY `calificacion` DESC LIMIT 4");
		                                
		                                while($consulta = mysqli_fetch_array($resultados))
		                                  { 
		                                    $salida.='<div class="col-md-3" >
		                                    <a href="video.php?idVideo='.$consulta['idVideo'].'" id="btn_play_video_rec1" type="button"
		                                            style="text-align: left;">
		                                    
		                                    <video src="videos/'.$consulta['urlVideo'].'.mp4"  poster="videos/marcos/'.$consulta['urlVideo'].'.jpg" style="width: 300px; height: 210px;">		                                   
		                                    </video>
		                                 
		                                    '.utf8_encode($consulta['name']).'
		                                    </a>

		                                    </div>
		                                    
		                                ';}  
		                                 include("cerrar_conexion.php"); 

		                                                          
		                           
		                      $salida.='</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-1"></div>
		            </div>';
         }	
         echo $salida;
         	
}
    ?>
