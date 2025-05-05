<?php

require_once "conexion.php";

class ModeloInventario{

    /*=============================================
    Registrar Producto
    =============================================*/
    static public function mdlInventario($tabla, $datos){
        
        $sql = "INSERT INTO {$tabla} (inve_nombre_producto, inve_cantidad_producto, inve_precio_producto) VALUES (:nombre, :cantidad, :precio)";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nombre",   $datos["inve_nombre_producto"],   PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $datos["inve_cantidad_producto"], PDO::PARAM_INT);
        $stmt->bindParam(":precio",   $datos["inve_precio_producto"],   PDO::PARAM_STR);

        $ok = $stmt->execute();
        $stmt->closeCursor();
        return $ok ? "ok" : "error";
    }

}