<!-- Start home section -->
<?php
require_once 'php/conexion.php';

if (isset($_POST["registrar"])) {
  $nombres=$_POST["matricula"];
  $apellidos=$_POST["marca"];
  $email=$_POST["modelo"];
  $sexo=$_POST["transmision"];
  $telefono=$_POST["capacidad"];
  $direccion=$_POST["precio"];
  $archivo=$_FILES["fichero"]["name"];


  $sqlc="INSERT INTO catalogo (matricula,marca,modelo,transmision,capacidad,precio,fotoV)
      VALUES ('".$nombres."','".$apellidos."','".$email."','".$sexo."','".$telefono."','".$direccion."','".$archivo."')";
  if ($cn->query($sqlc)) {
    move_uploaded_file($_FILES["fichero"]["tmp_name"], "images/fotoVehiculo/". $_FILES["fichero"]["name"]);

?>

<div class="alert bg-success" role="alert" align="center">
  <svg class="glyph stroked checkmark">
    <use xlink:href="#stroked-checkmark"></use>
  </svg><center> Datos ingresados correctamente</center> <a href="#" class="pull-right">
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
<h2 class="active"> Nuevo Auto </h2>


<!-- Icon -->
<div class="fadeIn first">
<img src="images\ico\autoInsert.svg" width="150" height="150">
</div>

<!-- Login Form -->
<form role="form" action="" method="post" enctype="multipart/form-data">
<input type="text" id="login" class="fadeIn second" name="matricula" placeholder="Matricula" required>

<input type="text" id="login" class="fadeIn second" name="marca" placeholder="Marca" required>

<input type="text" id="login" class="fadeIn second" name="modelo" placeholder="Modelo" required>


  <label>Transmision:</label>
  <select class="form-control" name="transmision" id="login" class="fadeIn second">
  <option value="Masculino">Automatico</option>
  <option value="Femenino">Manual</option>
  </select>



<input type="number" id="login" class="fadeIn second" name="capacidad" placeholder="Capacidad" required>

<input type="number" id="login" class="fadeIn second" name="precio" placeholder="Precio" required>

<label>Fotografia de Auto</label>
<input type="file" name="fichero" id="login" class="fadeIn second">

<br>
<br>
<input type="submit" class="fadeIn fourth" value="Registrar Nuevo Auto" name="registrar">
</form>

<!-- Remind Passowrd -->
<div id="formFooter">
<a class="underlineHover" href="index.php?pag=adminAutos.php">Volver atras</a>
</div>

</div>
</div>
