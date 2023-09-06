<?php
// Include the database connection file
require_once "inc/dbconn.inc.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET["id"])) {
    // Get the 'id' value from the URL query string
    $task_id = $_GET["id"];

    // Prepare the SQL statement to mark the task as completed
    $sql = "UPDATE Task SET completed=1, updated=now() WHERE id=?;";
    $statement = mysqli_stmt_init($conn);

    // Check if the statement was prepared successfully
    if (mysqli_stmt_prepare($statement, $sql)) {
        // Bind the task id to the placeholder
        mysqli_stmt_bind_param($statement, 'i', $task_id);

        // Execute the statement
        if (mysqli_stmt_execute($statement)) {
            // Redirect back to index.php after marking the task as completed
            header("location: index.php");
            exit();
        } else {
            // Output an error message if execution fails
            echo "Error: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($statement);
    } else {
        // Output an error message if the statement preparation fails
        echo "Error: Statement preparation failed.";
    }
} else {
    // Redirect to index.php if 'id' is not set in the URL
    header("location: index.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
