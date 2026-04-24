<?php
session_start();
include 'db.php';

$message = '';
$message_type = '';

if (isset($_SESSION['registration_success'])) {
    $message = $_SESSION['registration_success'];
    $message_type = 'success';
    unset($_SESSION['registration_success']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($email && $password) {
        $stmt = $conn->prepare("SELECT id, full_name, password FROM customers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password']) || $password === $row['password']) {
                $_SESSION['customer_id'] = $row['id'];
                $_SESSION['customer_name'] = $row['full_name'];
                $_SESSION['customer_email'] = $email;
                
                // success message before redirect
                $message = "Login successful! Welcome, " . $row['full_name'] . "! Redirecting...";
                $message_type = 'success';
                $redirect = true;
            } else {
                $message = "Invalid password. Please try again.";
                $message_type = 'error';
            }
        } else {
            $message = "No account found with this email. Please register first.";
            $message_type = 'error';
        }
    } else {
        $message = "Please enter both email and password.";
        $message_type = 'error';
    }
}

$redirect = isset($redirect) && isset($_SESSION['customer_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Palace Hotel - Login</title>
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

    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-card">
                    <h2>Login to Your Account</h2>
                    
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="menu.html">Menu</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="order.php">Order</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Luxury Street, City</p>
                    <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                    <p><i class="fas fa-envelope"></i> info@grandparadize.com</p>
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
                <p>&copy; 2024 Grand Paradize Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>