<?php
require_once 'php/conexion.php';

 ?>
                      <!--EDITANDO -->

            <div class="wrapper fadeInDown">
                <div id="formContent" >
                <form method="post" action="">


            <!-- Tabs Titles -->
            <h2 class="active">Editar Usuario</h2>


            <!-- Icon -->


            <?php
            //editando Usuarios
            if (isset($_POST["regresar"])) {
              
              if ($_SESSION["tipo"]=="admin") {
                echo "<script>location.href='index.php?pag=admin.php';</script>";
              }else {
              echo "<script>location.href='index.php?pag=perfilUsuarios.php';</script>";
              }


            }

              if (isset($_POST["modificar"])) {
              $newnombre=$_POST["nom"];
              $newsApellido=$_POST["ape"];
              $newSexo=$_POST["sex"];
              $newUsuario=$_POST["usuarioEdi"];
              $idm=$_POST["cod"];

              $sqlu="UPDATE usuarios
              SET nombre='".$newnombre."', apellido='".$newsApellido."', sexo='".$newSexo."', usuario='".$newUsuario."'
              WHERE idUsuario='".$idm."'";

              if ($cn->query($sqlu)) {


               $_SESSION["usuario"]=$newnombre." ".$newsApellido;

                ?>
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark">
                    <use xlink:href="#stroked-checkmark"></use>
                  </svg> Dato modificados correctamente <a href="#" class="pull-right">
                  <span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <br>
                <br>
                <?php
              }else{
                ?>
                <div class="alert bg-danger" role="alert">
                  <svg class="glyph stroked cancel">
                    <use xlink:href="#stroked-cancel"></use>
                  </svg> Error al modificar el dato <?php echo "<br>".$sqlu."<br>".$cn->error; ?>
                  <a href="#" class="pull-right">
                    <span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <?php
              }
            }

              $id=$_GET["codm"];

              $sqlcg="SELECT * FROM usuarios WHERE idUsuario='".$id."'";
              $res=$cn->query($sqlcg);
              if ($res->num_rows>0) {
                $usuarioEdi=$res->fetch_assoc();
                ?>


            <div class="form-group">


            		<label>Nombre</label>
            		<input type="text" class="form-control" value="<?php echo $usuarioEdi["nombre"]; ?>" name="nom" required>
            </div>

            <div class="form-group">
            		<label>Apellido</label>
            		<input type="text" value="<?php echo $usuarioEdi["apellido"]; ?>" class="form-control" name="ape" required>
            </div>

            <div class="form-group">
                <label>Sexo:</label>
                <select class="form-control" name="sex" class="fadeIn second" value="<?php echo $usuarioEdi["sexo"]; ?>">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
            </div>


            <div class="form-group">
                <label>Usuario</label>
                <input type="text" value="<?php echo $usuarioEdi["usuario"]; ?>" class="form-control" name="usuarioEdi" required>
            </div>

            <input type="hidden" name="cod" value="<?php echo $id; ?>">
        <button type="submit" name="modificar" class="btn btn-primary">Modificar Datos</button>
          <button type="submit" name="regresar" class="btn btn-primary" >Regresar</button>



        <?php
        }else{
          echo $sqlcg." ".$cn->error;
        }

         ?>


</div>

          </form>
        </div>
