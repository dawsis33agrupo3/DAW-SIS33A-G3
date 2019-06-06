<li class="active"><a href="index.php?pag=home.php">Home</a></li>
<li><a href="index.php?pag=servicios.php">Servicios</a></li>
<li><a href="index.php?pag=catalogo.php">Rentar</a></li>
<li><a href="index.php?pag=nosotros.php">Sobre Nosotros</a></li>
<li><a href="index.php?pag=contacto.php">Contactanos</a></li>




<?php
if (isset($_SESSION["tipo"])) {

    if ($_SESSION["tipo"]=="admin") {
      echo "<li><a href='index.php?pag=admin.php'>Administrar</a>";
      echo "<li><a href='index.php?pag=logout.php'>Cerrar Sesion</a>";



    }elseif ($_SESSION["tipo"]=="usuario") {
      echo "<li><a href='index.php?pag=perfilUsuarios.php'>Perfil</a>";
      echo "<li><a href='index.php?pag=logout.php'>Cerrar Sesion</a>";


    }

  }else {
      echo "<li><a href='index.php?pag=login.php'>Login</a>";
      echo "<li><a href='index.php?pag=registro.php'>Registrate</a>";;


}

 ?>
