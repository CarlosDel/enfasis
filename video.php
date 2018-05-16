<!DOCTYPE html>
<?php
session_start();

$idUser =$_SESSION['idUser'];
$idVideo_temp = $_GET['idVideo'];
$idVideoPrincipal = 0;
$namePrincipal = "";
$descripcionPrincipal = "";
$categoriaPrincipal = "";
$urlPrincipal = "";
include("conexion.php");
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
          <a href="inicioUsuario.php" class="navbar-brand"><b>VoD Enfasis 4</b></a>
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
                             <a href="perfil.php" class="btn btn-default btn-flat">Perfil</a>
                         </div>
                  
                         <div class="btn-group" role="group">
                             <a href="cerrarSesion.php" class="btn btn-default btn-flat">Salir</a>
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
if(isset($_POST["estrellas"]))
$valor=$_POST["estrellas"]; 
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
                                    <video src="videos/<?php echo $urlPrincipal;?>.mp4" preload controls poster="videos/marcos/<?php echo $urlPrincipal;?>.jpg" style="width: 838px; height: 500px;">                                          
                                    </video>
                                </div>		
                            </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h1 style="vertical-align: text-top;"><?php echo utf8_encode($namePrincipal); ?></h1>
                                                </div>
                                                <div class="col-md-4">
                                                    <form name="input" action="index.php" method="post">                                                    
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
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <button id="btn_regCalificacion" type="button"
                                                            class="btn bg-primary  margin"
                                                            style="text-align: left;">Enviar
                                                        <i class="fa fa-play"></i>
                                                    </button>
                                                </div>
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
                                    <div class="box-header with-border">
                                       <h4><center>Se Recomienda La Categoria Actual</center></h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <center>

                                         <?php
                                        include ("abrir_conexion.php");

                                        $resultados = mysqli_query($conexion,"SELECT *FROM $tabla_db2  WHERE `categoria`='$categoriaPrincipal' AND `idVideo`!='$idVideoPrincipal'");
                                        
                                        while($consulta = mysqli_fetch_array($resultados))
                                          { 
                                            echo '<div> 
                                            <a href="video.php?idVideo='.$consulta['idVideo'].'" id="btn_play_video_rec1" type="button"
                                                    style="text-align: left;">
                                            '.utf8_encode($consulta['name']).'
                                            <video src="videos/'.$consulta['urlVideo'].'.mp4"  poster="videos/marcos/'.$consulta['urlVideo'].'.jpg" style="width: 300px; height: 210px;">                                          
                                            </video>
                                         
                                            
                                            </a>
                                            </div>
                                            
                                        ';}  
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
    </body>
</html>
