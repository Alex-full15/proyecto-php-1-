<?php

require_once "./modelos/inventario.modelo.php";

class ControladorInventario{

    static public function ctrInventario(){

        if(isset($_POST["nombreProducto"])){

            $tabla = "inventarios";

            $datos = array(
                "inve_nombre_producto" => $_POST["nombreProducto"],
                "inve_cantidad_producto" => $_POST["cantidadProducto"],
                "inve_precio_producto" => $_POST["precioProducto"]
            );

            $respuesta = ModeloInventario::mdlInventario($tabla, $datos);

            return $respuesta;

        }

    }
}