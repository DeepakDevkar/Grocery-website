
# 🛍️ PHP Product Display & Cart System

This project is a lightweight e-commerce style platform built using PHP, MySQL, HTML/CSS, and JavaScript. Users can browse products, add them to a cart, and proceed to place an order using a QR-based order form.

---

## 📦 Features

- ✅ Display products dynamically from a database
- 🆕 “New Products” section
- 🛒 Add to Cart functionality for each product
- 📥 Session-based cart management
- 📱 Mobile number and address input for checkout
- 📸 QR Code payment system
- ✅ Order placed animation + redirect
- 💚 Clean, responsive design

---

## 📁 Folder Structure

```
project-root/
│
├── testing.php               # Main product display page
├── fetch_products.php        # Fetches product data from the database
├── add_product.php           # Admin-side product adder (optional)
├── add_to_cart.php           # Handles adding items to session cart
├── order_page.php            # QR + order form + animation
├── style.css                 # Custom styles
├── script.js                 # JS for interactivity
├── db_connection.php         # MySQL DB connection
└── uploads/                  # Product images
```

---

## 🛠️ Technologies Used

- **PHP** (core logic)
- **MySQL** (database for products)
- **HTML/CSS** (frontend layout)
- **JavaScript** (interactions, animations)
- **Session Storage** (for cart)

---

## 🚀 How to Run

1. Clone or download the project files.
2. Import `products` table in your MySQL database.
3. Make sure `db_connection.php` contains your DB credentials.
4. Start a local server (e.g., XAMPP, WAMP, MAMP).
5. Open `testing.php` in your browser.

---

## 🧾 Sample Flow

1. User views the **New Products** section.
2. Clicks **Add to Cart** → stored in session.
3. Clicks on **Cart Icon** → Shows QR page + form.
4. Fills in details and clicks **Place Order**.
5. ✅ Checkmark animation plays and redirects to `testing.php`.

---

## 🎨 Screenshots

![Cart Functionality](uploads/grocy.jpg)
---

## 📌 Notes

- All cart data is stored using PHP sessions.
- You can enhance the cart by adding quantities and a remove option.
- Secure against double additions using a simple `in_array()` check.

---

## 📧 Contact

Made with ❤️ by [Deepak Devkar]  
Feel free to connect or suggest improvements!
