<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = trim($_POST['task_name']);

    // Insert the new task into the database
    if (!empty($task_name)) {
        $stmt = $pdo->prepare('INSERT INTO tasks (task_name) VALUES (:task_name)');
        $stmt->execute(['task_name' => $task_name]);
    }
}

// Redirect back to the index page
header('Location: dashboard.php');
exit;
?>
