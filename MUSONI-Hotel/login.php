<?php
session_start();
include 'db_config.php';
include 'functions.php';

$error_message = '';
$success_message = '';
$is_register = isset($_GET['register']);

// Handle Login/Register
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($is_register) {
        // Register new user
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
        $email = trim($_POST['email']);
        $full_name = trim($_POST['full_name']);

        if (empty($name) || empty($password) || empty($email) || empty($full_name)) {
            $error_message = "All fields are required!";
        } elseif ($password !== $confirm_password) {
            $error_message = "Passwords do not match!";
        } elseif (strlen($password) < 6) {
            $error_message = "Password must be at least 6 characters long!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Please enter a valid email address!";
        } else {
            if (registerUser($name, $password, $email, $full_name)) {
                $success_message = "Registration successful! You can now login.";
                $is_register = false;
            } else {
                $error_message = "name already exists or registration failed!";
            }
        }
    } else {
        // Login existing user
        $name = trim($_POST['name'])    ;
        $password = trim($_POST['password']);

        if (empty($name) || empty($password)) {
            $error_message = "name and password are required!";
        } else {
            if (loginUser($name, $password)) {
                header("Location: view_orders.php");
                exit();
            } else {
                $error_message = "Invalid name or password!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $is_register ? 'Register' : 'Login'; ?> - MUSONI Hotel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .auth-container {
            max-width: 450px;
            margin: 3rem auto;
            display: flex;
            justify-content: center;
        }
        .auth-form {
            width: 100%;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .auth-form h2 {
            text-align: center;
            color: #667eea;
            margin-bottom: 1.5rem;
        }
        .auth-switch {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        .auth-switch a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }
        .auth-switch a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header and Navigation -->
    <header>
        <div class="header-container">
            <a href="index.php" class="logo">MUSONI Hotel</a>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Authentication Section -->
    <div class="auth-container">
        <div class="auth-form">
            <!-- Success/Error Messages -->
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $success_message; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($error_message)): ?>
                <div class="alert alert-error">
                    <strong>Error!</strong> <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <?php if ($is_register): ?>
                <!-- Registration Form -->
                <h2>Create Account</h2>
                <form method="POST" action="login.php?register=true">
                    <div class="form-group">
                        <label for="full_name">Full Name *</label>
                        <input type="text" id="full_name" name="full_name" required value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">name *</label>
                        <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password *</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

                <div class="auth-switch">
                    Already have an account? <a href="login.php">Login here</a>
                </div>
            <?php else: ?>
                <!-- Login Form -->
                <h2>Login</h2>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="name">name *</label>
                        <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

                <div class="auth-switch">
                    Don't have an account? <a href="login.php?register=true">Register here</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
