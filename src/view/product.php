<?php
// Simulating product data retrieval
$product = [
    'id' => 1,
    'name' => 'Cartoon Astronaut T-Shirts',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'price' => 78,
    'image' => '/assets/img/products/f1.jpg',
    'rating' => 5
];

// Simulating related products retrieval
$relatedProducts = [
    [
        'id' => 2,
        'name' => 'Floral Print Shirt',
        'description' => 'Elegant floral print shirt for a stylish look.',
        'price' => 65,
        'image' => '/assets/img/products/f2.jpg',
        'rating' => 4
    ],
    [
        'id' => 3,
        'name' => 'Casual White Shirt',
        'description' => 'Comfortable white shirt for everyday wear.',
        'price' => 55,
        'image' => '/assets/img/products/f3.jpg',
        'rating' => 4
    ],
    [
        'id' => 4,
        'name' => 'Floral Embroidery Shirt',
        'description' => 'Beautiful embroidered shirt for a unique style.',
        'price' => 82,
        'image' => '/assets/img/products/f4.jpg',
        'rating' => 5
    ]
    
];

function displayStars($rating) {
    $output = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '<i class="bi bi-star-fill"></i>';
        } else {
            $output .= '<i class="bi bi-star"></i>';
        }
    }
    return $output;
}
?>


<head>
    <title><?php echo htmlspecialchars($product['name']); ?> - Amgad Store</title>
    <link rel="stylesheet" href="/assets/css/product.css">
</head>
<body>
    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons & up to 70% off!</p>
    </section>

    <section id="product-details" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" id="MainImg">
        </div>
        <div class="single-pro-details">
            <h6>Home / T-Shirt</h6>
            <h4><?php echo htmlspecialchars($product['name']); ?></h4>
            <h2><?php echo htmlspecialchars($product['price']); ?>Rp</h2>
            <select>
                <option>Select Size</option>
                <option>XL</option>
                <option>XXL</option>
                <option>Small</option>
                <option>Large</option>
            </select>
            <input type="number" value="1" min="1">
            <button class="normal">Add To Cart</button>
            <h4>Product Details</h4>
            <span><?php echo htmlspecialchars($product['description']); ?></span>
            <div class="star">
                <?php echo displayStars($product['rating']); ?>
            </div>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Related Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            <?php foreach ($relatedProducts as $relatedProduct): ?>
            <div class="pro">
                <img src="<?php echo htmlspecialchars($relatedProduct['image']); ?>" alt="<?php echo htmlspecialchars($relatedProduct['name']); ?>">
                <div class="des">
                    <span>adidas</span>
                    <h5><?php echo htmlspecialchars($relatedProduct['name']); ?></h5>
                    <div class="star">
                        <?php echo displayStars($relatedProduct['rating']); ?>
                    </div>
                    <h4><?php echo htmlspecialchars($relatedProduct['price']); ?>Rp</h4>
                </div>
                <a href="#"><i class="bi bi-cart3 cart"></i></a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>


</body>
</html>
