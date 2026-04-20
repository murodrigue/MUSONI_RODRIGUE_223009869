<?php
session_start();
include 'db_config.php';
include 'functions.php';

$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $location = trim($_POST['location']);
    $message = trim($_POST['message']);

    // Validation
    if (empty($full_name) || empty($email) || empty($phone) || empty($message)) {
        $error_message = "Full Name, Email, Phone, and Message are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address!";
    } else {
        // Insert contact message into database
        if (insertContactMessage($full_name, $email, $phone, $location, $message)) {
            $success_message = "Thank you for your message! We will get back to you as soon as possible.";
            // Clear form
            $full_name = $email = $phone = $location = $message = '';
        } else {
            $error_message = "There was an error sending your message. Please try again!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MUSONI Hotel</title>
    <link rel="stylesheet" href="style.css">
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
            <div class="user-section">
                <?php if (isLoggedIn()): ?>
                    <span>Welcome, <?php echo $_SESSION['full_name']; ?>!</span>
                    <a href="view_orders.php">My Orders</a>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <section class="hero">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you. Send us a message!</p>
        </section>

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

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin: 2rem 0;">
            <!-- Contact Form -->
            <div>
                <form method="POST" action="contact.php">
                    <div class="form-group">
                        <label for="full_name">Full Name *</label>
                        <input type="text" id="full_name" name="full_name" required value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="location">Location (Optional)</label>
                        <input type="text" id="location" name="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <div class="about-section">
                    <h2>Our Contact Information</h2>
                    
                    <div class="card">
                        <h3>Address</h3>
                        <p>MUSONI Hotel<br>Kampala, Uganda</p>
                    </div>

                    <div class="card">
                        <h3>Phone</h3>
                        <p>+256-XXX-XXX-XXX<br>Available: Mon-Sun, 9AM-10PM</p>
                    </div>

                    <div class="card">
                        <h3>Email</h3>
                        <p>info@musonihotel.com<br>orders@musonihotel.com</p>
                    </div>

                    <div class="card">
                        <h3>Business Hours</h3>
                        <p>Monday - Sunday<br>9:00 AM - 10:00 PM</p>
                    </div>

                    <div class="card">
                        <h3>Social Media</h3>
                        <p>Follow us on social media for updates and special offers!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Contact Us Section -->
        <section class="about-section" style="margin-top: 2rem;">
            <h2>Why Contact Us?</h2>
            <ul style="margin-left: 2rem;">
                <li><strong>General Inquiries:</strong> Have questions about our menu or services?</li>
                <li><strong>Reservations:</strong> Book a table for a special occasion</li>
                <li><strong>Feedback:</strong> Share your dining experience with us</li>
                <li><strong>Catering:</strong> Inquire about our catering services for events</li>
                <li><strong>Partnerships:</strong> Interested in collaborating with us?</li>
                <li><strong>Complaints:</strong> We value your feedback and will address any concerns</li>
            </ul>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
