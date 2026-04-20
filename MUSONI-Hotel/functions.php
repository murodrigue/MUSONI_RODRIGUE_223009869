<?php
// Include database configuration
include 'db_config.php';

// Function to create database and tables (Run once during setup)
function createDatabase() {
    global $conn;
    
    // Create Database
    $sql = "CREATE DATABASE IF NOT EXISTS musoni_hotel";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully<br>";
    }
    
    // Use the database
    $conn->select_db("musoni_hotel");
    
    // Create users table (for login/registration)
    $users_table = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        full_name VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
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
    
    if ($conn->query($users_table) === TRUE) {
        echo "Users table created successfully<br>";
    }
    
    if ($conn->query($orders_table) === TRUE) {
        echo "Orders table created successfully<br>";
    }
    
    if ($conn->query($contact_table) === TRUE) {
        echo "Contact messages table created successfully<br>";
    }
}

// Function to register user
function registerUser($username, $password, $email, $full_name) {
    global $conn;
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, password, email, full_name) 
            VALUES ('" . $conn->real_escape_string($username) . "', 
                    '" . $hashed_password . "', 
                    '" . $conn->real_escape_string($email) . "', 
                    '" . $conn->real_escape_string($full_name) . "')";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to login user
function loginUser($username, $password) {
    global $conn;
    
    $sql = "SELECT id, password, full_name FROM users WHERE username = '" . $conn->real_escape_string($username) . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = $row['full_name'];
            return true;
        }
    }
    return false;
}

// Function to insert order
function insertOrder($full_name, $email, $phone, $menu_items, $address, $order_date) {
    global $conn;
    
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
    
    $sql = "INSERT INTO orders (user_id, full_name, email, phone, menu_items, address, order_date) 
            VALUES (" . ($user_id ? $user_id : "NULL") . ", 
                    '" . $conn->real_escape_string($full_name) . "', 
                    '" . $conn->real_escape_string($email) . "', 
                    '" . $conn->real_escape_string($phone) . "', 
                    '" . $conn->real_escape_string($menu_items) . "', 
                    '" . $conn->real_escape_string($address) . "', 
                    '" . $order_date . "')";
    
    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id;
    } else {
        return false;
    }
}

// Function to get user orders
function getUserOrders($user_id) {
    global $conn;
    
    $sql = "SELECT * FROM orders WHERE user_id = " . intval($user_id) . " ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    $orders = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }
    return $orders;
}

// Function to insert contact message
function insertContactMessage($full_name, $email, $phone, $location, $message) {
    global $conn;
    
    $sql = "INSERT INTO contact_messages (full_name, email, phone, location, message) 
            VALUES ('" . $conn->real_escape_string($full_name) . "', 
                    '" . $conn->real_escape_string($email) . "', 
                    '" . $conn->real_escape_string($phone) . "', 
                    '" . $conn->real_escape_string($location) . "', 
                    '" . $conn->real_escape_string($message) . "')";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to logout
function logoutUser() {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Initialize database on first run
if (isset($_GET['init_db']) && $_GET['init_db'] == 'true') {
    createDatabase();
}
?>
