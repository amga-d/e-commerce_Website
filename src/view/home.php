<?php
require_once __DIR__ . "/../controllers/homeCont.php";

$featureProducets = getFeaturedProducts();

?>

<body>
    <section id="hero" class="section-p1">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off"!</p>
        <button id="shopNowBtn">Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="/assets/img/features/f1.png" alt="">
            <h6 class="fe-box-fs">Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="/assets/img/features/f2.png" alt="">
            <h6 class="fe-box-or">Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="/assets/img/features/f3.png" alt="">
            <h6 class="fe-box-sm">Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="/assets/img/features/f4.png" alt="">
            <h6 class="fe-box-pr">Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="/assets/img/features/f5.png" alt="">
            <h6 class="fe-box-hs">Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="/assets/img/features/f6.png" alt="">
            <h6 class="fe-box-sp">F24/Support</h6>
        </div>
    </section>

    <section id="products1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>

        <div class="prod-container">
            <?php foreach ($featureProducets as $product): ?>
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
                    <a href="#" class="product-link" data-product-id="<?= htmlspecialchars($product['product_id'])?>"><i class="bi bi-cart3"></i></a>
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

    <!-- <footer class="section-p1">
        <div class="footer-section">
            <div class="col">
                <img class="logo" src="/assets/img/logo.png" alt="" />
                <h4>Contact</h4>
                <p><b>Address: </b> 40st. Sawwan.Sana'a</p>
                <p><b>Phone: </b> +967775700570</p>
                <p><b>Hours: </b> 10:00 - 20:00. Sat - Thur</p>
                <div class="follow">
                    <h4>Follow Us:</h4>
                    <div class="icons">
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-telegram"></i>
                        <i class="bi bi-google-play"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>

            <div class="col">
                <h4>About</h4>
                <a href="#">About Us</a>
                <a href="#">Delivery Infromation</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Contact Us</a>
            </div>

            <div class="col">
                <h4>My Account</h4>
                <a href="#">Sign In</a>
                <a href="#">View Cart</a>
                <a href="#">My Wishlist</a>
                <a href="#">Track My Order</a>
                <a href="#">Help</a>
            </div>

            <div class="col install">
                <h4>Install App</h4>
                <p>From App Store or Google Play</p>
                <div class="row">
                    <img src="/assets/img/pay/app.jpg" alt="" />
                    <img src="/assets/img/pay/play.jpg" alt="" />
                </div>
                <p>Secured Payment Gateways</p>
                <img src="img/pay/pay.png" alt="" />
            </div>
        </div>
        <div class="copyright">2024. Developed By Al-ameri</div>
    </footer> -->

    <!-- <script src="/script.js"></script> -->
</body>

</html> 