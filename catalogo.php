<?php

require_once 'php/conexion.php';

$sqlg="SELECT * FROM catalogo";
$res3=$cn->query($sqlg);
if ($res3->num_rows>0) {
  $cantVehiculos=$res3->num_rows;
}else{
  $cantVehiculos=0;
}
 ?>

 <?php
if (!isset($_SESSION["tipo"])) {
echo "
<div class='section secondary-section ' id='portfolio'>
    <div class='triangle'></div>
    <div class='container'>
        <div class=' title'>
            <h1>Rentar Vehiculo</h1>
            <p>Necesitas registrarte para ver los vehiculos disponibles, ¡Crearla es facil y rapido!</p>
        </div>

        <center>
          <a class='underlineHover' href='index.php?pag=registro.php'><h4>¡Registrate!</h4></a>
        </center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


";

}else {

  ?>


 <div class='section secondary-section ' id='portfolio'>
     <div class='triangle'></div>
     <div class='container'>
         <div class=' title'>
             <h1>Elige tu vehiculo</h1>
             <p>Da clic a los siguientes vehiculos para saber más detalles sobre este.</p>
         </div>



 <?php
   $sqlg="SELECT * FROM catalogo";
   $rese=$cn->query($sqlg);
   if ($rese->num_rows>0) {


     //Inicio para mostrar los registros
     while ($vehiculo=$rese->fetch_assoc()) {

/*.$vehiculo["marca"]." */
                //inicio
echo "


                <div class='table-responsive'>
                  <table class='table'>

                  <tr>Vehiculo ".$vehiculo["idVehiculo"]."

                  <td bgcolor='gray'> Foto </td>

                  <td bgcolor='gray'> Matricula </td>
                  <td bgcolor='gray'> Marca </td>
                  <td bgcolor='gray'> Modelo </td>
                  <td bgcolor='gray'> Transmision </td>
                  <td bgcolor='gray'> Capacidad </td>
                  <td bgcolor='gray'> Precio </td>

                  <td bgcolor='gray'> Rentar </td>
                  </tr>

                  <tr>
                  <td><img src='images/fotoVehiculo/".$vehiculo["fotoV"]."' width=150 height=150 ></td>
                  <td>".$vehiculo["matricula"]."</td>
                  <td>".$vehiculo["marca"]."</td>
                  <td>".$vehiculo["modelo"]."</td>
                  <td>".$vehiculo["transmision"]."</td>
                  <td>".$vehiculo["capacidad"]."</td>
                  <td>".$vehiculo["precio"]."</td>

                  <td>
                  <a href='index.php?pag=rentar.php&renta=".$vehiculo["idVehiculo"]."'>
                      <img src='images\ico\icoRent.svg' width='60' height='60'>
                        </a>
                  </td>



                  </tr>

                  </table>
                </div>

";
                //FIN
             ?>

     <?php
     //fin de registros
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


}

?>


<!-- Portfolio section end -->
