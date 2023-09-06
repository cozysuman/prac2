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
    <h1>Current</h1>
    <?php
    require_once "inc/dbconn.inc.php";
   // Define the SQL query
    $sql = "SELECT id, name FROM Task WHERE completed=0;";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // SQL query to count the number of active tasks
    $count_sql = "SELECT COUNT(*) as task_count FROM Task WHERE completed=0;";
    $count_result = mysqli_query($conn, $count_sql);
    $task_count = mysqli_fetch_assoc($count_result)["task_count"];
    if ($task_count > 0): ?>
        <p class="task-number"><?php echo ($task_count == 1) ? '1 task' : $task_count . ' tasks'; ?></p>
    <?php else: ?>
        <p class="task-number">No tasks</p>
    <?php endif; 
// Check if the query was successful
    if ($result) {
    // Check if there are rows in the result set
        if (mysqli_num_rows($result) >= 1) {
            echo '<ul class="task-list">';
            // Iterate over each row and output the task names
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li><a href="complete.php?id=' . $row["id"] . '">' . $row["name"] . '</a>'  . '</li>';
            }
            echo '</ul>';         
            // Free up the result set resources
            mysqli_free_result($result);
        } 
    } else {
        echo 'Error executing the query: ' . mysqli_error($conn);
    }
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
