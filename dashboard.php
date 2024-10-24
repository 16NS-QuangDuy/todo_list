<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>To-Do List</h1>
        <p><a href="logout.php">Log out</a></p>
        <!-- Form to add a new task -->
        <form action="add_task.php" method="POST" class="task-form">
            <input type="text" name="task_name" placeholder="Enter new task" required>
            <button type="submit">Add Task</button>
        </form>

        <!-- Display the list of tasks -->
        <div class="tasks">
            <ul>
                <?php
                require 'db.php';

                // Fetch tasks from the database
                $stmt = $pdo->prepare('SELECT * FROM tasks ORDER BY created_at DESC');
                $stmt->execute();
                $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tasks as $task) {
                    echo '<li>' . htmlspecialchars($task['task_name']) .
                        ' <a href="edit_task.php?id=' . $task['id'] . '">Edit</a>' .
                        ' <a href="delete_task.php?id=' . $task['id'] . '">Delete</a>' .
                        '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>