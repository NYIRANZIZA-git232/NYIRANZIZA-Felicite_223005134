# Hotel Website  Designed by felicite Using PHP

## 1. Overview
- **Project Name**: Grand Paradize Hotel Website
- **Type**: Multi-page hotel website with PHP backend
- **Core Functionality**: Display hotel information, menu, gallery, online ordering, and contact system with database integration
- **Target Users**: Hotel guests and potential customers

### Overview Images
![Landing Page](Images/screenshots/image-1.png)
![services](Images/screenshots/image.png)

![Our services | Home](Images/screenshots/image-2.png)
![Why choose us | Home](Images/screenshots/image-3.png)
![Featured dishes| Home](Images/screenshots/image-4.png)
![About](Images/screenshots/image-5.png)
![Menu page](Images/screenshots/image-6.png)
![Menu page](Images/screenshots/image-7.png)
![Gallery](Images/screenshots/image-8.png)

Before you order, you have to login or create an account
![Order page by First Login](Images/screenshots/image-9.png)
![Order page after Login](Images/screenshots/image-10.png)
![Create new order](Images/screenshots/image-11.png)
![Contact us](Images/screenshots/image-12.png)
![Admin Panel](Images/screenshots/image-13.png)

## 3. Pages Specification

### Page 1: Home (`index.php`)
- Hero section with background image overlay
- Welcome message with CTA buttons
- Featured services section (3 columns)
- Testimonials

### Page 2: About Us (`about.php`)
- Hotel history/story
- Mission & vision
- Team/staff section
- Amenities list

### Page 3: Menu (`menu.php`)
- HTML table with menu items
- Categories: Fish, Drinks, Fresh Juice, Starters, Main Course, Desserts
- Columns: Item Name, Description, Price
- At least 15 items total

### Page 4: Gallery (`gallery.php`)
- Grid of 5+ food/drink images
- Each image links to order.html
- Lightbox effect on hover
- At least 5 images

### Page 5: Order (`order.php`)
- Login form (if not logged in)
- Order form (after login): Full Name, Email, Phone, Select Menu, Address, Date
- Submit sends to database
- Display past orders

### Page 6: Contact Us (`contact.php`)
- Contact form: Full Name, Email, Phone, Location, Message
- Submit sends to database
- Map section placeholder

### Additional Pages
- `login.php`: Login form for customers
- `orders.php`: Display customer orders (after login)
- `logout.php`: Logout functionality

### Database: `db.php`
- MySQL connection
- Database: hotel_db
- Tables: customers, orders, messages

### Order Processing (`order.php`)
- Validate form data
- Insert into orders table
- Display confirmation

### Contact Processing (`contact.php`)
- Validate form data
- Insert into messages table
- Display confirmation

### Login (`login.php`)
- Check credentials
- Create session
- Redirect to orders page

### Display Orders (`orders.php`)
- Query orders by customer
- Display in table format