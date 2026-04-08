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

    static public function mdlMostrarInventario($tabla){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

    $stmt->execute();

    return $stmt->fetchAll();

    

}
static public function mdlEditarProducto($tabla, $datos){

    $stmt = Conexion::conectar()->prepare(
        "UPDATE $tabla SET 
        inve_nombre_producto = :nombre,
        inve_cantidad_producto = :cantidad,
        inve_precio_producto = :precio
        WHERE pk_id_inventario = :id"
    );

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
    $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

    return $stmt->execute() ? "ok" : "error";
}
static public function mdlEliminarProducto($tabla, $id){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_id_inventario = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    return $stmt->execute() ? "ok" : "error";
}
}