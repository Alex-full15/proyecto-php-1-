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

                if($respuesta == "ok"){

                    echo '<script>
                        alert("Producto guardado correctamente");
                        window.location = "index.php?modulo=inventario";
                    </script>';

                } else {

                    echo '<div>Error al guardar</div>';
    } 
            }

        }

        static public function ctrMostrarInventario(){

    $tabla = "inventarios";

    $respuesta = ModeloInventario::mdlMostrarInventario($tabla);

    return $respuesta;

}

static public function ctrEditarProducto(){

    if(isset($_POST["idProducto"])){

        $tabla = "inventarios";

        $datos = array(
            "id" => $_POST["idProducto"],
            "nombre" => $_POST["nombreProducto"],
            "cantidad" => $_POST["cantidadProducto"],
            "precio" => $_POST["precioProducto"]
        );

        $respuesta = ModeloInventario::mdlEditarProducto($tabla, $datos);

        if($respuesta == "ok"){

            echo '<script>
                alert("Producto actualizado");
                window.location = "index.php?modulo=inventario";
            </script>';

        }
    }
}

static public function ctrEliminarProducto(){

    if(isset($_GET["eliminar"])){

        $tabla = "inventarios";
        $id = $_GET["eliminar"];

        // Validación básica
        if(!is_numeric($id)){
            return;
        }

        $respuesta = ModeloInventario::mdlEliminarProducto($tabla, $id);

        if($respuesta == "ok"){

            echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }

                alert("Producto eliminado correctamente");
                window.location = "index.php?modulo=inventario";
            </script>';

        } else {

            echo '<div class="alert alert-danger">Error al eliminar</div>';

        }

    }

}
}