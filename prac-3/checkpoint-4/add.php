<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practical 3: Current tasks</title>
    <meta charset="UTF-8" />
    <meta name="author" content="suman" />
    <link rel="stylesheet" href="./styles/style.css">
    <script src="./scripts/script.js" defer></script>
</head>
<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h1>Add a new task</h1>
    <form method="POST" action="add-task.php">
    <input type="text" name="task-name" required placeholder="Enter the task name">
    <input type="submit" value="Add Task" class="submit-button">
    </form>

</body>
</html>
