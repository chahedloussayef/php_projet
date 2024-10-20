<?php
namespace Database;

use PDO;
use PDOException;

class Database {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            try {
                $host = 'localhost';  // Ou l'adresse IP de ton serveur PostgreSQL
                $dbname = 'todolist';  // Le nom de ta base de données
                $username = 'postgres';  // Remplace par ton utilisateur pgAdmin
                $password = 'azazer';  // Remplace par ton mot de passe pgAdmin

                self::$instance = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}