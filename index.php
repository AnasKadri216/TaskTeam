<?php
require 'db.php';

// Ajouter une tâche
if (isset($_POST['task'])) {
    $task = trim($_POST['task']);
    if ($task !== '') {
        $stmt = $pdo->prepare("INSERT INTO tasks (content) VALUES (?)");
        $stmt->execute([$task]);
    }
}

// Récupérer les tâches
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TaskTeam</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>TaskTeam</h1>

    <form method="POST" action="">
        <input type="text" name="task" placeholder="Nouvelle tâche">
        <button type="submit">Ajouter</button>
    </form>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task['content']) ?>
                <a href="delete_task.php?id=<?= $task['id'] ?>">🗑️</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
