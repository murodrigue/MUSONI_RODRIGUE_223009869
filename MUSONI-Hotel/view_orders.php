<?php
session_start();
include 'db_config.php';
include 'functions.php';

// Check if user is logged in
if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

// Get user's orders
$user_id = $_SESSION['user_id'];
$orders = getUserOrders($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - MUSONI Hotel</title>
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
            <h1>My Orders</h1>
            <p>View all your orders and their status</p>
        </section>

        <!-- Orders Section -->
        <?php if (count($orders) > 0): ?>
            <section class="about-section">
                <h2>Your Order History</h2>
                <p>Welcome back, <?php echo $_SESSION['full_name']; ?>! Here are all your orders:</p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Menu Items</th>
                            <th>Delivery Date</th>
                            <th>Delivery Address</th>
                            <th>Status</th>
                            <th>Ordered On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td>#<?php echo $order['id']; ?></td>
                                <td><?php echo htmlspecialchars($order['menu_items']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($order['order_date'])); ?></td>
                                <td><?php echo htmlspecialchars($order['address']); ?></td>
                                <td>
                                    <?php 
                                        $status = $order['status'];
                                        $status_color = '';
                                        if ($status == 'Pending') $status_color = 'style="color: orange; font-weight: bold;"';
                                        elseif ($status == 'Confirmed') $status_color = 'style="color: blue; font-weight: bold;"';
                                        elseif ($status == 'Delivered') $status_color = 'style="color: green; font-weight: bold;"';
                                        elseif ($status == 'Cancelled') $status_color = 'style="color: red; font-weight: bold;"';
                                    ?>
                                    <span <?php echo $status_color; ?>><?php echo $status; ?></span>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <section class="about-section">
                <h2>Order Details</h2>
                <?php foreach ($orders as $order): ?>
                    <div class="card">
                        <h3>Order #<?php echo $order['id']; ?></h3>
                        <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($order['full_name']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($order['email']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
                        <p><strong>Menu Items:</strong> <?php echo htmlspecialchars($order['menu_items']); ?></p>
                        <p><strong>Delivery Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
                        <p><strong>Preferred Delivery Date:</strong> <?php echo date('d/m/Y', strtotime($order['order_date'])); ?></p>
                        <p><strong>Status:</strong> <span style="font-weight: bold; color: 
                            <?php 
                                if ($order['status'] == 'Pending') echo 'orange';
                                elseif ($order['status'] == 'Confirmed') echo 'blue';
                                elseif ($order['status'] == 'Delivered') echo 'green';
                                elseif ($order['status'] == 'Cancelled') echo 'red';
                            ?>
                        "><?php echo $order['status']; ?></span></p>
                        <p><strong>Ordered On:</strong> <?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></p>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php else: ?>
            <section class="about-section">
                <div class="alert alert-warning">
                    <strong>No Orders Yet!</strong> You haven't placed any orders yet. 
                    <a href="order.php" class="btn btn-primary" style="display: inline-block; margin-top: 1rem;">Place an Order Now</a>
                </div>
            </section>
        <?php endif; ?>

        <!-- Action Links -->
        <section class="about-section" style="text-align: center;">
            <a href="order.php" class="btn btn-primary" style="margin-right: 1rem;">Place a New Order</a>
            <a href="logout.php" class="btn btn-secondary">Logout</a>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
