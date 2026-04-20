# MUSONI Hotel - Quick Start Guide

## 🚀 Quick Setup (5 minutes)

### 1. Start Your Server
```
1. Open XAMPP Control Panel
2. Click "Start" next to Apache
3. Click "Start" next to MySQL
```

### 2. Initialize Database
```
1. Open browser
2. Go to: http://localhost/MUSONI-Hotel/setup.php
3. Wait for success message ✓
```

### 3. Access the Website
```
Open: http://localhost/MUSONI-Hotel/
```

---

## 📖 Website Navigation Guide

### Main Menu (Available on all pages)
- **Home** → Welcome & quick links
- **About Us** → Restaurant information
- **Menu** → All available dishes & prices
- **Gallery** → Food images (clickable links to order)
- **Contact Us** → Send messages & get info

### Customer Features

#### 1. Browse & Order
```
Gallery → Click image → Order page → Fill form → Submit
```

#### 2. Create Account
```
Login → Register → Fill details → Create account
```

#### 3. Place Order (Logged In)
```
Order page → Fill form → Select items → Submit → View in "My Orders"
```

#### 4. View Orders
```
After Login → Click "My Orders" → See all your orders & status
```

#### 5. Contact Us
```
Contact page → Fill form → Submit → Message saved to database
```

---

## 🗂️ File Organization

```
✓ index.php          - Home page
✓ about.php          - About Us
✓ menu.php           - Menu (HTML Tables)
✓ gallery.php        - Gallery (9+ images)
✓ order.php          - Order Form
✓ contact.php        - Contact Form
✓ login.php          - Login & Register
✓ view_orders.php    - My Orders (Protected)
✓ logout.php         - Logout link
✓ style.css          - All styling
✓ db_config.php      - Database connection
✓ functions.php      - Database functions
✓ setup.php          - Initialize database
```

---

## 📋 Forms & Data Collection

### Order Form Fields
- Full Name ✓
- Email ✓
- Phone ✓
- Menu Items (Dropdown) ✓
- Delivery Address ✓
- Preferred Date ✓

**Auto Features:**
- Validates all fields
- Checks email format
- Prevents past dates
- Shows success/error message
- Saves to database

### Contact Form Fields
- Full Name ✓
- Email ✓
- Phone ✓
- Location (Optional) ✓
- Message ✓

### Registration Form Fields
- Full Name ✓
- Username ✓
- Email ✓
- Password ✓
- Confirm Password ✓

---

## 🗄️ Database Structure

### Users Table
```
- id (Primary Key)
- username (Unique)
- password (Hashed)
- email
- full_name
- created_at (Timestamp)
```

### Orders Table
```
- id (Primary Key)
- user_id (Foreign Key)
- full_name
- email
- phone
- menu_items
- address
- order_date
- created_at (Timestamp)
- status (Pending/Confirmed/Delivered/Cancelled)
```

### Contact Messages Table
```
- id (Primary Key)
- full_name
- email
- phone
- location
- message
- created_at (Timestamp)
```

---

## 🎨 Design Features

✓ Responsive design (mobile, tablet, desktop)
✓ Purple/blue modern color scheme
✓ Professional styling on all pages
✓ Interactive hover effects
✓ Form validation feedback
✓ Success/error alert messages
✓ Clean navigation
✓ Footer on every page

---

## 🔐 Security Features

✓ Password hashing
✓ Input validation
✓ SQL injection prevention
✓ Session-based authentication
✓ Protected pages (login required)

---

## 📱 Testing the Features

### Test Scenario 1: Browse & View Menu
```
1. Go to home page
2. Click "Menu" → See all items in tables
3. Click "Gallery" → See food images
4. Click any image → Goes to order page
✓ Works!
```

### Test Scenario 2: Place Order (Guest)
```
1. Go to Order page
2. Fill all fields
3. Select menu item
4. Click Submit
5. See success message
✓ Check database for order!
```

### Test Scenario 3: Create Account & Login
```
1. Go to Login page
2. Click "Register here"
3. Fill registration form (new username)
4. Click Register
5. Login with new credentials
6. See "Welcome [name]!" message
✓ Account created!
```

### Test Scenario 4: View Orders
```
1. After login, click "My Orders"
2. See all previous orders
3. See order details
4. See delivery status
✓ Orders displayed!
```

### Test Scenario 5: Contact Us
```
1. Go to Contact Us page
2. Fill contact form
3. Click Send Message
4. See success message
✓ Check database!
```

### Test Scenario 6: Logout
```
1. Click "Logout" (top right)
2. Redirected to home page
3. Login link appears again
✓ Logged out!
```

---

## 🐛 Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| Can't connect to database | Make sure MySQL is running in XAMPP |
| Forms not saving | Run setup.php again to verify tables exist |
| Login page not working | Check username/password in database |
| Gallery images not showing | They use placeholder service (normal) |
| Can't access My Orders | Must be logged in first |
| Database already exists error | Database already created (OK) |

---

## 📊 Menu Categories

### Main Courses
- Grilled Fish (UGX 25,000)
- Fish Stew (UGX 20,000)
- Fried Fish (UGX 18,000)
- Fish Fillet with Sauce (UGX 22,000)
- Roasted Chicken (UGX 18,000)
- Grilled Chicken (UGX 16,000)
- Chicken Stew (UGX 15,000)

### Beverages & Drinks
- Fresh Orange Juice (UGX 4,000)
- Passion Fruit Juice (UGX 5,000)
- Mango Juice (UGX 5,000)
- Pineapple Juice (UGX 4,500)
- Banana Smoothie (UGX 6,000)
- Coca Cola (UGX 3,000)
- Fanta Orange (UGX 2,500)
- Sprite (UGX 2,500)
- Iced Tea (UGX 3,500)
- Water - Bottled (UGX 1,500)

### Sides & Extras
- Ugali (UGX 3,000)
- Rice (UGX 2,500)
- French Fries (UGX 3,500)
- Coleslaw (UGX 2,000)
- Vegetables (UGX 2,500)

---

## 🔄 User Flow Diagram

```
┌─────────────┐
│   Home Page │
└──────┬──────┘
       │
   ┌───┴─────────────────────────────────┐
   │                                     │
   ▼                                     ▼
┌─────────┐                          ┌──────────┐
│ Browse  │ ─ Menu ──→ ┌──────────┐  │ Register │
│Content  │            │  Gallery │  │  / Login │
│         │ ─ About ──►└──────────┘  └──────────┘
│         │                               │
└─────────┘                               ▼
   │                                ┌──────────┐
   │                                │My Account│
   │                                └──────────┘
   │                                   │   │
   ▼                                   ▼   ▼
┌────────────┐                    ┌────────────────┐
│ Contact Us │─────────────────► │ Place Orders   │
│   (Form)   │ (redirect)        │ View Orders    │
└────────────┘                    └────────────────┘
```

---

## 💡 Tips

✓ Refresh page after submitting forms to see updates
✓ Use browser developer tools (F12) to check for errors
✓ Check database in phpMyAdmin to verify data saving
✓ Test on different devices to see responsive design
✓ Clear browser history if having login issues

---

## 📞 Contact Information

- **Email:** info@musonihotel.com
- **Phone:** +256-XXX-XXX-XXX (For inquiries)
- **Address:** Kampala, Uganda
- **Hours:** 9:00 AM - 10:00 PM (Mon-Sun)

---

**Version:** 1.0 | **Created:** April 2026 | **Status:** ✓ Complete
