# E-Commerce Website

A fully responsive e-commerce website built with PHP, MySQL, and JavaScript that provides a seamless shopping experience for users.

## Features

- **User Authentication System**

  - Login and Registration
  - Session management
  - User roles (Admin/Customer)

- **Product Management**

  - Product listing
  - Product details view
  - Related products showcase
  - Product ratings

- **Shopping Cart**

  - Add products to cart
  - Update quantities
  - Remove items
  - Cart total calculation

- **Responsive Design**

  - Mobile-friendly interface
  - Adapts to different screen sizes

- **Static Pages**
  - Home
  - Shop
  - About
  - Contact
  - Blog

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Icons**: Bootstrap Icons

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/ecommerce-website.git
```

2. Set up a local web server (XAMPP, WAMP, or MAMP)

3. Import the database:

```bash
mysql -u username -p database_name < ecommerce.sql
```

4. Configure database connection in db_conn.php

5. Navigate to the website in your browser:

```
http://localhost/ecommerce-website
```

## Directory Structure

```
assets/           # Static assets
  ├── css/        # Stylesheets
  ├── img/        # Images
  └── js/         # JavaScript files
src/              # Source code
  ├── config/     # Database configuration
  ├── controllers/# Controller logic
  ├── includes/   # Shared PHP components
  ├── Models/     # Database models
  └── view/       # View templates
```

## Database Configuration

Edit the db_conn.php file to match your database settings:

```php
$db_host = "localhost";
$db_name = "ecommerce";
$db_user = "root";
$db_password = "";
```

## Usage

1. Register a new account or login with existing credentials
2. Browse products on the shop page
3. Click on products to view details
4. Add products to cart
5. Proceed to checkout

## Admin Access

To access admin functionality:

1. Login with an admin account
2. Admin dashboard will be displayed automatically ( _NOT IMPLEMENTED YET_)

