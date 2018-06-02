<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["autenticado"] != "SI"){
            echo '<script>alert("No ah ingresado al sistema, por favor ingrese sus datos")</script> ';
            echo "<script>location.href='index.php'</script>";}
            

$idUser =$_SESSION['idUser'];
$idVideo_temp = $_GET['idVideo'];
$idVideoPrincipal = 0;
$namePrincipal = "";
$descripcionPrincipal = "";
$categoriaPrincipal = "";
$urlPrincipal = "";
include("conexion.php");
include ("abrir_conexion.php");
$A1_video1 = mysqli_query($conn, "SELECT * FROM videos WHERE idVideo='$idVideo_temp'");
if ($dataVideo1 = mysqli_fetch_assoc($A1_video1)) {
    $idVideoPrincipal = $dataVideo1['idVideo'];
    $namePrincipal = $dataVideo1['name'];
    $descripcionPrincipal = $dataVideo1['descripcion'];
    $categoriaPrincipal = $dataVideo1['categoria'];
    $urlPrincipal = $dataVideo1['urlVideo'];
}
?>
<html>
    <head>
        <title>VoD | <?php echo utf8_encode($namePrincipal); ?></title>
        <?php $idVideoPHP = $idVideoPrincipal; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
        <link rel="stylesheet" type="text/css" href="dist/css/barraVideo.css">
        <script type="text/javascript" src="dist/js/controlesVideo.js"></script>
        <script type="text/javascript" src="./lib_Aff/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="./lib_Aff/bootstrap.min.js"></script>	
        <script type="text/javascript" src="js/3.2/affdex.js"></script>
      
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript">
            var idVideoJS ="<?php echo $idVideoPHP; ?>";
            var idUserJS ="<?php echo $_SESSION['idUser']; ?>";
            var catVideoJS ="<?php echo $categoriaPrincipal; ?>";
        </script>
       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  
        <script>
        $(document).ready(function(){                   
            $("#enviar").click(function(){
                var formulario = $("#frminformacion").serializeArray();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "guardar.php",
                    data: formulario,
                }).done(function(respuesta){
                    $("#mensaje").html(respuesta.mensaje);
                    limpiarformulario("#frminformacion");
                });
            });
            

        });
        </script>
        <style>
            input[type = "radio"]{ display:none;/*position: absolute;top: -1000em;*/}
            label{ color:grey;}

            .clasificacion{
                direction: rtl;
                unicode-bidi: bidi-override;
            }

            label:hover,
            label:hover ~ label{color:orange;}
            input[type = "radio"]:checked ~ label{color:orange;}
        </style> 
    </head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a onclick="onSiguiente()" href="inicioUsuario.php" class="navbar-brand"><b>VoD Enfasis 4</b></a>
        </div> 
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav" >
             <li><?php  echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";?></li>
          </ul>        
          </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="dist/img/avatar6.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="dist/img/avatar6.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['name'];  echo "&nbsp&nbsp".$_SESSION['lastName'];?>
                    <small><?php echo $_SESSION['type'];?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                         <div class="btn-group" role="group">
                             <a  onclick="onSiguiente()" href="perfil.php" class="btn btn-default btn-flat">Perfil</a>
                         </div>
                  
                         <div class="btn-group" role="group">
                             <a  onclick="onSiguiente()" href="cerrarSesion.php" class="btn btn-default btn-flat">Salir</a>
                         </div>
                    </div>
                </li>

              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
 <?php
$valor=0;
$resultadose = mysqli_query($conexion,"SELECT *FROM $tabla_db4  WHERE `idUser`='$idUser' AND `idVideo`='$idVideoPrincipal'");
$row1 = $resultadose->fetch_array(MYSQLI_NUM);
$numero_filas = $resultadose->num_rows;
if ($numero_filas > 0)
  {
    $valor=$row1[4];
  }

?>

   <div class="content-wrapper">
    <div class="row"><div class="col-md-1"></div>
    <div class="col-md-10">
    <section class="content-header">
      <h1>        
           <?php  echo "&nbsp";?> Video en Reproducción 
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicioUsuario.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Video</li>
      </ol>
    </section>
    <div class="col-md-1"></div>
    </div>
    </div>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <!------------Video Principal ---------------------------->
                        <div class="col-md-1"> </div>
                         <div class="col-md-7">
                            <div>
                                <!--div class="camara" id="affdex_elements">
                                    <script type="text/javascript" src="./lib_Aff/adapter-1.4.0.js"></script>
                                </div-->
                                <div align="center">
                                    <!--
                                        <video  id="affdex_elements" 
                                        src="videos/<?php echo $urlPrincipal;?>.mp4" preload  
                                        poster="videos/marcos/<?php echo $urlPrincipal;?>.jpg" 
                                        style="width: 838px; height: 500px;">                                          
                                    </video>
                                    <button id="start" onclick="onStart()" >Start</button>
                                    <button id="stop" onclick="onStop()">Stop</button>
                                    <button id="reset" onclick="onSiguiente()">Siguiente</button>  
                                     -->
                                    <div id="video_player_box">
                                       <video  id="affdex_elements" 
                                            src="videos/<?php echo $urlPrincipal;?>.mp4" preload  
                                            poster="videos/marcos/<?php echo $urlPrincipal;?>.jpg" 
                                            style="width: 838px; height: 500px;">                                          
                                        </video>
                                        <div id="video_controls_bar">
                                            <div class="row">
                                            <div class="col-md-1">
                                            <button id="playpausebtn" onclick="onStart()" ></button>
                                            </div>
                                             <div class="col-md-4">
                                            <input id="seekslider" type="range" min="0" max="100" value="0" step="1">
                                            </div>
                                             <div class="col-md-3">
                                            <span id="curtimetext">00:00</span> / <span id="durtimetext">00:00</span>
                                            </div>
                                             <div class="col-md-1">
                                            <button id="mutebtn"></button>
                                            </div>
                                             <div class="col-md-2">
                                            <input id="volumeslider" type="range" min="0" max="100" value="100" step="1">
                                            </div>
                                             <div class="col-md-1">
                                            <button id="fullscreenbtn"></button>
                                            </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>		
                            </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h1 style="vertical-align: text-top;"><?php echo utf8_encode($namePrincipal); ?></h1>
                                                </div>
                                                <div class="col-md-4">
                                                <form id="frminformacion" name="frminformacion">                                                    
                                                        <p class="clasificacion">
                                                        <input id="radio1" type="radio" name="estrellas" value="5" <?php if($valor==5) echo "checked";?>>
                                                        <label for="radio1"><font size="20">&#9733;</font></label>
                                                        <input id="radio2" type="radio" name="estrellas" value="4" <?php if($valor==4) echo "checked";?>>
                                                        <label for="radio2"><font size="20">&#9733;</font></label>
                                                        <input id="radio3" type="radio" name="estrellas" value="3" <?php if($valor==3) echo "checked";?>>
                                                        <label for="radio3"><font size="20">&#9733;</font></label>
                                                        <input id="radio4" type="radio" name="estrellas" value="2" <?php if($valor==2) echo "checked";?>>
                                                        <label for="radio4"><font size="20">&#9733;</font></label>
                                                        <input id="radio5" type="radio" name="estrellas" value="1" <?php if($valor==1) echo "checked";?>>
                                                        <label for="radio5"><font size="20">&#9733;</font></label>
                                                        </p> 

                                               
                                                </div>
                                                <div class="col-md-2">
                                                        <input type=hidden value="<?php echo $idUser;?>" name="iduser">
                                                        <br>
                                                        <input type=hidden value="<?php echo $idVideoPrincipal;?>" name="idvideo">
                                                        <input type=hidden value="<?php echo $categoriaPrincipal;?>" name="categoriav">
                                                        <input type="button" id="enviar" value="Enviar" name="enviar" />
                                                </div> </form>
                                            </div>
                                        
                                        <i class="fa fa-text-width"></i>
                                        <h3 class="box-title">Descripción</h3>
                                    </div>
                                    <div class="box-body">
                                        <dl>
                                            <dd><?php echo utf8_encode($descripcionPrincipal); ?></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                                                        <div class="col-md-3">           
                                <div class="box box-default">
                                    
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <center>

                                         <?php
                                         include ("abrir_conexion.php");
                                         include('sistemaR.php');
                                         $answer = mainRecomendation($idUser,$idVideoPrincipal);
                                         foreach ($answer as $clave => $valor) {
                                                $resultados = mysqli_query($conexion,"SELECT *FROM $tabla_db2  WHERE `idVideo`='$valor'");
                                              
                                                 while($consulta = mysqli_fetch_array($resultados))
                                                  { 
                                                    echo '<div> 
                                                    <a onclick="onSiguiente()" href="video.php?idVideo='.$consulta['idVideo'].'" id="btn_play_video_rec1" type="button"
                                                            style="text-align: left;">
                                                    '.utf8_encode($consulta['name']).'
                                                    <video src="videos/'.$consulta['urlVideo'].'.mp4"  poster="videos/marcos/'.$consulta['urlVideo'].'.jpg" style="width: 300px; height: 210px;">                                          
                                                    </video>
                                                 
                                                    
                                                    </a>
                                                    </div>
                                                    
                                                ';} 
                                         }
                                     
                                        $resultados = mysqli_query($conexion,"SELECT *FROM $tabla_db2  WHERE `categoria`='$categoriaPrincipal' AND `idVideo`!='$idVideoPrincipal'");
                                        
                                        while($consulta = mysqli_fetch_array($resultados))
                                          { 
                                            $esta=0;
                                            foreach ($answer as $clave => $valor) {
                                                if($consulta['idVideo']==$valor)
                                                    $esta=1;
                                            }   
                                            if($esta==0){    
                                            echo '<div> 
                                            <a onclick="onSiguiente()" href="video.php?idVideo='.$consulta['idVideo'].'" id="btn_play_video_rec1" type="button"
                                                    style="text-align: left;">
                                            '.utf8_encode($consulta['name']).'
                                            <video src="videos/'.$consulta['urlVideo'].'.mp4"  poster="videos/marcos/'.$consulta['urlVideo'].'.jpg" style="width: 300px; height: 210px;">                                          
                                            </video>
                                         
                                            
                                            </a>
                                            </div>
                                            
                                        ';}}  
                                         include("cerrar_conexion.php"); ?>
                                        </center>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!------------Fin Videos recomendados---------------------------->

                        </div>
                    </div>
                    <!-- Default box -->


                    <!-- /.box-body -->

                    <!-- /.box-footer-->
            </div>
            <!-- /.box -->

            </section>
            <!-- /.content -->


            <!----------------------------------  FIN COLUMNA  ---------------------------------->


        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Universidad del Cauca &copy; Semestre I - 2018 <a href="">Enfasis 4</a>.</strong>
            Telematica.
        </footer>


        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
        <script src="dist/js/demo.js"></script>
        <script>
            $(document).ready(function () {
                $('.sidebar-menu').tree()
            })
        </script>



        <!-- si se quiere ver los valores muestreados en tiempo real
            Descomentar
                <strong>DATOS EN TIEMPO REAL</strong>
                <div id="results" style="word-wrap:break-word;"></div>             
                <strong>DETECCIÓN DE ACCIONES</strong>
                <div id="logs"></div> --> 
                <section id="contenedor" ></section> 
          
        
    </body>
    
<script type="text/javascript" src="js/reconocimiento4.js"></script>
<script type="text/javascript" src="js/load.js"></script>

</html>
