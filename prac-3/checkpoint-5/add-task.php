<?php
// Check if the form was submitted
if (isset($_POST["task-name"])) {
    require_once "inc/dbconn.inc.php";
    $sql = "INSERT INTO Task(name) VALUES(?);";
    $statement = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($statement, $sql)) {
        // Bind the task name to the placeholder
        mysqli_stmt_bind_param($statement, 's', $task_name);
        $task_name = htmlspecialchars($_POST["task-name"]);
        if (mysqli_stmt_execute($statement)) {
            header("location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($statement);
    } else {
        echo "Error: Statement preparation failed.";
    }
    mysqli_close($conn);
} else {
    header("location: index.php");
    exit();
}
?>