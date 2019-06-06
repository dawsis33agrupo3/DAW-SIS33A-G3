<!-- Start home section -->
<?php
require_once 'php/conexion.php';

if (isset($_POST["registrar"])) {
  $nombres=$_POST["nombre"];
  $apellidos=$_POST["apelli"];
  $email=$_POST["email"];
  $sexo=$_POST["sexo"];
  $telefono=$_POST["tel"];
  $direccion=$_POST["dir"];
  $usuario=$_POST["usuario"];
  $clave=$_POST["pass"];
  $archivo=$_FILES["fichero"]["name"];


  $sqlc="INSERT INTO usuarios (nombre,apellido,email,sexo,telefono,direccion,usuario,contrasena,foto,idCargo)
      VALUES ('".$nombres."','".$apellidos."','".$email."','".$sexo."','".$telefono."','".$direccion."','".$usuario."','".$clave."','".$archivo."','2')";
  if ($cn->query($sqlc)) {
    move_uploaded_file($_FILES["fichero"]["tmp_name"], "images/fotosUsuarios/". $_FILES["fichero"]["name"]);

?>

<div class="alert bg-success" role="alert" align="center">
  <svg class="glyph stroked checkmark">
    <use xlink:href="#stroked-checkmark"></use>
  </svg><center> Datos ingresados correctamente, ya puedes loguearte</center> <a href="#" class="pull-right">
  <span class="glyphicon glyphicon-remove"></span></a>
</div>

<?php


}else{
?>
<div class="alert bg-danger" role="alert">
  <svg class="glyph stroked cancel">
    <use xlink:href="#stroked-cancel"></use>
  </svg> Error al ingresar datos <?php echo "<br>".$sqlc."<br>".$cn->error; ?> <a href="#" class="pull-right">
    <span class="glyphicon glyphicon-remove"></span></a>
</div>

<?php
}

}
?>




<!--DIV -->

<div class="wrapper fadeInDown">
<div id="formContent">

<!-- Tabs Titles -->
<h2 class="active"> Crear cuenta </h2>


<!-- Icon -->
<div class="fadeIn first">
<img src="images\ico\registrar.svg" width="150" height="150">
</div>

<!-- Login Form -->
<form role="form" action="" method="post" enctype="multipart/form-data">
<input type="text" id="login" class="fadeIn second" name="nombre" placeholder="Nombres" required>

<input type="text" id="login" class="fadeIn second" name="apelli" placeholder="Apellidos" required>

<input type="text" id="login" class="fadeIn second" name="email" placeholder="Email" required>


  <label>Sexo:</label>
  <select class="form-control" name="sexo" id="login" class="fadeIn second">
  <option value="Masculino">Masculino</option>
  <option value="Femenino">Femenino</option>
  </select>



<input type="text" id="login" class="fadeIn second" name="tel" placeholder="Telefono" required>

<input type="text" id="login" class="fadeIn second" name="dir" placeholder="Direccion" required>

<input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario" required>

<input type="password" id="password" class="fadeIn third" name="pass" placeholder="Contraseña" required>

<label>Fotografia</label>
<input type="file" name="fichero" id="login" class="fadeIn second">


<input type="submit" class="fadeIn fourth" value="Registrarme" name="registrar">
</form>

<!-- Remind Passowrd -->
<div id="formFooter">
<a class="underlineHover" href="index.php?pag=logout.php">¿Ya tienes cuenta?</a>
</div>

</div>
</div>
