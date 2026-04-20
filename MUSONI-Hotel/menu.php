<?php
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - MUSONI Hotel</title>
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
            <h1>Our Menu</h1>
            <p>Choose from our delicious variety of dishes</p>
        </section>

        <!-- Main Courses Section -->
        <section class="about-section">
            <h2>Main Courses</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Price (UGX)</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Grilled Fish</td>
                        <td>Fresh tilapia grilled to perfection with herbs and spices</td>
                        <td>25,000</td>
                        <td>Fish</td>
                    </tr>
                    <tr>
                        <td>Fish Stew</td>
                        <td>Tender fish in rich tomato and onion sauce</td>
                        <td>20,000</td>
                        <td>Fish</td>
                    </tr>
                    <tr>
                        <td>Fried Fish</td>
                        <td>Crispy fried fish served with vegetables</td>
                        <td>18,000</td>
                        <td>Fish</td>
                    </tr>
                    <tr>
                        <td>Fish Fillet with Sauce</td>
                        <td>Delicate fish fillet with creamy white sauce</td>
                        <td>22,000</td>
                        <td>Fish</td>
                    </tr>
                    <tr>
                        <td>Roasted Chicken</td>
                        <td>Succulent roasted chicken with a blend of spices</td>
                        <td>18,000</td>
                        <td>Poultry</td>
                    </tr>
                    <tr>
                        <td>Grilled Chicken</td>
                        <td>Chargrilled chicken breast with herbs</td>
                        <td>16,000</td>
                        <td>Poultry</td>
                    </tr>
                    <tr>
                        <td>Chicken Stew</td>
                        <td>Slow-cooked chicken in rich sauce</td>
                        <td>15,000</td>
                        <td>Poultry</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Beverages Section -->
        <section class="about-section">
            <h2>🥤 Beverages & Drinks</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Price (UGX)</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fresh Orange Juice</td>
                        <td>Freshly squeezed orange juice</td>
                        <td>4,000</td>
                        <td>Fresh Juice</td>
                    </tr>
                    <tr>
                        <td>Passion Fruit Juice</td>
                        <td>Tangy and refreshing passion fruit juice</td>
                        <td>5,000</td>
                        <td>Fresh Juice</td>
                    </tr>
                    <tr>
                        <td>Mango Juice</td>
                        <td>Sweet and creamy mango juice</td>
                        <td>5,000</td>
                        <td>Fresh Juice</td>
                    </tr>
                    <tr>
                        <td>Pineapple Juice</td>
                        <td>Tropical pineapple juice</td>
                        <td>4,500</td>
                        <td>Fresh Juice</td>
                    </tr>
                    <tr>
                        <td>Banana Smoothie</td>
                        <td>Creamy banana smoothie with milk</td>
                        <td>6,000</td>
                        <td>Juice/Smoothie</td>
                    </tr>
                    <tr>
                        <td>Coca Cola</td>
                        <td>Cold Coca Cola</td>
                        <td>3,000</td>
                        <td>Soft Drink</td>
                    </tr>
                    <tr>
                        <td>Fanta Orange</td>
                        <td>Refreshing Fanta Orange</td>
                        <td>2,500</td>
                        <td>Soft Drink</td>
                    </tr>
                    <tr>
                        <td>Sprite</td>
                        <td>Lemon-lime flavored soda</td>
                        <td>2,500</td>
                        <td>Soft Drink</td>
                    </tr>
                    <tr>
                        <td>Iced Tea</td>
                        <td>Cold refreshing iced tea</td>
                        <td>3,500</td>
                        <td>Drink</td>
                    </tr>
                    <tr>
                        <td>Water (Bottled)</td>
                        <td>Pure bottled water</td>
                        <td>1,500</td>
                        <td>Drink</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Sides & Extras Section -->
        <section class="about-section">
            <h2>🥗 Sides & Extras</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Price (UGX)</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ugali</td>
                        <td>Traditional corn meal staple</td>
                        <td>3,000</td>
                        <td>Sides</td>
                    </tr>
                    <tr>
                        <td>Rice</td>
                        <td>Steamed white rice</td>
                        <td>2,500</td>
                        <td>Sides</td>
                    </tr>
                    <tr>
                        <td>French Fries</td>
                        <td>Crispy golden french fries</td>
                        <td>3,500</td>
                        <td>Sides</td>
                    </tr>
                    <tr>
                        <td>Coleslaw</td>
                        <td>Fresh vegetable coleslaw</td>
                        <td>2,000</td>
                        <td>Sides</td>
                    </tr>
                    <tr>
                        <td>Vegetables</td>
                        <td>Steamed seasonal vegetables</td>
                        <td>2,500</td>
                        <td>Sides</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Call to Action -->
        <section style="text-align: center; margin: 2rem 0;">
            <h2 style="color: #667eea;">Ready to Order?</h2>
            <p>Browse our gallery and place your order online. We'll deliver it fresh to your door!</p>
            <a href="gallery.php" class="btn btn-primary" style="margin-right: 1rem;">View Gallery</a>
            <a href="order.php" class="btn btn-secondary">Place Order</a>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
