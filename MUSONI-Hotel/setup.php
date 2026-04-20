<?php
// Database Setup Script
$servername = "localhost";
$username = "root";
$password = "";

// Create connection (without selecting database initially)
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Database
$sql = "CREATE DATABASE IF NOT EXISTS musoni_hotel";
if ($conn->query($sql) === TRUE) {
    echo "✓ Database 'musoni_hotel' created/verified<br>";
} else {
    echo "✗ Error creating database: " . $conn->error . "<br>";
}

// Select database
$conn->select_db("musoni_hotel");

// Drop existing tables first
$conn->query("DROP TABLE IF EXISTS orders");
$conn->query("DROP TABLE IF EXISTS contact_messages");
$conn->query("DROP TABLE IF EXISTS users");

// Create users table
$users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    full_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($users_table) === TRUE) {
    echo "✓ Users table created/verified<br>";
} else {
    echo "✗ Error creating users table: " . $conn->error . "<br>";
}

// Create orders table
$orders_table = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    menu_items VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    order_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($orders_table) === TRUE) {
    echo "✓ Orders table created/verified<br>";
} else {
    echo "✗ Error creating orders table: " . $conn->error . "<br>";
}

// Create contact messages table
$contact_table = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($contact_table) === TRUE) {
    echo "✓ Contact messages table created/verified<br>";
} else {
    echo "✗ Error creating contact messages table: " . $conn->error . "<br>";
}

$conn->close();
echo "<br><strong>Database setup completed successfully!</strong><br>";
echo "<a href='index.php'>Go to Home Page</a>";
?>
