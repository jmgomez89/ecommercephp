<?php

//Conexión a la base de datos

class Database{

    public static function connect(){

        $db = new mysqli('localhost', 'root', '', 'ecommerce');
        return $db;
        
    }
}