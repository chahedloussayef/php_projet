<!-- tasks.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Tâches</title>
</head>
<body>
    <h1>Ma To Do List</h1>
    <form action="/tasks/add" method="POST">
        <input type="text" name="title" placeholder="Titre de la tâche" required>
        <textarea name="description" placeholder="Description de la tâche"></textarea>
        <button type="submit">Ajouter une tâche</button>
    </form>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <span class="<?= $task['completed'] ? 'task-completed' : '' ?>">
                    <?= htmlspecialchars($task['title']) ?>
                </span>
                <a href="/tasks/complete?id=<?= $task['id'] ?>">Terminer</a>
                <a href="/tasks/delete?id=<?= $task['id'] ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>