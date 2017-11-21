<?php

    $user = "adm";
    $pass = "adm";
    $db = null;
    
 protected static $db;
    private function __construct() {        
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=dm107_fabianepaiva", $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db = new NotORM($pdo);
        } catch (PDOException $e) {
            print"Erro ao conectar no banco de dados! " . $e -> getMessage();           
        }
    }
    
     public static function getConnection() {
        if (!self::$db) {
            new database();
        }
        return self::$db;
    }

?>

