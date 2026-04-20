# MUSONI Hotel Website

A complete hotel restaurant website with online ordering system, user authentication, and customer management built with HTML, CSS, PHP, and MySQL.

## Project Structure

```
MUSONI-Hotel/
├── index.php              # Home page
├── about.php              # About Us page
├── menu.php               # Menu with HTML table
├── order.php              # Order form (saves to database)
├── gallery.php            # Gallery with 9+ food images (links to order)
├── contact.php            # Contact form (saves to database)
├── login.php              # User login and registration
├── view_orders.php        # View customer orders (login required)
├── logout.php             # Logout functionality
├── style.css              # Main stylesheet
├── db_config.php          # Database configuration
├── functions.php          # PHP functions for database operations
└── setup.php              # Database setup script
```

## Features

### Pages (6+)
1. **Home** - Welcome page with quick links and features
2. **About Us** - Information about the restaurant
3. **Menu** - Complete menu presented in HTML tables with categories (Fish, Drinks, Juices, etc.)
4. **Gallery** - 9 food and drink images (each links to order page)
5. **Order** - Online ordering form with database storage
6. **Contact Us** - Contact form for customer messages
7. **Login** - User registration and login system
8. **My Orders** - View customer orders (logged-in users only)

### Form Features
✓ Order Form - Collects: Full Name, Email, Phone, Menu Items, Address, Delivery Date
✓ Contact Form - Collects: Full Name, Email, Phone, Location, Message
✓ Both forms save data to MySQL database
✓ Login/Registration system with secure password hashing

### Database Features
✓ User accounts table
✓ Orders table with status tracking
✓ Contact messages table
✓ Foreign key relationships
✓ Timestamp tracking for all records

## Installation & Setup

### Prerequisites
- XAMPP or similar local server (Apache + PHP + MySQL)
- Web browser

### Step 1: Extract Files
Extract all files to: `C:\xampp\htdocs\MUSONI-Hotel`

### Step 2: Start XAMPP Services
1. Open XAMPP Control Panel
2. Start Apache
3. Start MySQL

### Step 3: Create Database
1. Open your browser and go to: `http://localhost/MUSONI-Hotel/setup.php`
2. This will create the database and all necessary tables automatically

### Step 4: Access the Website
- Open your browser and navigate to: `http://localhost/MUSONI-Hotel/`

## Database Configuration

The database automatically connects using:
- **Server:** localhost
- **Username:** root
- **Password:** (empty)
- **Database:** musoni_hotel

If your MySQL configuration is different, edit `db_config.php`:

```php
$servername = "localhost";
$username = "root";          // Change this
$password = "";              // Change this
$database = "musoni_hotel";
```

## Using the Website

### As a Customer

1. **Browse Menu**
   - Go to Menu page to see all available items in organized tables

2. **View Gallery**
   - Check the Gallery page with beautiful food and drink images
   - Click any image to go directly to the order page for that item

3. **Place an Order**
   - Go to Order page
   - Fill in your details (Full Name, Email, Phone, Address)
   - Select menu items from dropdown
   - Choose preferred delivery date
   - Submit the form
   - Order saved to database

4. **Contact Us**
   - Fill the contact form with your message
   - Message saved to database

5. **Create Account & Login**
   - Click Login link
   - Switch to Register to create new account
   - Enter credentials and register
   - Login with your username and password
   - Click "My Orders" to view your order history

6. **View Your Orders**
   - After login, go to "My Orders"
   - View all your past orders with details and status

7. **Logout**
   - Click "Logout" in the top right corner

### As Admin/Manager (Database Access)

Access MySQL database using:
- phpMyAdmin: `http://localhost/phpmyadmin`
- Database: `musoni_hotel`

**Tables:**
- `users` - Customer accounts
- `orders` - Customer orders with status
- `contact_messages` - Contact form submissions

Update order status by modifying the `status` field in the `orders` table:
- Pending (default)
- Confirmed
- Delivered
- Cancelled

## Navigation Structure

All pages include:
- Header with logo and navigation menu
- Links to all 6 main pages
- User section showing login/user profile
- Footer with contact information

## Styling

- **Color Scheme:** Purple/Blue gradient (#667eea - #764ba2)
- **Responsive Design:** Works on desktop, tablet, and mobile
- **Tables:** Styled with hover effects
- **Forms:** Clean, professional appearance with validation feedback
- **Gallery:** Grid layout that adapts to screen size

## Security Features

✓ Password hashing using PHP's `password_hash()`
✓ Input validation and sanitization
✓ SQL injection prevention using `real_escape_string()`
✓ Session-based user authentication
✓ Protected pages (My Orders requires login)

## File Descriptions

| File | Purpose |
|------|---------|
| `index.php` | Home page with hero section and quick links |
| `about.php` | Restaurant information and features |
| `menu.php` | Complete menu in HTML tables with prices |
| `gallery.php` | Photo gallery with order links |
| `order.php` | Order form with database saving |
| `contact.php` | Contact form with database saving |
| `login.php` | Login and registration system |
| `view_orders.php` | Display user's orders (protected) |
| `logout.php` | Logout and session destruction |
| `db_config.php` | Database connection configuration |
| `functions.php` | PHP helper functions for database operations |
| `style.css` | Complete website styling |
| `setup.php` | Database and tables creation script |

## Sample Test Data

### Test Menu Items Available:
- Grilled Fish (UGX 25,000)
- Fish Stew (UGX 20,000)
- Fried Fish (UGX 18,000)
- Roasted Chicken (UGX 18,000)
- Fresh Orange Juice (UGX 4,000)
- Banana Smoothie (UGX 6,000)
- French Fries (UGX 3,500)

### Test Account Creation:
1. Go to Login page
2. Click "Register here"
3. Create an account with test credentials
4. Login and place orders

## Troubleshooting

### Database Connection Error
- Make sure MySQL is running in XAMPP
- Check `db_config.php` has correct credentials
- Run `setup.php` again to recreate tables

### Images Not Showing
- Gallery uses placeholder images from `via.placeholder.com`
- To use real images, replace image URLs in `gallery.php`

### Forms Not Submitting
- Make sure MySQL database exists
- Check browser console for errors
- Verify database tables were created via setup.php

### Login Not Working
- Ensure user was registered successfully
- Check correct username and password
- Clear browser cookies and try again

## Future Enhancements

- Add image upload functionality
- Implement email notifications
- Add payment gateway integration
- Create admin dashboard for order management
- Add customer reviews and ratings
- Implement search and filter features
- Add social media integration
- Mobile app version

## Support

For issues or questions, contact: info@musonihotel.com

---

**Created:** April 2026
**Version:** 1.0
**License:** Free to use and modify
