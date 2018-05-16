<?php 
if(empty($_POST['login'])){
      
    
      echo "<script>location.href='actions.php'</script>";
}else{

  require("conexion.php");
  $login=$_POST['login'];
  $password=$_POST['password'];
  $name=$_POST['name'];
  $lastname=$_POST['lastname'];
  $type=$_POST['type'];

  $sql=mysqli_query($conn,"UPDATE usuarios SET login='$login',password='$password',name='$name',lastname='$lastname',type='$type' WHERE login='$login'");
  $result = mysqli_fetch_row($sql);
  if($result){
  	      //echo '<script>alert("Actualizacion Exitosa")</script> ';
    }else{
      //echo '<script>alert("Error Durante la Actualizacion")</script> ';
    }
	      echo "<script>location.href='actions.php'</script>";
  }
?>
