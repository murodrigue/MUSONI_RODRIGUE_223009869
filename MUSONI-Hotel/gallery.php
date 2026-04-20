<?php
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - MUSONI Hotel</title>
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
            <h1>Our Gallery</h1>
            <p>Delicious Food & Drinks - Click on any image to place an order</p>
        </section>

        <!-- Gallery Grid -->
        <section class="gallery">
            <!-- Item 1: Grilled Fish -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=400&h=300&fit=crop" alt="Grilled Fish">
                <div class="gallery-caption">
                    <h3>Grilled Fish</h3>
                    <p>Fresh tilapia grilled to perfection</p>
                </div>
                <a href="order.php?item=Grilled Fish">Order This Dish</a>
            </div>

            <!-- Item 2: Roasted Chicken -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1598103442097-8b74394b95c6?w=400&h=300&fit=crop" alt="Roasted Chicken">
                <div class="gallery-caption">
                    <h3>Roasted Chicken</h3>
                    <p>Succulent roasted chicken with spices</p>
                </div>
                <a href="order.php?item=Roasted Chicken">Order This Dish</a>
            </div>

            <!-- Item 3: Fresh Orange Juice -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1600271886742-f049cd451bba?w=400&h=300&fit=crop" alt="Fresh Orange Juice">
                <div class="gallery-caption">
                    <h3>Fresh Orange Juice</h3>
                    <p>Freshly squeezed orange juice</p>
                </div>
                <a href="order.php?item=Fresh Orange Juice">Order This Drink</a>
            </div>

            <!-- Item 4: Fish Stew -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1559847844-5315695dadae?w=400&h=300&fit=crop" alt="Fish Stew">
                <div class="gallery-caption">
                    <h3>Fish Stew</h3>
                    <p>Tender fish in rich tomato sauce</p>
                </div>
                <a href="order.php?item=Fish Stew">Order This Dish</a>
            </div>

            <!-- Item 5: Banana Smoothie -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1553909489-cd47e7ef79fc?w=400&h=300&fit=crop" alt="Banana Smoothie">
                <div class="gallery-caption">
                    <h3>Banana Smoothie</h3>
                    <p>Creamy banana smoothie with milk</p>
                </div>
                <a href="order.php?item=Banana Smoothie">Order This Drink</a>
            </div>

            <!-- Item 6: Fried Fish -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=400&h=300&fit=crop" alt="Fried Fish">
                <div class="gallery-caption">
                    <h3>Fried Fish</h3>
                    <p>Crispy fried fish with vegetables</p>
                </div>
                <a href="order.php?item=Fried Fish">Order This Dish</a>
            </div>

            <!-- Item 7: Chicken Stew -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1532634726-8b3d5d5e0c0e?w=400&h=300&fit=crop" alt="Chicken Stew">
                <div class="gallery-caption">
                    <h3>Chicken Stew</h3>
                    <p>Slow-cooked chicken in rich sauce</p>
                </div>
                <a href="order.php?item=Chicken Stew">Order This Dish</a>
            </div>

            <!-- Item 8: Mango Juice -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1553909489-cd47e7ef79fc?w=400&h=300&fit=crop" alt="Mango Juice">
                <div class="gallery-caption">
                    <h3>Mango Juice</h3>
                    <p>Sweet and creamy mango juice</p>
                </div>
                <a href="order.php?item=Mango Juice">Order This Drink</a>
            </div>

            <!-- Item 9: French Fries -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=400&h=300&fit=crop" alt="French Fries">
                <div class="gallery-caption">
                    <h3>French Fries</h3>
                    <p>Crispy golden french fries</p>
                </div>
                <a href="order.php?item=French Fries">Order This Dish</a>
            </div>
        </section>

        <!-- Additional Information -->
        <section class="about-section" style="margin-top: 2rem;">
            <h2>More About Our Food</h2>
            <p>
                All our dishes are prepared fresh using high-quality ingredients. Our chefs take 
                pride in creating meals that not only taste delicious but are also visually appealing. 
                Whether you're looking for traditional favorites or trying something new, our gallery 
                showcases just a small selection of the culinary delights we have to offer.
            </p>
            <p>
                Each item in our gallery represents hours of culinary expertise and passion for food. 
                We invite you to experience the difference that quality ingredients and careful preparation 
                can make.
            </p>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
