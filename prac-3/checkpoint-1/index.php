<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practical 3: Current tasks</title>
    <meta charset="UTF-8" />
    <meta name="author" content="suman" />
    <!-- <script src="scripts/script.js" defer></script> -->
</head>
<body>
    <!-- <?php require_once "inc/menu.inc.php"; ?> -->
    <h1>Current</h1>
    <?php
    require_once "inc/dbconn.inc.php";

   // Define the SQL query
    $sql = "SELECT id, name FROM Task WHERE completed=0;";
    // Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if there are rows in the result set
    if (mysqli_num_rows($result) >= 1) {
        // Output the beginning of the unordered list
        echo '<ul>';

        // Iterate over each row and output the task names
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>' . $row["name"] . '</li>';
        }

        // Output the closing unordered list tag
        echo '</ul>';
        
        // Free up the result set resources
        mysqli_free_result($result);
    } else {
        // No tasks found
        echo 'No tasks found.';
    }
} else {
    // Query execution failed
    echo 'Error executing the query: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);


    ?>
</body>
</html>
