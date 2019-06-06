<?php
require_once 'php/conexion.php';
?>

<?php

 $idVeh = $_GET["renta"];

 $sqlcg="SELECT * FROM catalogo WHERE idVehiculo='".$idVeh."'";
 $res=$cn->query($sqlcg);
 if ($res->num_rows>0) {
   $vehiculoVeri=$res->fetch_assoc();

   if (isset($_POST["regresar"])) {
   echo "<script>location.href='index.php?pag=catalogo.php';</script>";
   }

   ?>

<!-- INICIO DETALLES DE RENTA-->

   <div class="wrapper fadeInDown">
       <div id="formContent" >
       <form method="post" action="">

<div class="form-group">
  <label><h3>CONFIRMACION DE RESERVA</h3></label>
  <HR>

         <label><h4>DATOS DEL VEHICULO</h4></label>
         <img src='images/fotoVehiculo/<?php echo $vehiculoVeri["fotoV"]; ?>' width=150 height=150 >

         <br>
         <br>
 </div>


 <div class="form-group">
 <label><b>Cliente:</b>
    <?php echo
   $_SESSION["usuario"]; ?>
    </label>
 </div>
<div class="form-group">
<label><b>Marca:</b>
   <?php echo $vehiculoVeri["marca"]; ?>
   </label>
</div>

<div class="form-group">
   <label><b>Modelo:</b>
   <?php echo $vehiculoVeri["modelo"]; ?>
   </label>
</div>

<div class="form-group">
   <label><b>Precio:</b>
   <?php echo $vehiculoVeri["precio"]; ?>
   </label>
</div>


<div class="form-group">
   <label><b>Transmision:</b>
  <?php echo $vehiculoVeri["transmision"]; ?>
  </label>
</div>
<hr>

<div class="form-group">
   <label><b>Fecha Inicial:</b>
     <input type="datetime-local" name="fechaSali" >
  </label>
</div>

<div class="form-group">
   <label><b>Fecha Final:</b>
     <input type="datetime-local" name="fechaEnt" >
  </label>
</div>



<form method='post' action="index.php?pag=rentar.php&codv="<?php echo $vehiculoVeri["idVehiculo"]; ?>"  ">
<input type="hidden" name="cod" value="<?php echo $idVeh; ?>">
<button type="submit" name="reserva" class="btn btn-primary" value="<?php echo $vehiculoVeri["idVehiculo"]; ?>">Reservar</button>
<button type="submit" name="regresar" class="btn btn-primary" >Regresar</button>
</form>


<!-- FIN DETALLES DE RENTA-->

<!-- INICIO INSERT DE RENTA-->
<?php

   if (isset($_POST["reserva"])) {

     $fechaSalida=$_POST["fechaSali"];
     $fechaEntrada=$_POST["fechaEnt"];


        //INICIO CONSULTA A LA RESERVA//
		//SELECT * FROM reservas WHERE idVehiculo='1' and (left(fechaInicio,10)>='2019-06-30' OR left(fechaFin,10)>='2019-06-30') and (left(fechaFin,10)<='2019-07-02' OR left(fechaInicio,10)<='2019-07-02') //

		$sqlveri="SELECT * FROM reservas WHERE idVehiculo='".$idVeh."' and (left(fechaInicio,10)>='".substr($fechaSalida,0,10) ."' OR left(fechaFin,10)>='".substr($fechaSalida,0,10)."') and (left(fechaFin,10)<='".substr($fechaEntrada,0,10)."' OR left(fechaInicio,10)<='".substr($fechaEntrada,0,10)."')";


    //   $sqlveri="SELECT * FROM reservas WHERE idVehiculo='".$idVeh."' and left(fechaInicio,10)>='".substr($fechaSalida,0,10) ."'  and left(fechaFin,10)<='".substr($fechaEntrada,0,10)."'";
        $resveri=$cn->query($sqlveri);


        if (@$resveri->num_rows>0) {
          $reservaVeri=$resveri->fetch_assoc();
			echo "ya esta rentado";
                  //DB RESERVAS
//FECHA FINAL                    $reservaVeri["fechaFin"];
//FECHA INICIAL                 $reservaVeri["fechaInicio"];
//IDVEH                         $reservaVeri["idVehiculo"];


                              //FORM//
//FECHA:  SALIDA DEL Vehiculo             $fechaSalida;
//FECHA: DEVUELTA DEL VEHICULO            $fechaEntrada;


          //INICIO CONDICION QUE EVALUARA SI EXISTE O NO //



          //FIN CONDICION QUE EVALUARA SI EXISTE O NO //
		}else{

					$sqlc="INSERT INTO reservas (fechaInicio,fechaFin,idVehiculo,idUsuario)
						VALUES ('".$fechaSalida."','".$fechaEntrada."','".$vehiculoVeri["idVehiculo"]."','".$_SESSION["cod"]."')";
					if ($cn->query($sqlc)) {

					?>

					<div class="alert bg-success" role="alert" align="center">
					<svg class="glyph stroked checkmark">
					  <use xlink:href="#stroked-checkmark"></use>
					</svg><center> ¡Tu auto ha sido reservado exitosamente!</center> <a href="#" class="pull-right">
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

      }

      //FIN A LA CONSULTA DE LA RESERVA//




        //INICIO INSERT DE RESERVA//

        ?>
        <?php


        ?>

<!-- FIN INSERT DE RENTA-->



<?php

}else{
echo $sqlcg." ".$cn->error;
}
?>
</div>

          </form>


        </div>

                  <div style="border-left:90%;">
                    <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
                    <script>paypal.Buttons().render('body');</script>
                  </div>
