<?php
$servername = "localhost";
$username = "root";
$password = "felicite@0791072888";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);
} else {
    die("Error creating database: " . $conn->error);
}

$conn->query("CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$conn->query("CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT DEFAULT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    menu_item VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    order_date DATE NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$conn->query("CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

function getMenuItems() {
    return [
        ['name' => 'Grilled Salmon', 'desc' => 'Fresh Atlantic salmon with herbs', 'price' => '$45', 'category' => 'Fish'],
        ['name' => 'Fried Tilapia', 'desc' => 'Crispy fried tilapia with spices', 'price' => '$30', 'category' => 'Fish'],
        ['name' => 'Fish Curry', 'desc' => 'Traditional fish curry with coconut', 'price' => '$35', 'category' => 'Fish'],
        ['name' => 'Prawns Special', 'desc' => 'King prawns in garlic sauce', 'price' => '$50', 'category' => 'Fish'],
        ['name' => 'Lobster Delight', 'desc' => 'Premium lobster with butter', 'price' => '$75', 'category' => 'Fish'],
        ['name' => 'Red Wine', 'desc' => 'Premium French red wine', 'price' => '$25', 'category' => 'Drinks'],
        ['name' => 'White Wine', 'desc' => 'Crisp Italian white wine', 'price' => '$22', 'category' => 'Drinks'],
        ['name' => 'Whiskey Premium', 'desc' => ' aged whiskey', 'price' => '$18', 'category' => 'Drinks'],
        ['name' => 'Cocktail Special', 'desc' => 'Signature hotel cocktail', 'price' => '$15', 'category' => 'Drinks'],
        ['name' => 'Coffee Latte', 'desc' => 'Rich espresso with milk', 'price' => '$8', 'category' => 'Drinks'],
        ['name' => 'Orange Juice', 'desc' => 'Freshly squeezed', 'price' => '$6', 'category' => 'Fresh Juice'],
        ['name' => 'Mango Juice', 'desc' => 'Sweet tropical mango', 'price' => '$7', 'category' => 'Fresh Juice'],
        ['name' => 'Pineapple Juice', 'desc' => 'Refreshing tropical', 'price' => '$6', 'category' => 'Fresh Juice'],
        ['name' => 'Watermelon Juice', 'desc' => 'Fresh summer melon', 'price' => '$6', 'category' => 'Fresh Juice'],
        ['name' => 'Mixed Berry Smoothie', 'desc' => 'Healthy antioxidant blend', 'price' => '$9', 'category' => 'Fresh Juice'],
    ];
}
?>