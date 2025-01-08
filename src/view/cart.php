<?php
require_once __DIR__ . "/../controllers/cartCont.php";
// $myCart = "";
?>

<link rel="stylesheet" href="/assets/css/cart.css">

<body>
    <section id="page-header" class="cart-header">
        <h2>#cart</h2>
        <p>Add your coupon code & SAVE upto 70%!</p>
    </section>

    <?php if (empty($myCart)): ?>
        <section id="cart" class="section-p1">
            <div class="empty-cart">
                <h3>Your cart is empty</h3>
                <p>Add some products to your cart to continue shopping.</p>
                <a href="" id="contShopBtn" class="normal">Continue Shopping</a>
            </div>
        </section>
    <?php else: ?>
        <section id="cart" class="section-p1">
            <table>
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($myCart as $item): ?>
                        <tr>
                            <td>
                                <form method="POST" action="/src/controllers/cartCont.php">
                                    <input type="hidden" name="action" value="remove-item">
                                    <input type="hidden" name="product_id" value="<?= $item['product_id']?>">
                                    <button type="submit"><i class="bi bi-x-circle"></i></button>
                                </form>
                            </td>
                            <td><img src="<?php echo $item['image_url']; ?>" alt=""></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo number_format($item['price'], 0); ?>Rp</td>
                            <td><input type="number" value="<?php echo $item['quantity']; ?>" min="1"></td>
                            <td><?php echo number_format($item['price'] * $item['quantity'], 0); ?>Rp</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="cart-add" class="section-p1">
            <div id="coupon">
                <h3>Apply Coupon</h3>
                <div>
                    <input type="text" placeholder="Enter Your Coupon">
                    <button class="normal">Apply</button>
                </div>
            </div>

            <div id="subtotal">
                <h3>Cart Totals</h3>
                <table>
                    <?php
                    $subtotal = 0;
                    foreach ($myCart as $item) {
                        $subtotal += $item['price'] * $item['quantity'];
                    }
                    ?>
                    <tr>
                        <td>Cart Subtotal</td>
                        <td><?php echo number_format($subtotal, 0); ?>Rp</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong><?php echo number_format($subtotal, 0); ?>Rp</strong></td>
                    </tr>
                </table>
                <button class="normal">Proceed to checkout</button>
            </div>

        </section>
    <?php endif; ?>
</body>