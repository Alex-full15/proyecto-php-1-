<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PHP</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
</head>
<body>


    <?php include "vistas/modulos/menu.php"; ?>

    <div class="container-fluid">

        <div class="container py-5">

            <?php  

                #ISSET: isset() Determina si una variable está definida y no es NULL

                if(isset($_GET["modulo"])){

                    if( $_GET["modulo"] == "registro" ||
                        $_GET["modulo"] == "ingreso" ||
                        $_GET["modulo"] == "contenido" ||
                        $_GET["modulo"] == "inventario" ||
                        $_GET["modulo"] == "salir"){

                        include "modulos/".$_GET["modulo"].".php";

                    }

                }else{

                    include "modulos/ingreso.php";

                }

                

                ?>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>