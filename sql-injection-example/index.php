<?php

// Include the database connection file
require_once './db.php';

$username = $_GET['username'];
$password = $_GET['password'];

// SQL query to fetch data from the database
$sql = "SELECT * FROM user_info WHERE username = '{$username}' AND password = '{$password}'";

// Execute the SQL query
$result = $conn->query($sql);

// Include the page template file
require_once './page.php';
