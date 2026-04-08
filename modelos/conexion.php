<?php

    class Conexion{

        static public function conectar(){

            $link = new PDO("mysql:host=localhost:3306;dbname=proyectophp_db","root","123456");
            return $link;

        }

    }