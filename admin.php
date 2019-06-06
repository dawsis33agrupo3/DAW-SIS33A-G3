<!-- Start home section -->
<?php
require_once 'php/conexion.php';
$sqlg="SELECT * FROM usuarios";
$res3=$cn->query($sqlg);
if ($res3->num_rows>0) {
  $cantUsuarios=$res3->num_rows;
}else{
  $cantUsuarios=0;
}


?>

<!--DIV -->

<!--INICIO GRAFICA -->

  <div class="col-xs-6 col-md-3">
          <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
              <h4>Usuarios:</h4>
              <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $cantUsuarios; ?>">
                <span class="percent"><?php echo $cantUsuarios; ?></span>
              <canvas height="300" width="360" style="height: 0px; width: 0px;"></canvas></div>
            </div>
          </div>
        </div>

  <!--FIN GRAFICA -->

  <!--INICIO BOTONES PARA ADMIN -->
  <form method="post">
    <center>
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-secondary" name="autos">Ver autos</button>
    <button type="submit" class="btn btn-secondary" name="reserva">Ver reservas</button>
    <button type="submit" class="btn btn-secondary" name="alquiler">Ver registros de renta</button>
</center>
  </div>
</form>

  <!--FIN BOTONES PARA ADMIN -->
                  <?php
                  if (isset($_GET["cod"])) {
                    $id=$_GET["cod"];
                    $sqle="DELETE FROM usuarios WHERE idUsuario='".$id."'";
                    if ($cn->query($sqle)) {
                    ?>
                    <br>
                    <br>
                    <br>
                    <div class="alert bg-success" role="alert">
                      <svg class="glyph stroked checkmark">
                        <use xlink:href="#stroked-checkmark"></use>
                      </svg> Dato eliminado correctamente <a href="#" class="pull-right">
                      <span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="alert bg-danger" role="alert">
                      <svg class="glyph stroked cancel">
                        <use xlink:href="#stroked-cancel"></use>
                      </svg> Error al eliminar el dato <?php echo "<br>".$sqle."<br>".$cn->error; ?>
                      <a href="#" class="pull-right">
                        <span class="glyphicon glyphicon-remove"></span></a>
                    </div>

                    <?php
                    }
                    }elseif(isset($_POST["seleccionados"])){
                    $usuarios=$_POST["seleccionados"];
                    foreach($usuarios as $id){
                    $sql="DELETE FROM usuarios WHERE idUsuario='".$id."'";
                    $cn->query($sql);
                    }
                    }

   ?>

        <!-- MOSTRAR USUARIOS -->
        <form method="post" action="" enctype="multipart/form-data">
          <div class="col-md-8">
            <div class="panel panel-blue">
            <div class="panel-heading dark-overlay">
              <svg class="glyph stroked clipboard-with-paper">
            <use xlink:href="#stroked-clipboard-with-paper"></use>
          </svg>Listado de Usuarios</div>
          <div class="panel-body">
            <ul class='todo-list'>
            <li class="todo-list-item">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Foto</b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Nombres</b>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Sexo</b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Cargo</b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Usuario</b>

              </li>
            <?php
              $sqlg="SELECT * FROM usuarios";
              $rese=$cn->query($sqlg);
              if ($rese->num_rows>0) {
                while ($usuario=$rese->fetch_assoc()) {
                  ?>
                  	<li class="todo-list-item">
                          &nbsp;&nbsp;&nbsp;&nbsp;

                          <?php
                          echo "<img src='images/fotosUsuarios/".$usuario["foto"]."' width=60 height=60 > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                              .$usuario["nombre"]."  "
                              .$usuario["apellido"]." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                              .$usuario["sexo"]." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                              $sqlg="SELECT * FROM cargos WHERE idCargo='".$usuario["idCargo"]."' ";
                              $resc=$cn->query($sqlg);
                              while ($cargo=$resc->fetch_assoc()) {
                                echo $cargo["nivel"]." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                              }
                            echo $usuario["usuario"]." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                        ?>

                        <div class="pull-right action-buttons">
        									<a href="index.php?pag=editarUsuarios.php&codm=<?php echo $usuario["idUsuario"];  ?>" ><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
                          &nbsp;&nbsp;
                          <a href="index.php?pag=admin.php&cod=<?php echo $usuario["idUsuario"];  ?>" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
                          &nbsp;&nbsp;
                      	</div>

        							</li>
                <?php
                }
              }else{
                ?>
                <li class="todo-list-item">
                <div class="alert bg-warning" role="alert">
                					<svg class="glyph stroked flag">
                          <use xlink:href="#stroked-flag"></use>
                </svg> No hay datos que mostrar <a href="#" class="pull-right">
                  <span class="glyphicon glyphicon-remove"></span></a>
                				</div>
                </li>
              <?php
              }
                ?>

                <?php



                ?>




              </ul>
              </div>

              <div class="panel-footer" align="center">
                  <br>
                  <br>
                </div>

          </div>
        </div>


        </form>
        <?php
        if (isset($_POST["autos"])) {
            echo "<script>location.href='index.php?pag=adminAutos.php';</script>";
        }elseif (isset($_POST["reserva"])) {
          echo "<script>location.href='index.php?pag=adminReserva.php';</script>";

        }elseif (isset($_POST["alquiler"])) {
          echo "<script>location.href='index.php?pag=adminRegistroRT.php';</script>";

        }

         ?>
