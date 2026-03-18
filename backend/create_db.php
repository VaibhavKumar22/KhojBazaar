<?php
require_once __DIR__ . '/config.php';
$dbname = get_database_name('portal');

// Create connection to MySQL server (not yet to the database)
$conn = create_db_connection();

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create users table
$tableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seller_name VARCHAR(255) NOT NULL,
    address TEXT,
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    phone VARCHAR(20),
    product VARCHAR(255),
    offer VARCHAR(255),
    description TEXT,
    image_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    product_type VARCHAR(100),
    category VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($tableSql) === TRUE) {
    echo "Table 'users' created successfully.";
} else {
    die("Error creating table: " . $conn->error);
}

$conn->close();
?>
