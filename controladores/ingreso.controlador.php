<?php

class ControladorUsuarios{

    static public function ctrIngresoUsuario(){

        if(isset($_POST["usuario"])){

            $tabla = "personas";
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            $respuesta = ModeloRegistro::mdlMostrarUsuario($tabla, $usuario);

            if($respuesta && $respuesta["pers_clave"] == $password){

                session_start();

                $_SESSION["iniciarSesion"] = "ok";
                $_SESSION["usuario"] = $respuesta["pers_nombre"];

                echo '<script>
                    window.location = "index.php?modulo=inventario";
                </script>';

            } else {

                echo '<br><div class="alert alert-danger">Error al ingresar</div>';

            }

        }

    }

}