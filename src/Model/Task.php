<?php
namespace Model;
use PDO;
use Database\Database;  

class Task {
    public static function getAllTasks() {
        $db = Database::getInstance();
        $stmt = $db->query('SELECT * FROM tasks ORDER BY id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addTask($title, $description) {
        $db = Database::getInstance();
        $stmt = $db->prepare('INSERT INTO tasks (title, description) VALUES (?, ?)');
        $stmt->execute([$title, $description]);
    }

    public static function completeTask($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare('UPDATE tasks SET completed = TRUE WHERE id = ?');
        $stmt->execute([$id]);
    }

    // Méthode pour supprimer une tâche
    public static function deleteTask($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare('DELETE FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
    }
}
