<?php

// Include the database connection file
require_once './db.php';

// Create user_info table if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS user_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    home_address VARCHAR(50) NOT NULL,
    phone_number VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Delete all existing data from the table
$conn->query("DELETE FROM user_info");

// Dummy data
$data = [
    [
        'username' => 'user1',
        'password' => 'password1',
        'email' => 'user1@example.com',
        'home_address' => '123 Main St, City1',
        'phone_number' => '555-1111'
    ],
    [
        'username' => 'user2',
        'password' => 'password2',
        'email' => 'user2@example.com',
        'home_address' => '456 Elm St, City2',
        'phone_number' => '555-2222'
    ],
    [
        'username' => 'user3',
        'password' => 'password3',
        'email' => 'user3@example.com',
        'home_address' => '789 Oak St, City3',
        'phone_number' => '555-3333'
    ],
    [
        'username' => 'user4',
        'password' => 'password4',
        'email' => 'user4@example.com',
        'home_address' => '101 Pine St, City4',
        'phone_number' => '555-4444'
    ],
    [
        'username' => 'user5',
        'password' => 'password5',
        'email' => 'user5@example.com',
        'home_address' => '202 Maple St, City5',
        'phone_number' => '555-5555'
    ]
];

// SQL query to insert dummy data
$sql = "INSERT INTO user_info (username, password, email, home_address, phone_number) VALUES ";
    
// Loop through the data array and insert them into the user_info table
foreach ($data as $row) {
    // Construct the SQL insert query
    $sql .= "('{$row['username']}', '{$row['password']}', '{$row['email']}', '{$row['home_address']}', '{$row['phone_number']}'),";
}

// Remove the trailing comma from the SQL insert query
$sql = rtrim($sql, ",");

// Execute the insert query to add the dummy data to the table
$conn->query($sql);

// Redirect to the index.php page
header("Location: index.php");
// Exit to stop further script execution
exit;
