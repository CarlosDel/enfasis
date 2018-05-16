<!DOCTYPE html>
<?php
session_start();

?>

<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>VoD Enfasis 4| Home</title>

    <script type="text/javascript" src="js/loader.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="inicioUsuario.js"></script>
    <script src="buscar_videos.js"></script>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">



    <!------------------------------------- BARRA -------------------------------------->

    <header class="main-header">
    <nav class="navbar navbar-static-top ">
      <div class="container">
        <div class="navbar-header">
          <a href="inicioUsuario.php" class="navbar-brand"><b>VoD Enfasis</b></a>
        </div> 
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav" >
             <li><?php  echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";?></li>
          </ul>  

        </div>  
          <section>   
          <form class="navbar-form navbar-left" role="search">            
          <div class="form-group has-feedback" class="navbar-form navbar-left">
            <input type="text" class="form-control"  size="70" name="busquedas" id="busquedas" placeholder="Buscar">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
          </form> 
          </section>

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
                    <?php 
                    if ($_SESSION['type']=="admin"){
                    ?>
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                         <div class="btn-group" role="group">
                             <a href="crudUser.php" class="btn btn-default btn-flat">Editar Usuario</a>
                         </div>
                  
                         <div class="btn-group" role="group">
                             <a href="cerrarSesion.php" class="btn btn-default btn-flat">Editar Video</a>
                         </div>
                    </div>
                    <?php }
                    ?>
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
  <br>
  
    <section id="tabla_resultado">
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
    </section>  

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Universidad del Cauca &copy; Semestre I - 2018 <a href="https://adminlte.io">Enfasis 4</a>.</strong>
        Telematica.
    </footer>
    <div class="control-sidebar-bg"></div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="dist/js/pages/dashboard2.js"></script>
-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
