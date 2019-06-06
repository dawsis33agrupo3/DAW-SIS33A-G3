<!-- Start home section -->
<?php
require_once 'php/conexion.php';
$sqlg="SELECT * FROM catalogo";
$res3=$cn->query($sqlg);
if ($res3->num_rows>0) {
  $cantcatalogo=$res3->num_rows;
}else{
  $cantcatalogo=0;
}


?>

<!--DIV -->

<!--INICIO GRAFICA -->

  <div class="col-xs-6 col-md-3">
          <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
              <h4>Total Autos:</h4>
              <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $cantcatalogo; ?>">
                <span class="percent"><?php echo $cantcatalogo; ?></span>
              <canvas height="300" width="360" style="height: 0px; width: 0px;"></canvas></div>
            </div>
          </div>
        </div>

  <!--FIN GRAFICA -->

  <!--INICIO BOTONES PARA ADMIN -->
  <form method="post">
    <center>
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="submit" class="btn btn-secondary" name="autos">Volver</button>
    <button type="submit" class="btn btn-secondary" name="reserva">Insertar Auto</button>

</center>
  </div>
</form>

  <!--FIN BOTONES PARA ADMIN -->
                  <?php
                  if (isset($_GET["cod"])) {
                    $id=$_GET["cod"];
                    $sqle="DELETE FROM catalogo WHERE idVehiculo='".$id."'";
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
                    $catalogo=$_POST["seleccionados"];
                    foreach($catalogo as $id){
                    $sql="DELETE FROM catalogo WHERE idVehiculo='".$id."'";
                    $cn->query($sql);
                    }
                    }

   ?>

        <!-- MOSTRAR catalogo -->
        <form method="post" action="" enctype="multipart/form-data">
          <div class="col-md-8">
            <div class="panel panel-blue">
            <div class="panel-heading dark-overlay">
              <svg class="glyph stroked clipboard-with-paper">
            <use xlink:href="#stroked-clipboard-with-paper"></use>
          </svg>Listado de Vehiculos</div>
          <div class="panel-body">
            <ul class='todo-list'>

            <?php
              $sqlg="SELECT * FROM catalogo";
              $rese=$cn->query($sqlg);
              if ($rese->num_rows>0) {
                while ($vehiculo=$rese->fetch_assoc()) {
                  ?>
                  	<li class="todo-list-item">

                          <?php





                          echo "

                          <div class='table-responsive'>
                            <table class='table'>

                            <tr bgcolor='#ffd809'>Vehiculo ".$vehiculo["idVehiculo"]."

                            <td bgcolor='#ffd809'> Foto </td>

                            <td bgcolor='#ffd809'> Matricula </td>
                            <td bgcolor='#ffd809'> Marca </td>
                            <td bgcolor='#ffd809'> Modelo </td>
                            <td bgcolor='#ffd809'> Transmision </td>
                            <td bgcolor='#ffd809'> Capacidad </td>
                            <td bgcolor='#ffd809'> Precio </td>

                            <td bgcolor='#ffd809'> Acciones </td>
                            </tr>

                            <tr>
                            <td bgcolor='#fefd98'><img src='images/fotoVehiculo/".$vehiculo["fotoV"]."' width=160 height=250 > </td>
                            <td bgcolor='#fefd98'>".$vehiculo["matricula"]."</td>
                            <td bgcolor='#fefd98'>".$vehiculo["marca"]."</td>
                            <td bgcolor='#fefd98'>".$vehiculo["modelo"]."</td>
                            <td bgcolor='#fefd98'>".$vehiculo["transmision"]."</td>
                            <td bgcolor='#fefd98'>".$vehiculo["capacidad"]."</td>
                            <td bgcolor='#fefd98'>".$vehiculo["precio"]."</td>

                            <td bgcolor='#fefd98'>

                            <a href='index.php?pag=adminAutosEdit.php&codm=".$vehiculo["idVehiculo"].";'><svg class='glyph stroked pencil'><use xlink:href='#stroked-pencil'></use></svg></a>
                            &nbsp;
          									<a href='index.php?pag=adminAutos.php&cod=".$vehiculo["idVehiculo"]."; ' class='trash'><svg class='glyph stroked trash'><use xlink:href='#stroked-trash'></use></svg></a>
                            </td>



                            </tr>

                            </table>
                          </div>

          ";

                        ?>

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
            echo "<script>location.href='index.php?pag=admin.php';</script>";
        }elseif (isset($_POST["reserva"])) {
          echo "<script>location.href='index.php?pag=adminAutosInsert.php';</script>";

        }

         ?>
