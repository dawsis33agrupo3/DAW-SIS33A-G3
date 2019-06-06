<!-- Start home section  NO SIRVE-->
<?php
require_once 'php/conexion.php';
$sqlg="SELECT * FROM reservas ";
$res3=$cn->query($sqlg);
if ($res3->num_rows>0) {
  $cantReservas=$res3->num_rows;
}else{
  $cantReservas=0;
}


?>

<!--DIV -->

<!--INICIO GRAFICA -->

  <div class="col-xs-6 col-md-3">
          <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
              <h4>Total reservas:</h4>
              <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $cantReservas; ?>">
                <span class="percent"><?php echo $cantReservas; ?></span>
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


</center>
  </div>
</form>

  <!--FIN BOTONES PARA ADMIN -->
                  <?php
                  if (isset($_GET["cod"])) {
                    $id=$_GET["cod"];
                    $sqle="DELETE FROM reservas WHERE idVehiculo='".$id."'";
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
                    $Reservas=$_POST["seleccionados"];
                    foreach($Reservas as $id){
                    $sql="DELETE FROM reservas WHERE idVehiculo='".$id."'";
                    $cn->query($sql);
                    }
                    }

   ?>

        <!-- MOSTRAR Reservas -->
        <form method="post" action="" enctype="multipart/form-data">
          <div class="col-md-8">
            <div class="panel panel-blue">
            <div class="panel-heading dark-overlay">
              <svg class="glyph stroked clipboard-with-paper">
            <use xlink:href="#stroked-clipboard-with-paper"></use>
          </svg>Listado de Autos Reservados</div>
          <div class="panel-body">
            <ul class='todo-list'>

            <?php
              $sqlg="SELECT * FROM Reservas";
              $rese=$cn->query($sqlg);
              if ($rese->num_rows>0) {
                while ($reservas=$rese->fetch_assoc()) {
                  ?>
                  	<li class="todo-list-item">

                          <?php





                          echo "

                          <div class='table-responsive'>
                            <table class='table'>

                            <tr bgcolor='#ffd809'>reservas ".$reservas["idVehiculo"]."


                            <td bgcolor='#ffd809'> Fecha Inicio </td>
                            <td bgcolor='#ffd809'> Fecha Final </td>
                            <td bgcolor='#ffd809'> ID. Vehiculo </td>

                            </tr>

                            <tr>
                            <td bgcolor='#fefd98'>".substr($reservas["fechaInicio"],0,16) ."</td>
                            <td bgcolor='#fefd98'>".substr($reservas["fechaFin"],0,16) ."</td>
                            <td bgcolor='#fefd98'>".$reservas["idVehiculo"]."</td>






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
            echo "<script>location.href='index.php?pag=perfilUsuarios.php';</script>";
        }

         ?>
