<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $task_name = trim($_POST['task_name']);

    // Update the task in the database
    if (!empty($task_name)) {
        $stmt = $pdo->prepare('UPDATE tasks SET task_name = :task_name WHERE id = :id');
        $stmt->execute(['task_name' => $task_name, 'id' => $id]);
    }
}

// Redirect back to the index page
header('Location: dashboard.php');
exit;
?>
