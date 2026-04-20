<?php
session_start();
include 'db_config.php';
include 'functions.php';

$selected_item = isset($_GET['item']) ? $_GET['item'] : '';
$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $menu_items = trim($_POST['menu_items']);
    $address = trim($_POST['address']);
    $order_date = trim($_POST['order_date']);

    // Validation
    if (empty($full_name) || empty($email) || empty($phone) || empty($menu_items) || empty($address) || empty($order_date)) {
        $error_message = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address!";
    } elseif (strtotime($order_date) < strtotime(date('Y-m-d'))) {
        $error_message = "Please select a future date!";
    } else {
        // Insert order into database
        if (insertOrder($full_name, $email, $phone, $menu_items, $address, $order_date)) {
            $success_message = "Your order has been placed successfully! We will contact you shortly.";
            // Clear form
            $full_name = $email = $phone = $menu_items = $address = $order_date = '';
        } else {
            $error_message = "There was an error placing your order. Please try again!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place an Order - MUSONI Hotel</title>
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
            <h1>Place Your Order</h1>
            <p>Order delicious food and have it delivered to your door</p>
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

        <!-- Order Form -->
        <form method="POST" action="order.php">
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
                <label for="menu_items">Select Menu Item(s) *</label>
                <select id="menu_items" name="menu_items" required>
                    <option value="">-- Select Item --</option>
                    <optgroup label="Main Courses">
                        <option value="Grilled Fish" <?php echo $selected_item == 'Grilled Fish' ? 'selected' : ''; ?>>Grilled Fish (UGX 25,000)</option>
                        <option value="Fish Stew" <?php echo $selected_item == 'Fish Stew' ? 'selected' : ''; ?>>Fish Stew (UGX 20,000)</option>
                        <option value="Fried Fish" <?php echo $selected_item == 'Fried Fish' ? 'selected' : ''; ?>>Fried Fish (UGX 18,000)</option>
                        <option value="Fish Fillet with Sauce" <?php echo $selected_item == 'Fish Fillet with Sauce' ? 'selected' : ''; ?>>Fish Fillet with Sauce (UGX 22,000)</option>
                        <option value="Roasted Chicken" <?php echo $selected_item == 'Roasted Chicken' ? 'selected' : ''; ?>>Roasted Chicken (UGX 18,000)</option>
                        <option value="Grilled Chicken" <?php echo $selected_item == 'Grilled Chicken' ? 'selected' : ''; ?>>Grilled Chicken (UGX 16,000)</option>
                        <option value="Chicken Stew" <?php echo $selected_item == 'Chicken Stew' ? 'selected' : ''; ?>>Chicken Stew (UGX 15,000)</option>
                    </optgroup>
                    <optgroup label="Beverages & Drinks">
                        <option value="Fresh Orange Juice" <?php echo $selected_item == 'Fresh Orange Juice' ? 'selected' : ''; ?>>Fresh Orange Juice (UGX 4,000)</option>
                        <option value="Passion Fruit Juice" <?php echo $selected_item == 'Passion Fruit Juice' ? 'selected' : ''; ?>>Passion Fruit Juice (UGX 5,000)</option>
                        <option value="Mango Juice" <?php echo $selected_item == 'Mango Juice' ? 'selected' : ''; ?>>Mango Juice (UGX 5,000)</option>
                        <option value="Pineapple Juice" <?php echo $selected_item == 'Pineapple Juice' ? 'selected' : ''; ?>>Pineapple Juice (UGX 4,500)</option>
                        <option value="Banana Smoothie" <?php echo $selected_item == 'Banana Smoothie' ? 'selected' : ''; ?>>Banana Smoothie (UGX 6,000)</option>
                        <option value="Coca Cola" <?php echo $selected_item == 'Coca Cola' ? 'selected' : ''; ?>>Coca Cola (UGX 3,000)</option>
                        <option value="Fanta Orange" <?php echo $selected_item == 'Fanta Orange' ? 'selected' : ''; ?>>Fanta Orange (UGX 2,500)</option>
                        <option value="Sprite" <?php echo $selected_item == 'Sprite' ? 'selected' : ''; ?>>Sprite (UGX 2,500)</option>
                        <option value="Iced Tea" <?php echo $selected_item == 'Iced Tea' ? 'selected' : ''; ?>>Iced Tea (UGX 3,500)</option>
                        <option value="Water (Bottled)" <?php echo $selected_item == 'Water (Bottled)' ? 'selected' : ''; ?>>Water (Bottled) (UGX 1,500)</option>
                    </optgroup>
                    <optgroup label="Sides & Extras">
                        <option value="Ugali">Ugali (UGX 3,000)</option>
                        <option value="Rice">Rice (UGX 2,500)</option>
                        <option value="French Fries">French Fries (UGX 3,500)</option>
                        <option value="Coleslaw">Coleslaw (UGX 2,000)</option>
                        <option value="Vegetables">Vegetables (UGX 2,500)</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Delivery Address *</label>
                <textarea id="address" name="address" required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="order_date">Preferred Delivery Date *</label>
                <input type="date" id="order_date" name="order_date" required value="<?php echo isset($_POST['order_date']) ? htmlspecialchars($_POST['order_date']) : ''; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>

        <!-- Additional Information -->
        <section class="about-section">
            <h2>Ordering Made Easy</h2>
            <p>
                Ordering from MUSONI Hotel is simple and convenient! Just fill out the form above with 
                your information and select your favorite menu items. We'll prepare your order with care 
                and deliver it fresh to your doorstep.
            </p>
            <h3>How It Works:</h3>
            <ol style="margin-left: 2rem;">
                <li>Fill out the order form with your details</li>
                <li>Select your favorite menu items</li>
                <li>Choose your preferred delivery date</li>
                <li>Submit your order</li>
                <li>We'll contact you to confirm your order</li>
                <li>Enjoy your delicious meal!</li>
            </ol>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
