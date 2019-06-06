
        <!-- Start home section -->
        <?php
        require_once 'php/conexion.php';

        if (isset($_POST["entrar"])) {

          //credenciales
        	$usuario=$_POST["usuario"];
        	$clave=$_POST["pass"];

          //validamos que existan
        	$sqlf="SELECT * FROM usuarios
        				WHERE usuario='".$usuario."' AND contrasena='".$clave."'";
        	$res=$cn->query($sqlf);

        	if ($res->num_rows>0) {
        			$usuarioA=$res->fetch_assoc();

              //sesion para guardar el nombre
        			$_SESSION["usuario"]=$usuarioA["nombre"]." ".$usuarioA["apellido"];

              //segunda consulta sacando el nivel de usuario ADMIN O USUARIO
        			$sqlf2="SELECT * FROM cargos WHERE idCargo='".$usuarioA["idCargo"]."'";
        			$res2=$cn->query($sqlf2);
        			$cargo=$res2->fetch_assoc();

        			$_SESSION["tipo"]=$cargo["nivel"];
        			$_SESSION["cod"]=$usuarioA["idUsuario"];
              

        			echo "<script>location.href='index.php';</script>";
        		}else {
              echo "
              <div class='alert alert-danger' role='alert' align='center'>
              CREDENCIALES INVALIDAS
              </div>";
            }

        }

        ?>

<!--DIV -->

    <div class="wrapper fadeInDown">
    <div id="formContent">

      <!-- Tabs Titles -->
      <h2 class="active"> Iniciar Sesion </h2>


      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images\ico\iniciarSesion.svg" width="150" height="150">
      </div>

      <!-- Login Form -->
      <form role="form" action="" method="post">
        <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario" required>
        <input type="password" id="password" class="fadeIn third" name="pass" placeholder="Contraseña" required>
        <input type="submit" class="fadeIn fourth" value="entrar" name="entrar">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="index.php?pag=registro.php">¡Registrate!</a>
      </div>

    </div>
  </div>
