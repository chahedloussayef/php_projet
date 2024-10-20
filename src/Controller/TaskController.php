<?php
namespace Controller;

use Model\Task;

class TaskController {
    public function list() {
        $tasks = Task::getAllTasks();
        include __DIR__ . '/../View/tasks.php';  // Chemin absolu basé sur __DIR__
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            Task::addTask($title, $description);
            header('Location: /tasks');
        }
    }

    public function complete() {
        if (isset($_GET['id'])) {
            Task::completeTask($_GET['id']);
            header('Location: /tasks');
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            Task::deleteTask($_GET['id']);
            header('Location: /tasks');
        }
    }
}