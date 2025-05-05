<?php

    class Conexion{

        static public function conectar(){

            $link = new PDO("mysql:host=localhost:3307;dbname=proyectophp_db","root","root");
            return $link;

        }

    }