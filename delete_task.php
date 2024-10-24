<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the task from the database
    $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
    $stmt->execute(['id' => $id]);
}

// Redirect back to the index page
header('Location: dashboard.php');
exit;
?>
