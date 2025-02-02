<?php
require_once __DIR__ . "/../controllers/shopCont.php";

$products = getProducts();

?>

<link rel="stylesheet" href="/assets/css/shop.css">
<body>

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons & up to 70% off!</p>
    </section>

    <section id="product1" class="section-p1">
        <div class="prod-container">
        <?php foreach ($products as $product): ?>
                <div class="prod">
                    <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="des">
                        <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="product-description"><?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...</p>
                        <div class="stars">
                            <?php $stars = (htmlspecialchars($product['rate']));?>
                            <?php for ($i = 0 ; $i < $stars ; $i++):?>
                            <i class="bi bi-star-fill"></i>
                            <?php endfor;?>
                            <?php for ($i = 0 ; $i < 5-$stars ; $i++):?>
                            <i class="bi bi-star"></i>
                            <?php endfor;?>
                        </div>
                        <h4 class="price"><?= htmlspecialchars($product['price']) ?>Rp</h4>
                    </div>
                    <a href="#" class="product-link cart" data-product-id="<?= htmlspecialchars($product['product_id'])?>"><i class="bi bi-cart3"></i></a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <section id="dicount-offer" class="section-m1">
        <h6>SPECIAL OFFER</h6>
        <h1>End Year</h1>
        <h2>
            Up to <span class="dis-precentage">30% Off</span> - All t-Shirt
            & Accessories
        </h2>
        <button>Explore More</button>
    </section>

    

</body>

<!-- <div class="prod">
                <img src="/assets/img/products/f1.jpg" alt="Product 1">
                <div class="des">
                    <h5 class="product-name">Cartoon Astronaut T-Shirts</h5>
                    <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <h4 class="price">78Rp</h4>
                </div>
                <a href="#" class="cart"><i class="bi bi-cart3"></i></a>
            </div>
            <div class="prod">
                <img src="/assets/img/products/f2.jpg" alt="Product 2">
                <div class="des">
                    <h5 class="product-name">Floral Print Shirt</h5>
                    <p class="product-description">Elegant floral print shirt for a stylish look.</p>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    <h4 class="price">65Rp</h4>
                </div>
                <a href="#" class="cart"><i class="bi bi-cart3"></i></a>
            </div>
            <div class="prod">
                <img src="/assets/img/products/f3.jpg" alt="Product 3">
                <div class="des">
                    <h5 class="product-name">Casual White Shirt</h5>
                    <p class="product-description">Comfortable white shirt for everyday wear.</p>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <h4 class="price">55Rp</h4>
                </div>
                <a href="#" class="cart"><i class="bi bi-cart3"></i></a>
            </div>
            <div class="prod">
                <img src="/assets/img/products/f4.jpg" alt="Product 4">
                <div class="des">
                    <h5 class="product-name">Floral Embroidery Shirt</h5>
                    <p class="product-description">Beautiful embroidered shirt for a unique style.</p>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    <h4 class="price">82Rp</h4>
                </div>
                <a href="#" class="cart"><i class="bi bi-cart3"></i></a>
            </div> -->