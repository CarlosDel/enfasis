
<?php

session_start();
//   se llama el archivo conexion.php para q se abra la coneccion con la base de datos

require("conexion.php");

$username=$_POST['inputUser'];
$pass=($_POST['inputPasswrd']);


$sql=mysqli_query($conn,"SELECT * FROM usuarios WHERE login='$username'");
if($f=mysqli_fetch_assoc($sql)){



        if ($pass == $f['password']) {
            echo "Cargando...Espere un momento por favor.";
            $_SESSION['idUser'] = $f['idUser'];
            $_SESSION['login'] = $f['login'];
            $_SESSION['password'] = $f['password'];
            $_SESSION['name'] = $f['name'];
            $_SESSION['lastName'] = $f['lastName'];
            $_SESSION['type'] = $f['type'];

            if($f['idUser'] == "admin"){
                header("Location: inicioAdmin.php");
            }
            else{
                header("Location: inicioUsuario.php");
            }



        } else {
            echo '<script>alert("Contraseña incorrecta")</script> ';
            echo "<script>location.href='index.php'</script>";
        }

}else{

    echo '<script>alert("Usuario no existe")</script> ';
    echo "<script>location.href='index.php'</script>";

}
?>
