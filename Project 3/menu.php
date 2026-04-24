<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Paradize Hotel - Menu</title>
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

    <section class="section" style="padding-top: 80px;">
        <div class="container">
            <div class="section-title">
                <h2>Our Menu</h2>
                <p>Explore our exquisite selection of dishes and beverages</p>
            </div>

            <div class="menu-categories">
                <button class="category-btn active" data-category="all">All</button>
                <button class="category-btn" data-category="Fish">Fish</button>
                <button class="category-btn" data-category="Drinks">Drinks</button>
                <button class="category-btn" data-category="Fresh Juice">Fresh Juice</button>
            </div>

            <table class="menu-table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="menu-item-row" data-category="Fish">
                        <td>Grilled Salmon</td>
                        <td>Fresh Atlantic salmon with herbs and lemon butter sauce</td>
                        <td>Fish</td>
                        <td class="price">$45</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fish">
                        <td>Fried Tilapia</td>
                        <td>Crispy fried tilapia with special spices</td>
                        <td>Fish</td>
                        <td class="price">$30</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fish">
                        <td>Fish Curry</td>
                        <td>Traditional fish curry with coconut milk</td>
                        <td>Fish</td>
                        <td class="price">$35</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fish">
                        <td>Prawns Special</td>
                        <td>King prawns in garlic butter sauce</td>
                        <td>Fish</td>
                        <td class="price">$50</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fish">
                        <td>Lobster Delight</td>
                        <td>Premium lobster with garlic butter</td>
                        <td>Fish</td>
                        <td class="price">$75</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fish">
                        <td>Grilled Catfish</td>
                        <td>Smoky grilled catfish with herbs</td>
                        <td>Fish</td>
                        <td class="price">$38</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks">
                        <td>Red Wine</td>
                        <td>Premium French red wine</td>
                        <td>Drinks</td>
                        <td class="price">$25</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks">
                        <td>White Wine</td>
                        <td>Crisp Italian white wine</td>
                        <td>Drinks</td>
                        <td class="price">$22</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks">
                        <td>Whiskey Premium</td>
                        <td>12-year aged whiskey</td>
                        <td>Drinks</td>
                        <td class="price">$18</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks">
                        <td>Cocktail Special</td>
                        <td>Signature hotel cocktail</td>
                        <td>Drinks</td>
                        <td class="price">$15</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks">
                        <td>Beer Selection</td>
                        <td>Assorted international beers</td>
                        <td>Drinks</td>
                        <td class="price">$8</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks">
                        <td>Coffee Latte</td>
                        <td>Rich espresso with steamed milk</td>
                        <td>Drinks</td>
                        <td class="price">$8</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fresh Juice">
                        <td>Orange Juice</td>
                        <td>Freshly squeezed oranges</td>
                        <td>Fresh Juice</td>
                        <td class="price">$6</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fresh Juice">
                        <td>Mango Juice</td>
                        <td>Sweet tropical mango blend</td>
                        <td>Fresh Juice</td>
                        <td class="price">$7</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fresh Juice">
                        <td>Pineapple Juice</td>
                        <td>Refreshing tropical pineapple</td>
                        <td>Fresh Juice</td>
                        <td class="price">$6</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fresh Juice">
                        <td>Watermelon Juice</td>
                        <td>Fresh summer watermelon</td>
                        <td>Fresh Juice</td>
                        <td class="price">$6</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Fresh Juice">
                        <td>Mixed Berry Smoothie</td>
                        <td>Healthy antioxidant berry blend</td>
                        <td>Fresh Juice</td>
                        <td class="price">$9</td>
                    </tr>
                </tbody>
            </table>

            <div style="text-align: center; margin-top: 40px;">
                <a href="order.php" class="btn btn-primary">Order Now</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>Grand Paaradize Hotel</h3>
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
                    <p><i class="fas fa-phone"></i> +250 791072888</p>
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