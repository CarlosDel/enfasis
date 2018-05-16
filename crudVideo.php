<?php 
if(empty($_POST['name'])){
     
    
      echo "<script>location.href='actionsvideo.php'</script>";
}else{

  require("conexion.php");
  $name=$_POST['name'];
  $description=$_POST['description'];
  $category=$_POST['category'];

  $sql=mysqli_query($conn,"UPDATE videos SET name='$name',descripcion='$description',categoria='$category' WHERE name='$name'");
  $result = mysqli_fetch_row($sql);
  if($result){
  	      //echo '<script>alert("Actualizacion Exitosa")</script> ';
    }else{
      //echo '<script>alert("Error Durante la Actualizacion")</script> ';
    }
	      echo "<script>location.href='actionsvideo.php'</script>";
  }
?>
