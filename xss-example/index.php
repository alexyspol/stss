<?php

// Include the database connection file
require_once './db.php';

// SQL query to fetch comments from the database
$sql = "SELECT * FROM comments ORDER BY date_posted";

// Execute the SQL query
$result = $conn->query($sql);

// Include the page template file
require_once './page.php';

// Close the database connection
$conn->close();

?>
