<?php
require_once "inc/dbconn.inc.php";
// Check if the 'id' parameter is set in the URL
if (isset($_GET["id"])) {
    // Get the 'id' value from the URL query string
    $task_id = $_GET["id"];
    $sql = "UPDATE Task SET completed=1, updated=now() WHERE id=?;";
    $statement = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($statement, $sql)) {
        // Bind the task id to the placeholder
        mysqli_stmt_bind_param($statement, 'i', $task_id);
        // Execute the statement
        if (mysqli_stmt_execute($statement)) {
            // Redirect back to index.php after marking the task as completed
            header("location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($statement);
    } else {
        echo "Error: Statement preparation failed.";
    }
} else {
    header("location: index.php");
    exit();
}
mysqli_close($conn);
?>
