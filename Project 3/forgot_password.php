<?php
session_start();
include 'db.php';

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    
    if ($email) {
        $stmt = $conn->prepare("SELECT id, full_name FROM customers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $new_password = substr(md5(time()), 0, 8);
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            $update_stmt = $conn->prepare("UPDATE customers SET password = ? WHERE email = ?");
            $update_stmt->bind_param("ss", $hashed_password, $email);
            
            if ($update_stmt->execute()) {
                $message = "Your new password is: <strong>" . $new_password . "</strong>. Please login and change it.";
                $message_type = 'success';
            } else {
                $message = "Error resetting password. Please try again.";
                $message_type = 'error';
            }
        } else {
            $message = "No account found with this email.";
            $message_type = 'error';
        }
    } else {
        $message = "Please enter your email.";
        $message_type = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Palace Hotel - Forgot Password</title>
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
        </div>
    </div>

    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-card">
                    <h2>Reset Password</h2>
                    
                    <?php if ($message): ?>
                    <div class="form-message <?php echo $message_type; ?>" style="margin-bottom: 15px;">
                        <?php echo $message; ?>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="forgot_password.php">
                        <div class="form-group">
                            <label>Enter your email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Remember your password? <a href="login.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2024 Grand Palace Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>