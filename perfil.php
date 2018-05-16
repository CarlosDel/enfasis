<!DOCTYPE html>
<!DOCTYPE html>
<?php
session_start();

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vod Enfasis | Perfil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">




<!------------------------------------- BARRA -------------------------------------->

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="inicioUsuario.php" class="navbar-brand"><b>VoD Enfasis 4</b></a>
        </div> 
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav" >
             <li><?php  echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";?></li>
  
          
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
                 
                  <!-- /.row -->
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


  <!-- Content Wrapper. Contains page content -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row"><div class="col-md-1"></div>
    <div class="col-md-10">
    <section class="content-header">
      <h1>
        Informacion De Usuario
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicioUsuario.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>
    <div class="col-md-1"></div>
    </div>
    </div>
    <!-- Main content -->
    <section class="content">

      <div class="row"><div class="col-md-1"></div>
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/avatar6.png" alt="User profile picture">

              <h2 class="profile-username text-center"><?php echo $_SESSION['name'];  echo "&nbsp&nbsp".$_SESSION['lastName'];?></h3>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sobre Mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>

              <p class="text-muted">
                Ingeniería en electrónica y telecomunicaciones en la Universidad Del Cauca
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>

              <p class="text-muted">Popayan, Cauca</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Intereses</strong>

              <p>
                <span class="label label-danger">HTML</span>
                <span class="label label-success">Medios</span>
                <span class="label label-info">Circuitos</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Calculo</span>
              </p>

                    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-7">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Modificar Datos</a></li>
              <li><a href="#favoritos" data-toggle="tab">Favoritos</a></li>
            </ul>
            <div class="tab-content">

             <div class="active tab-pane" id="settings">
                <form class="form-horizontal" method="POST" action="#">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nombremod" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Apellido</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="apellidomod" placeholder="Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="inputName" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Modificar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="favoritos">
                
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        <div class="col-md-1"></div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
