<?php

class Conexion
{

    private static $instance;

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = self::connect();
        }
        return self::$instance;
    }

    static function connect()
    {
        $config = require ('config.php');
        try {
            $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['basedatos']};charset={$config['db']['charset']}";
            $pdo = new PDO($dsn, $config['db']['usuario'], $config['db']['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <--Activa exception
            $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //<--. Fuerza a los nombres de las columnas a mayúsculas o minúsculas, CASE_UPPER).
        } catch (Exception $e) {
            die("No se pudo conectar: " . $e->getMessage());
        }
        return $pdo;
    }

    static function disConnect()
    {
        self::$instance = null;
    }
}









