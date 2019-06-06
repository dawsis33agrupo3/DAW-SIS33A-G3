<?php
require_once 'php/conexion.php';

 ?>
                      <!--EDITANDO -->

            <div class="wrapper fadeInDown">
                <div id="formContent" >
                <form method="post" action="" enctype="multipart/form-data">


            <!-- Tabs Titles -->
            <h2 class="active">Editar Auto</h2>


            <!-- Icon -->


            <?php
            //editando Usuarios
            if (isset($_POST["regresar"])) {
            echo "<script>location.href='index.php?pag=adminAutos.php';</script>";
            }

              if (isset($_POST["modificar"])) {
              $newMatricula=$_POST["matricula"];
              $newsMarca=$_POST["marca"];
              $newModelo=$_POST["modelo"];
              $newTransmision=$_POST["transmision"];
              $newCapacidad=$_POST["capacidad"];
              $newPrecio=$_POST["precio"];
              $archivo=$_FILES["fichero"]["name"];

              $idm=$_POST["cod"];

              $sqlu="UPDATE catalogo
              SET matricula='".$newMatricula."', marca='".$newsMarca."', modelo='".$newModelo."', transmision='".$newTransmision."', capacidad='".$newCapacidad."', precio='".$newPrecio."', fotoV='".$archivo."'
              WHERE idVehiculo='".$idm."'";


              if ($cn->query($sqlu)) {

                  move_uploaded_file($_FILES["fichero"]["tmp_name"], "images/fotoVehiculo/". $_FILES["fichero"]["name"]);


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

              $sqlcg="SELECT * FROM catalogo WHERE idVehiculo='".$id."'";
              $res=$cn->query($sqlcg);
              if ($res->num_rows>0) {
                $usuarioEdi=$res->fetch_assoc();
                ?>


            <div class="form-group">

            		<label>Matricula</label>
            		<input type="text" class="form-control" value="<?php echo $usuarioEdi["matricula"]; ?>" name="matricula" required>
            </div>

            <div class="form-group">
            		<label>Marca</label>
            		<input type="text" value="<?php echo $usuarioEdi["marca"]; ?>" class="form-control" name="marca" required>
            </div>

            <div class="form-group">
            		<label>Modelo</label>
            		<input type="text" value="<?php echo $usuarioEdi["modelo"]; ?>" class="form-control" name="modelo" required>
            </div>

            <div class="form-group">
                <label>Transmision:</label>
                <select class="form-control" name="transmision" class="fadeIn second" value="<?php echo $usuarioEdi["transmision"]; ?>">
                <option value="Automatico">Automatico</option>
                <option value="Manual">Manual</option>
                </select>
            </div>


            <div class="form-group">
                <label>Capacidad</label>
                <input type="text" value="<?php echo $usuarioEdi["capacidad"]; ?>" class="form-control" name="capacidad" required>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="number" value="<?php echo $usuarioEdi["precio"]; ?>" class="form-control" name="precio" required>
            </div>



            <div class="form-group">
                <label>Foto Actual</label>
                <?php echo "<img src='images/fotoVehiculo/".$usuarioEdi["fotoV"]."' width=160 height=250 >"; ?><br>
                <br>
                <br>
                <input type="file" value="<?php echo $usuarioEdi["fotoV"]; ?>" class="form-control" name="fichero" >
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
