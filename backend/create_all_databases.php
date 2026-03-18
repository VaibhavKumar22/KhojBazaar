<?php
require_once __DIR__ . '/config.php';

// Create connection to MySQL server
$conn = create_db_connection();

// 1. businesswebsite database
$websiteDb = get_database_name('website');
$conn->query("CREATE DATABASE IF NOT EXISTS `$websiteDb`");
$conn->select_db($websiteDb);
$conn->query("CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAM
)");

// 2. business_portal database
$portalDb = get_database_name('portal');
$conn->query("CREATE DATABASE IF NOT EXISTS `$portalDb`");
$conn->select_db($portalDb);
$conn->query("CREATE TABLE IF NOT EXISTS users (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

// 3. busweb database
$mainDb = get_database_name('main');
$conn->query("CREATE DATABASE IF NOT EXISTS `$mainDb`");
$conn->select_db($mainDb);
$conn->query("CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// 4. busweb_admins database
$adminsDb = get_database_name('admins');
$conn->query("CREATE DATABASE IF NOT EXISTS `$adminsDb`");
$conn->select_db($adminsDb);
$conn->query("CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Add submissions table in busweb_admins
$conn->query("CREATE TABLE IF NOT EXISTS submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    file_path VARCHAR(255),
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES admins(id)
)");

// 5. busweb_users database
$usersDb = get_database_name('users');
$conn->query("CREATE DATABASE IF NOT EXISTS `$usersDb`");
$conn->select_db($usersDb);
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Create email_verification table in busweb_users
$conn->query("CREATE TABLE IF NOT EXISTS email_verification (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    otp VARCHAR(6) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expires_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_verified BOOLEAN DEFAULT FALSE
)");

echo "All databases and tables have been created successfully!";

$conn->close();
?> 