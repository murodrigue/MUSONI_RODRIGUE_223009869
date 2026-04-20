<?php
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUSONI Hotel - Welcome</title>
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
        <!-- Hero Section -->
        <section class="hero">
            <h1>Welcome to MUSONI Hotel</h1>
            <p>Experience the finest dining with authentic flavors and exceptional service</p>
            <a href="order.php" class="btn btn-secondary">Order Food Now</a>
        </section>

        <!-- About Brief -->
        <section class="about-section">
            <h2>Welcome to Our Restaurant</h2>
            <p>
                MUSONI Hotel is a premier dining destination offering a variety of delicious meals, 
                refreshing drinks, and freshly made juices. Our menu has been carefully curated to 
                satisfy every palate, combining traditional flavors with modern culinary techniques.
            </p>
            <p>
                We are committed to providing the highest quality food, excellent customer service, 
                and a welcoming atmosphere for all our guests. Whether you're looking for a casual meal 
                or a special dining experience, MUSONI Hotel is your perfect destination.
            </p>
            <a href="about.php" class="btn btn-primary">Learn More About Us</a>
        </section>

        <!-- Quick Links -->
        <section>
            <h2 style="text-align: center; margin: 2rem 0; color: #667eea;">Explore Our Offerings</h2>
            <div class="gallery" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); margin-bottom: 2rem;">
                <div class="card">
                    <h3>Delicious Menu</h3>
                    <p>Browse our diverse menu featuring fish, drinks, fresh juices, and more.</p>
                    <a href="menu.php" class="btn btn-primary">View Menu</a>
                </div>
                <div class="card">
                    <h3>Gallery</h3>
                    <p>Check out beautiful photos of our delicious food and drinks.</p>
                    <a href="gallery.php" class="btn btn-primary">View Gallery</a>
                </div>
                <div class="card">
                    <h3>Place an Order</h3>
                    <p>Order your favorite food online and have it delivered to your address.</p>
                    <a href="order.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section>
            <div class="gallery" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                <div class="card">
                    <h3>Quality Assurance</h3>
                    <p>We use only the best ingredients to prepare our meals.</p>
                </div>
                <div class="card">
                    <h3>Fast Delivery</h3>
                    <p>Quick and reliable delivery service to your doorstep.</p>
                </div>
                <div class="card">
                    <h3>Customer Satisfaction</h3>
                    <p>Your satisfaction is our top priority. We ensure the best dining experience.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
