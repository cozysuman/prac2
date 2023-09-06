<?php
// Check if the form was submitted
if (isset($_POST["task-name"])) {
    // Include the database connection file
    require_once "inc/dbconn.inc.php";

    // Prepare the SQL statement
    $sql = "INSERT INTO Task(name) VALUES(?);";
    $statement = mysqli_stmt_init($conn);

    // Check if the statement was prepared successfully
    if (mysqli_stmt_prepare($statement, $sql)) {
        // Bind the task name to the placeholder
        mysqli_stmt_bind_param($statement, 's', $task_name);

        // Get the task name from the form
        $task_name = htmlspecialchars($_POST["task-name"]);

        // Execute the statement
        if (mysqli_stmt_execute($statement)) {
            // Redirect back to index.php if successful
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

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to index.php if the form was not submitted
    header("location: index.php");
    exit();
}
?>