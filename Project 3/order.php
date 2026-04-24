<?php
session_start();
include 'db.php';

$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
$customer_name = isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : null;
$customer_email = isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : null;

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $menu_item = $_POST['menu_item'] ?? '';
    $address = $_POST['address'] ?? '';
    $order_date = $_POST['order_date'] ?? '';
    $customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
    
    if ($full_name && $email && $phone && $menu_item && $address && $order_date) {
        if ($customer_id) {
            $stmt = $conn->prepare("INSERT INTO orders (customer_id, full_name, email, phone, menu_item, address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssss", $customer_id, $full_name, $email, $phone, $menu_item, $address, $order_date);
        } else {
            $stmt = $conn->prepare("INSERT INTO orders (full_name, email, phone, menu_item, address, order_date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $full_name, $email, $phone, $menu_item, $address, $order_date);
        }
        
        if ($stmt->execute()) {
            $message = "Order placed successfully! We will contact you shortly.";
            $message_type = 'success';
        } else {
            $message = "Error placing order. Please try again. " . $stmt->error;
            $message_type = 'error';
        }
    } else {
        $message = "Please fill in all required fields.";
        $message_type = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Palace Hotel - Order</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="nav-container">
            <div class="logo">Grand<span>Palace</span></div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="about.php" class="nav-link"><i class="fas fa-info-circle"></i><span>About</span></a></li>
                <li><a href="menu.php" class="nav-link"><i class="fas fa-utensils"></i><span>Menu</span></a></li>
                <li><a href="gallery.php" class="nav-link"><i class="fas fa-images"></i><span>Gallery</span></a></li>
                <li><a href="order.php" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Order</span></a></li>
                <li><a href="contact.php" class="nav-link"><i class="fas fa-envelope"></i><span>Contact</span></a></li>
            </ul>
            <?php if (isset($_SESSION['customer_name'])): ?>
            <div class="user-dropdown">
                <div class="user-dropdown-toggle">
                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
                    <span class="chevron"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="user-dropdown-menu">
                    <div class="dropdown-header">
                        <span class="user-name-display"><?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
                        <span class="user-email-display"><?php echo htmlspecialchars($_SESSION['customer_email']); ?></span>
                    </div>
                    <a href="profile.php" class="dropdown-item">Edit Profile</a>
                    <a href="orders.php" class="dropdown-item">My Orders</a>
                    <a href="logout.php" class="dropdown-item logout">Logout</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <section class="section" style="padding-top: 80px;">
        <div class="container">
            <div class="section-title">
                <h2>Order Online</h2>
                <p>Place your order for delivery or pickup</p>
            </div>
            
            <?php if ($message): ?>
            <div class="form-message <?php echo $message_type; ?>" id="successMessage">
                <?php echo $message; ?>
            </div>
            <?php if ($message_type === 'success'): ?>
            <script>
                setTimeout(function() {
                    var msg = document.getElementById('successMessage');
                    if (msg) msg.style.display = 'none';
                }, 5000);
            </script>
            <?php endif; ?>
            <?php endif; ?>
            
            <?php if (!$customer_id): ?>
            <div class="login-container">
                <div class="login-card">
                    <h2>Login to Place your Order</h2>
                    
                    <?php if ($message): ?>
                    <div class="form-message <?php echo $message_type; ?>" style="margin-bottom: 15px;">
                        <?php echo $message; ?>
                    </div>
                    <?php if ($redirect): ?>
                    <script>
                        setTimeout(function() {
                            window.location.href = 'orders.php';
                        }, 2000);
                    </script>
                    <?php endif; ?>
                    <?php endif; ?>
                    
                    <form method="POST" action="login.php" id="loginForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                        <span class="forgot-password">Forgot password? <a href="forgot_password.php">Click here</a></span>
                    </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="order-container">
                <div style="text-align: center; margin-bottom: 20px;">
                    <a href="orders.php" class="btn" style="margin-right: 10px;">View My Orders</a>
                </div>
                
                <form method="POST" action="order.php" id="orderForm">
                    <div class="service-card" style="border: 1px solid var(--border);">
                        <h3 style="color: var(--secondary); margin-bottom: 15px; text-align: center;">Order Form</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Full Name *</label>
                                <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($customer_name); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($customer_email); ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="tel" name="phone" class="form-control"  required>
                            </div>
                            
                            <div class="form-group">
                                <label>Select Menu Item *</label>
                                <select name="menu_item" class="form-control" required>
                                    <option value="">-- Select --</option>
                                    <optgroup label="Fish">
                                        <option value="Grilled Salmon - $45">Grilled Salmon - $45</option>
                                        <option value="Fried Tilapia - $30">Fried Tilapia - $30</option>
                                        <option value="Fish Curry - $35">Fish Curry - $35</option>
                                        <option value="Prawns Special - $50">Prawns Special - $50</option>
                                        <option value="Lobster Delight - $75">Lobster Delight - $75</option>
                                        <option value="Grilled Catfish - $38">Grilled Catfish - $38</option>
                                    </optgroup>
                                    <optgroup label="Drinks">
                                        <option value="Red Wine - $25">Red Wine - $25</option>
                                        <option value="White Wine - $22">White Wine - $22</option>
                                        <option value="Whiskey Premium - $18">Whiskey Premium - $18</option>
                                        <option value="Cocktail Special - $15">Cocktail Special - $15</option>
                                        <option value="Beer Selection - $8">Beer Selection - $8</option>
                                        <option value="Coffee Latte - $8">Coffee Latte - $8</option>
                                    </optgroup>
                                    <optgroup label="Fresh Juice">
                                        <option value="Orange Juice - $6">Orange Juice - $6</option>
                                        <option value="Mango Juice - $7">Mango Juice - $7</option>
                                        <option value="Pineapple Juice - $6">Pineapple Juice - $6</option>
                                        <option value="Watermelon Juice - $6">Watermelon Juice - $6</option>
                                        <option value="Mixed Berry Smoothie - $9">Mixed Berry Smoothie - $9</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Delivery Address *</label>
                                <textarea name="address" class="form-control" rows="1" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Order Date *</label>
                                <input type="date" name="order_date" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" name="place_order" class="btn btn-primary">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>Grand Palace Hotel</h3>
                    <p>Experience luxury like never before.</p>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="order.php">Order</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> KG 123 Street, City</p>
                    <p><i class="fas fa-phone"></i> +250 791 783 308</p>
                    <p><i class="fas fa-envelope"></i> evode@grandpalace.com</p>
                </div>
                <div class="footer-social">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Grand Palace Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>