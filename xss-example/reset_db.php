<?php

// Include the database connection file
require_once './db.php';

// Create comments table if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comment TEXT NOT NULL
)");

// Delete all existing comments from the table
$conn->query("DELETE FROM comments");

// SQL query to insert dummy comments
$sql_insert_comment = "INSERT INTO comments (username, date_posted, comment) VALUES ";

// Array of dummy comments
$comments = [
    ["John", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et nisi elementum, pellentesque leo eget, finibus turpis."],
    ["Alice", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et nisi elementum, pellentesque leo eget, finibus turpis."],
    ["Bob", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et nisi elementum, pellentesque leo eget, finibus turpis."]
];

// Get the current date
$current_date = date("Y-m-d");

// Loop through the comments array and insert them into the comments table
foreach ($comments as $key => $comment) {
    // Calculate the date for each comment (yesterday, the day before, etc.)
    $date = date("Y-m-d", strtotime("-$key days", strtotime($current_date)));
    // Construct the SQL insert query for the comment
    $sql_insert_comment .= "('{$comment[0]}', '$date', '{$comment[1]}'),";
}

// Remove the trailing comma from the SQL insert query
$sql_insert_comment = rtrim($sql_insert_comment, ",");

// Execute the insert query to add the dummy comments to the table
$conn->query($sql_insert_comment);

// Redirect to the index.php page
header("Location: index.php");
// Exit to stop further script execution
exit;
