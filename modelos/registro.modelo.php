<?php

require_once "conexion.php";

class ModeloRegistro {

    /*=============================================
    Registrar usuario
    =============================================*/
    static public function mdlRegistro($tabla, $datos){
        
        $sql = "INSERT INTO {$tabla} (pers_nombre, pers_telefono, pers_correo, pers_clave) VALUES (:nombre, :telefono, :correo, :clave)";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":nombre",   $datos["pers_nombre"],   PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["pers_telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo",   $datos["pers_correo"],   PDO::PARAM_STR);
        $stmt->bindParam(":clave",    $datos["pers_clave"],    PDO::PARAM_STR);

        $ok = $stmt->execute();
        $stmt->closeCursor();
        return $ok ? "ok" : "error";
    }

}
