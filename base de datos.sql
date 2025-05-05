#drop database proyectophp_db;
CREATE DATABASE proyectophp_db;
USE proyectophp_db;
CREATE TABLE personas(
	pk_id_personas INT AUTO_INCREMENT PRIMARY KEY,
    pers_nombre VARCHAR(45),
    pers_telefono VARCHAR(50),
    pers_correo VARCHAR(45),
    pers_clave VARCHAR(255),
    pers_fecha_registro DATETIME
);

CREATE TABLE inventarios (
	pk_id_inventario INT AUTO_INCREMENT PRIMARY KEY,
    inve_nombre_producto VARCHAR(20),
    inve_cantidad_producto INT,
    inve_precio_protducto FLOAT,
    inve_fecha_registro TIMESTAMP
    );

select * from inventarios;
select * from personas;
