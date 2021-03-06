<!DOCTYPE html>
<html lang="es">
    <head>
      <?php
      //haciendo conexion
      require_once 'php/conexion.php';

      session_start();
       ?>



        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>David's Rent Car </title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    </head>

    <body>

      <?php

    //Mostrar datos de los empleados
//      $sqlg="SELECT * from usuarios ";
//      $res=$cn->query($sqlg);
//
//      if ($res->num_rows > 0) {
//        while ($row = $res->fetch_assoc()) {
//          echo "id: ". $row["idUsuario"]. " - Nombre: ". $row["nombre"]. " - Apellido: ". $row["apellido"]." - EMAIL: ". $row["email"]. "<br>";
//      }
//}
//
    ?>


        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="index.php?pag=home.php" class="brand">
                        <img src="images/logo.png" width="500" height="450" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->

                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">

                            	<?php
                              //menu
                        					if (isset($_GET["menu"])) {
                                    $menu=$_GET["menu"];
                        						include($menu);
                        					}else{
                                    	include("menu.php");

                        					}
                        			 ?>
                      </ul>
                    </div>



                    <!-- End main navigation -->
                </div>
            </div>
        </div>


        <!-- Start home section -->
        <div id="home">

            <!-- Start cSlider -->
            <?php
            if (isset($_GET["pag"])) {
                //$vista=desencriptar2($_GET["pag"]);
                $vista=$_GET["pag"];
            		include($vista);
            }else {
            		include("home.php");
            }
             ?>



        </div>
        <!-- End home section -->


        <div class="footer">
            <p>&copy; 2019 DAVID'S RENT A CAR, EL SALVADOR </a></p>
        </div>

        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->

        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/lumino.glyphs.js"></script>

        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
