<?php


class DbConnect {
    public static function getPdo() {
        try {
            $pdo = new PDO("mysql:host=" . Config::$host . ";dbname=" . Config::$dbName, Config::$userName, Config::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit();
        }
    }
}

?>