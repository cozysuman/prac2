
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
    <h1>History</h1>
    <?php
    require_once "inc/dbconn.inc.php";
    // SQL query to select completed tasks ordered by updated date
    $sql = "SELECT name FROM Task WHERE completed=1 ORDER BY updated DESC;";
    $result = mysqli_query($conn, $sql);
    // Check if there are completed tasks
    if (mysqli_num_rows($result) > 0) {
        echo '<ul class="completed-tasks">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>' . $row["name"] . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No completed tasks yet.</p>';
    }
    mysqli_close($conn);
    ?>
</body>
</html>



