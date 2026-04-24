<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Paradize Hotel - Gallery</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="nav-container">
            <div class="logo">Grand<span>Paradize</span></div>
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

    <section class="section" style="padding-top: 120px;">
        <div class="container">
            <div class="section-title">
                <h2>Our Gallery</h2>
                <p>Explore our hotel facilities, delicious dishes, and beverages. Click on image to order!</p>
            </div>

            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="foods">Foods</button>
                <button class="filter-btn" data-filter="drinks">Drinks</button>
                <button class="filter-btn" data-filter="housing">Housing</button>
                <button class="filter-btn" data-filter="facilities">Facilities</button>
            </div>

            <div class="gallery-grid">
                <!-- Foods -->
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Images/food1.jpg" alt="Grilled Salmon">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Grilled Salmon</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Images/food5.jpg" alt="Fish Curry">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Fish Curry</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Images/food3.jpg" alt="Prawns Special">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Prawns Special</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Images/food4.jpg" alt="Lobster Delight">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Lobster Delight</h3>
                    </div>
                </a>
                
                <!-- Drinks -->
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Images/drink1.jpg" alt="Premium Drinks">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Premium Drinks</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Images/drink2.jpg" alt="Cocktails">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Signature Cocktails</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Images/drink3.jpg" alt="Fresh Juices">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Fresh Juices</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Images/drink4.jpg" alt="Wine Selection">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Wine Selection</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Images/drink5.jpg" alt="Coffee & Beverages">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Coffee & Beverages</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Images/drink6.jpg" alt="Beer & More">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Beer Selection</h3>
                    </div>
                </a>
                
                <!-- Housing -->
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Images/image1.jpg" alt="Luxury Room">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Luxury Suite</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Images/image3.jpg" alt="Deluxe Room">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Deluxe Room</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Images/image4.jpg" alt="Executive Suite">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Executive Suite</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Images/image8.jpg" alt="Executive Suite">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Deluxe Suite</h3>
                    </div>
                </a>
                
                <!-- Facilities -->
                <a href="order.php" class="gallery-item" data-category="facilities">
                    <img src="Images/facilities3.jpg" alt="Swimming Pool">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Facilities</span>
                        <h3>Swimming Pool</h3>                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="facilities">
                    <img src="Images/facilities2.jpg" alt="Spa">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Facilities</span>
                        <h3>Luxury Spa</h3>                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="facilities">
                    <img src="Images/facilities1.jpg" alt="Gym">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Facilities</span>
                        <h3>Fitness Center</h3>
                    </div>
                </a>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <p style="color: var(--text-muted);">Click on any image to place your order</p>
                <a href="order.php" class="btn btn-primary" style="margin-top: 20px;">Order Now</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>Grand Palace Hotel</h3>
                    <p>Experience luxury like never before. Our hotel offers world-class amenities and exceptional service.</p>
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
                    <p><i class="fas fa-phone"></i> +250 791 072888</p>
                    <p><i class="fas fa-envelope"></i> felicite@grandparadize.com</p>
                </div>
                <div class="footer-social">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Grand Paradize Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>