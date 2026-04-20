<?php
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - MUSONI Hotel</title>
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
            <h1>About MUSONI Hotel</h1>
            <p>Your Premier Dining Destination</p>
        </section>

        <!-- About Section 1 -->
        <section class="about-section">
            <h2>Our Story</h2>
            <p>
                MUSONI Hotel was founded with a vision to bring authentic culinary experiences to our 
                community. Starting as a small family-run establishment, we have grown into one of the 
                most respected dining destinations in the region. Our journey has been marked by a 
                commitment to excellence, quality, and customer satisfaction.
            </p>
            <p>
                Over the years, we have perfected the art of food preparation, combining traditional 
                recipes with innovative cooking techniques. Our passion for food is evident in every 
                dish we serve, and our dedication to our customers drives everything we do.
            </p>
        </section>

        <!-- About Section 2 -->
        <section class="about-section">
            <h2>Our Mission</h2>
            <p>
                Our mission is to provide exceptional dining experiences by serving high-quality, 
                delicious food in a warm and welcoming atmosphere. We believe that great food brings 
                people together, and we are committed to creating memorable moments for our customers.
            </p>
            <p>
                We take pride in sourcing the finest ingredients, training our staff to deliver 
                exceptional service, and continuously improving our offerings to meet the evolving 
                tastes and preferences of our valued customers.
            </p>
        </section>

        <!-- About Section 3 -->
        <section class="about-section">
            <h2>Why Choose MUSONI Hotel?</h2>
            <ul style="margin-left: 2rem;">
                <li><strong>Quality Ingredients:</strong> We source only the freshest and finest ingredients from trusted suppliers.</li>
                <li><strong>Expert Chefs:</strong> Our team of experienced chefs bring passion and expertise to every dish.</li>
                <li><strong>Diverse Menu:</strong> From traditional favorites to innovative creations, we offer something for everyone.</li>
                <li><strong>Exceptional Service:</strong> Our friendly and attentive staff ensure your dining experience is memorable.</li>
                <li><strong>Online Ordering:</strong> Convenient online ordering system for delivery or pickup.</li>
                <li><strong>Hygienic Practices:</strong> We maintain the highest standards of food safety and hygiene.</li>
                <li><strong>Competitive Pricing:</strong> Premium quality meals at affordable prices.</li>
            </ul>
        </section>

        <!-- Team Section -->
        <section class="about-section">
            <h2>Our Team</h2>
            <p>
                At MUSONI Hotel, we have a dedicated team of professionals committed to delivering 
                the best service possible. From our talented chefs to our courteous waitstaff, every 
                member of our team plays a vital role in creating an exceptional dining experience.
            </p>
        </section>

        <!-- Contact Information -->
        <section class="about-section">
            <h2>Get in Touch</h2>
            <p>
                We would love to hear from you! For inquiries, reservations, or feedback, please don't 
                hesitate to contact us.
            </p>
            <p>
                <strong>Email:</strong> info@musonihotel.com<br>
                <strong>Phone:</strong> +256-XXX-XXX-XXX<br>
                <strong>Address:</strong> Kampala, Uganda
            </p>
            <a href="contact.php" class="btn btn-primary">Send us a Message</a>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 MUSONI Hotel. All rights reserved.</p>
        <p>Email: info@musonihotel.com | Phone: +256-XXX-XXX-XXX</p>
    </footer>
</body>
</html>
