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
  <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
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
                <span class="hidden-xs"><?php session_start(); echo $_SESSION['name']; ?></span>
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
                             <a href="credVideo.php" class="btn btn-default btn-flat">Editar Video</a>
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


  <!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
          <?php          
           if (!(isset($_POST["enviado"])) and !(isset($_POST["listarusers"])) )
               {
          ?>
          <form action="actions.php" method=POST>
                  <table align=center width=670 border=0 bgcolor="#009ED6">
                            <tr>
                                       <td width="25%" height="20%" align="center" colspan=2 bgcolor="#DEEEF5" class="_espacio_celdas" style="color: #044062; 
			font-weight: bold">
                     			FORMULARIO CREACI&Oacute;N DE USUARIO
                                            </td>
                		     </tr>
          
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; 
			font-weight: bold">
         			Name
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          		<input type=text value="" name="name" required>						   
		       </td>
          </tr>  
         <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; 
			font-weight: bold">
         			LastName
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          		<input type=text value="" name="lastname" required>						   
		       </td>
          </tr>
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; 
			font-weight: bold">
         			Login
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          		<input type=text value="" name="login" required>						   
		       </td>
          </tr>
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; 
			font-weight: bold">
         			Password
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          		<input type=text value="" name="password" required>						   
		       </td>
          </tr>
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; 
			font-weight: bold">
         			Type
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas_m">
          		Admin <input type="radio" name="type" value="admin">
			        User <input type="radio" name="type" value="user" checked>						   
		       </td>
          </tr>  
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas" style="color: #044062; 
			font-weight: bold">
         			&nbsp;&nbsp;&nbsp;
           </td>
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          		<input type=hidden value="1" name="enviado">
              <input type=submit value="ENVIAR" name="ENVIAR">
		       </td>    
               </table>
            </form>
            <div align="center">
            <form action="actions.php" method="POST">
           <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          		<input type=hidden value="ok" name="listarusers">
              <input type=submit value="LISTAR USUARIOS" name="LISTAR">
		       </td>    
            </form>    
               </div>                    
      <?php
          }
        elseif(!(isset($_POST["listarusers"])) )
          {
              
            $enviado = $_POST["enviado"];
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $login = $_POST["login"];
            $password = $_POST["password"];
            $type = $_POST["type"];          
            if ($enviado == 1)
             {
                 include("conexion.php");
                 $sql = mysqli_query($conn,"INSERT INTO usuarios(login, password, name, lastName, type) VALUES ('$login','$password','$name','$lastname','$type')");
                 $result1=mysqli_fetch_assoc($sql);
            //$result1 = $mysqli->query($sql);
            if($result1){
                echo '<script>alert("Ok")</script>';
                header("Location: actions.php");
            }else{
                echo '<script>alert("Error")</script>';
                header("Location: actions.php");
            }         
               }
	         }else{
                    echo '
                    <form action="actions.php" method="POST">
                    <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
                        <input type=submit value="REGRESAR" name="Regresar">
                    </td>
                    </form>';
                    include("conexion.php");
                    $sql= mysqli_query($conn,"SELECT * FROM usuarios");
                  
                                echo "<table border = '1'> \n";
                                echo "<tr><td><b>Login</b> </td><td><b> Name <b></td><td><b> LastName<b> </td><td><b> Type</b></td><td>Acciones</td></tr> \n";
                            	while ($f1 = mysqli_fetch_row($sql)){ 
                                      echo "<tr><td><b>   $f1[1]    </b></td><td><b>   $f1[3]  </b></td><td><b>   $f1[4] </td><td><b>  $f1[5]</b></td><td><b><a href=edit.php?l=$f1[1]>Editar</a></b></td></tr> \n";
	                                  }
                          echo "</table> \n"; 
             }
        ?>
        </div>
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
