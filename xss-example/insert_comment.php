<?php

require_once './db.php';

$username = $_POST['username'];
$comment = $_POST['comment'];

if(!empty($username) && !empty($comment)) {
    // Prepare the SQL statement
    $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";

    $conn->query($sql);
}

// Redirect to the index.php page
header("Location: index.php");
// Exit to stop further script execution
exit;
