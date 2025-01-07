<?php
$main_product = $product;

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
    <title><?php echo htmlspecialchars($main_product['name']); ?> - Amgad Store</title>
    <link rel="stylesheet" href="/assets/css/product.css">
</head>
<body>
    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons & up to 70% off!</p>
    </section>

    <section id="product-details" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo htmlspecialchars($main_product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" id="MainImg">
        </div>
        <div class="single-pro-details">
            <h6>Home / T-Shirt</h6>
            <h4><?php echo htmlspecialchars($main_product['name']); ?></h4>
            <h2><?php echo htmlspecialchars($main_product['price']); ?>Rp</h2>
            <select>
                <option>Select Size</option>
                <option>XL</option>
                <option>XXL</option>
                <option>Small</option>
                <option>Large</option>
            </select>
            <div class="quantity-container">
                <label for="quantity">Quantity (<?php echo htmlspecialchars($main_product['stock_quantity']); ?> available):</label>
                <input type="number" id="quantity" value="1" min="1" max="<?php echo htmlspecialchars($main_product['stock_quantity']); ?>">
            </div>
            <button class="normal">Add To Cart</button>
            <h4>Product Details</h4>
            <span><?php echo htmlspecialchars($main_product['description']); ?></span>
            <div class="star">
                <?php echo displayStars($main_product['rate']); ?>
            </div>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Related Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            <?php foreach ($relatedProducts as $relatedProduct): ?>
            <div class="pro">
                <img src="<?php echo htmlspecialchars($relatedProduct['image_url']); ?>" alt="<?php echo htmlspecialchars($relatedProduct['name']); ?>">
                <div class="des">
                    <span>adidas</span>
                    <h5><?php echo htmlspecialchars($relatedProduct['name']); ?></h5>
                    <div class="star">
                        <?php echo displayStars($relatedProduct['rate']); ?>
                    </div>
                    <h4><?php echo htmlspecialchars($relatedProduct['price']); ?>Rp</h4>
                </div>
                <a href="#" class="product-link cart" data-product-id="<?= htmlspecialchars($relatedProduct['product_id'])?>"><i class="bi bi-cart3"></i></a>

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
